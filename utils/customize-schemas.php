<?php

use Walmart\Enums\SecurityScheme;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/constants.php';

/**
 * Customize Walmart's JSON schemas to be spec-conformant and standardized, so that we can more easily generate
 * code from them
 *
 * @param string $path The path to the schema file
 * @param string $category The category code for the schema
 * @param string $country The country code for the schema
 * @param string $apiCode The internal API code for the schema
 * @param string $apiName The human-readable API name for the schema
 * @return void
 */
function customizeSchema(
    string $path,
    string $category,
    string $country,
    string $apiCode,
    string $apiName
): void {
    // There are auth headers that are the same on (nearly) every request, but which Walmart includes in every
    // single request schema. We remove them so that the SDK is easier to use, and will pass them in during the
    // request signing process when an endpoint is called.
    $ignoreHeaders = [
        BASIC_SCHEME_HEADER,
        ACCESS_TOKEN_HEADER,
        CONSUMER_ID_HEADER,
        AUTH_SIG_HEADER,
        MARKET_HEADER,
        PARTNER_HEADER,
        'WM_QOS.CORRELATION_ID',
        'WM_SVC.NAME',
        'WM_CONSUMER.CHANNEL.TYPE',
        'WM_SEC.TIMESTAMP',
        'Accept',
    ];

    $schema = json_decode(file_get_contents($path), true);

    $schema['info']['version'] = libVersion();

    $allSecuritySchemes = [
        SecurityScheme::ACCESS_TOKEN => [
            'type' => 'http',
            'scheme' => 'bearer',
            'description' => 'Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the ' . ACCESS_TOKEN_HEADER . ' header',
        ],
        SecurityScheme::BASIC => [
            'type' => 'http',
            'scheme' => 'basic',
            'description' => 'Basic authentication with a Walmart Client ID and Client Secret',
        ],
        SecurityScheme::CHANNEL_TYPE => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => CHANNEL_TYPE_HEADER,
            'description' => 'Header authentication with your Walmart channel type, which is passed in the ' . CHANNEL_TYPE_HEADER . ' header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.',
        ],
        SecurityScheme::CONSUMER_ID => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => CONSUMER_ID_HEADER,
            'description' => 'Header authentication with your Walmart consumer ID, which is passed in the ' . CONSUMER_ID_HEADER . ' header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.',
        ],
        SecurityScheme::PARTNER => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => PARTNER_HEADER,
            'description' => 'Header authentication with your Walmart partner ID, which is passed in the ' . PARTNER_HEADER . ' header. Required by Supplier API endpoints. When using endpoints that require partner ID authentication, you must pass the `partnerId` option to the `Configuration` constructor.',
        ],
        SecurityScheme::SIGNATURE => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => AUTH_SIG_HEADER,
            'description' => 'Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the ' . AUTH_SIG_HEADER . ' header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.',
        ],
    ];
    $usedSecuritySchemes = [];

    $componentSchemas = $schema['components']['schemas'] ?? null;

    if (!is_null($componentSchemas)) {
        $schema['components']['schemas'] = replaceComponentInlineSchemas($componentSchemas);
    }

    foreach ($schema['paths'] as $p => $apiPath) {
        $rawPathParams = array_filter(
            explode('/', $p),
            fn ($segment) => preg_match('/^\{.*\}$/', $segment) > 0
        );
        $pathParams = array_map(
            fn ($param) => trim($param, '{}'),
            $rawPathParams
        );

        foreach ($apiPath as $x => $verb) {
            $security = [];

            // Standardize tags based on our internal naming convention (derived from resources/apis.json)
            $verb['tags'] = [$apiName];

            // Update each operation's parameters and auth information
            foreach ($verb['parameters'] as $i => $parameter) {    
                if ($parameter['in'] === 'header' && in_array($parameter['name'], $ignoreHeaders, true)) {
                    if (isset($parameter['required']) && $parameter['required']) {
                        // Apply all relevant security schemes to the endpoint
                        $schemeName = match ($parameter['name']) {
                            ACCESS_TOKEN_HEADER => SecurityScheme::ACCESS_TOKEN,
                            AUTH_SIG_HEADER => SecurityScheme::SIGNATURE,
                            BASIC_SCHEME_HEADER => SecurityScheme::BASIC,
                            CHANNEL_TYPE_HEADER => SecurityScheme::CHANNEL_TYPE,
                            CONSUMER_ID_HEADER => SecurityScheme::CONSUMER_ID,
                            PARTNER_HEADER => SecurityScheme::PARTNER,
                            default => false,
                        };

                        if ($schemeName !== false) {
                            // The JSON structure we're using for the security objects implies that if there are
                            // multiple security schemes, they are ALL required. This AND relationship, rather than
                            // an OR relationship, is indicated by a small syntactical difference in the security key's
                            // JSON structure. See here for more info: https://swagger.io/docs/specification/authentication
                            $security[$schemeName] = [];

                            // Track which security schemes have been used so we can add them to the overall schema
                            if (!in_array($schemeName, $usedSecuritySchemes, true)) {
                                $usedSecuritySchemes[] = $schemeName;
                            }
                        }    
                    }

                    unset($verb['parameters'][$i]);
                }
            }
            // If non-consecutive parameters were removed, there will be non-sequential keys in the parameters,
            // which leads to weird JSON serialization
            $verb['parameters'] = array_values($verb['parameters']);
            $verb['security'] = [$security];

            $verbPathParams = array_filter(
                $verb['parameters'],
                fn ($param) => $param['in'] === 'path'
            );
            $verbPathParamNames = array_column($verbPathParams, 'name');

            // Ensure all path parameters are included in the request's parameters list. Sometimes Walmart
            // forgets to include endpoints' path parameters in their requests, which leads to OpenAPI generator warnings
            foreach ($pathParams as $pathParam) {
                if (in_array($pathParam, $verbPathParamNames, true)) {
                    continue;
                }

                $verb['parameters'][] = [
                    'name' => $pathParam,
                    'in' => 'path',
                    'required' => true,
                    'schema' => [
                        'type' => 'string',
                    ],
                ];
            }

            // Update endpoint responses
            foreach ($verb['responses'] as $code => $response) {
                if (isset($response['content'])) {
                    $contentType = chooseContentType($response['content']);
                    $response['content'] = [$contentType => $response['content'][$contentType]];

                    // All responses need to have their headers accessible, but the JSON models don't typically include headers
                    // as one of the properties of the response model, so we mark the responses with a custom attribute that tells
                    // the generator to expose a headers attribute
                    $response['content'][$contentType]['schema']['x-expose-headers'] = true;
                }

                $verb['responses'][$code] = $response;
            }

            if (isset($verb['requestBody']['content'])) {
                $contentType = chooseContentType($verb['requestBody']['content']);
                $verb['requestBody']['content'] = [$contentType => $verb['requestBody']['content'][$contentType]];
            }

            // Replace inline schemas with component refs
            if (!is_null($componentSchemas)) {
                $verb = replaceRequestResponseSchemas($verb, $componentSchemas);
            }

            $apiPath[$x] = $verb;
        }
        $schema['paths'][$p] = $apiPath;
    }

    $schema['components']['securitySchemes'] = array_filter(
        $allSecuritySchemes,
        fn ($k) => in_array($k, $usedSecuritySchemes, true),
        ARRAY_FILTER_USE_KEY
    );

    $schema = fixSchema($schema, $country, $category, $apiCode);

    file_put_contents($path, json_encode($schema, JSON_PRETTY_PRINT));
}

/**
 * For some reason, Walmart includes component schemas for every data type in each API schema, and then
 * also defines inline request/response schemas for each endpoint. This function removes the inline schemas,
 * and replaces them with references to the component schemas.
 *
 * @param array $verbSchema The OpenAPI schema for a particular verb on an endpoint
 * @param array $componentSchemas The component schemas for the API
 * @return array The updated verb schema
 */
function replaceRequestResponseSchemas(array $verbSchema, array $componentSchemas): array
{
    $summary = $verbSchema['summary'];
    foreach ($verbSchema['responses'] as $code => $response) {
        if (!isset($response['content'])) {
            continue;
        }

        $contentType = array_key_first($response['content']);
        $responseSchema = $response['content'][$contentType]['schema'];

        if (
            // We don't want to overwrite existing refs
            isset($responseSchema['$ref'])
            // Some of the MX responses don't have any response schemas, so we skip them
            || !isset($responseSchema['type'])
        ) {
            continue;
        }

        $properties = match ($responseSchema['type']) {
            'object' => array_keys($responseSchema['properties']),
            'array' => array_keys($responseSchema['items']['properties']),
            default => [],
        };

        if (count($properties) === 0) {
            continue;
        }

        $matchingRef = findMatchingComponent(
            $properties,
            [$summary . (string) $code, $verbSchema['operationId']],
            $componentSchemas,
            $contentType === 'application/xml',
        );

        if ($matchingRef) {
            if ($responseSchema['type'] === 'object') {
                $verbSchema['responses'][$code]['content'][$contentType]['schema'] = $matchingRef;
            } else if ($responseSchema['type'] === 'array') {
                $verbSchema['responses'][$code]['content'][$contentType]['schema']['items'] = $matchingRef;
            } else {
                throw new Exception("Unknown response type: {$responseSchema['type']}");
            }
        }
    }

    if (isset($verbSchema['requestBody'])) {
        $contentType = array_key_first($verbSchema['requestBody']['content']);
        $body = $verbSchema['requestBody']['content'][$contentType];
        if (isset($body['schema']['$ref']) || !isset($body['schema']['properties'])) {
            return $verbSchema;
        }

        $matchingRef = findMatchingComponent(
            array_keys($body['schema']['properties']),
            $summary,
            $componentSchemas,
            $contentType === 'application/xml'
        );
        if (!is_null($matchingRef)) {
            $verbSchema['requestBody']['content'][$contentType]['schema'] = $matchingRef;
        }
    }

    return $verbSchema;
}

/**
 * Combs through components, and replaces inline schemas that are also defined as component schemas
 * with references to the component schemas.
 *
 * @param array $components The components section of an OpenAPI schema
 * @return array The updated components section
 */
function replaceComponentInlineSchemas(array $components): array
{
    foreach ($components as $componentName => $component) {
        if (!isset($component['properties'])) {
            continue;
        }

        foreach ($component['properties'] as $propertyName => $property) {
            if (
                !isset($property['type'])
                || (!isset($property['properties']) && !isset($property['items']['properties']))
            ) {
                continue;
            }

            $properties = match ($property['type']) {
                'object' => array_keys($property['properties']),
                'array' => array_keys($property['items']['properties']),
                default => [],
            };

            if (count($properties) === 0) {
                continue;
            }

            $matchingRef = findMatchingComponent(
                $properties,
                [$componentName, $propertyName],
                $components,
                isset($component['xml']),
            );

            if ($matchingRef) {
                if ($property['type'] === 'object') {
                    $component['properties'][$propertyName] = $matchingRef;
                } else if ($property['type'] === 'array') {
                    $component['properties'][$propertyName]['items'] = $matchingRef;
                } else {
                    throw new Exception("Unknown component type on component $componentName: {$property['type']}");
                }
            }
        }

        $components[$componentName] = $component;
    }

    return $components;
}

/**
 * Takes an array of schema properties, and searches $componentSchemas for a matching schema.
 * If one is found, returns an OpenAPI compatible ref array pointing to the matching component
 * schema. Otherwise, returns null.
 *
 * @param array $properties The properties of the schema to match
 * @param string|array $relatedStrings A string or strings to use when searching for a matching component schema (used
 *                                     to decide between multiple matching schemas)
 * @param array $componentSchemas The component schemas to search for a match
 * @param bool $isXml Whether or not we're searching for XML-specific component schemas
 * @return array|null
 */
function findMatchingComponent(array $properties, string|array $relatedStrings, array $componentSchemas, bool $isXml): ?array
{
    $sortedProperties = $properties;
    sort($sortedProperties);

    if (is_string($relatedStrings)) {
        $relatedStrings = [$relatedStrings];
    }
    $relatedStrings = array_map(fn ($s) => strtolower($s), $relatedStrings);

    $match = null;
    $minLevenshtein = 100000;  // An arbitrary large number
    foreach ($componentSchemas as $componentName => $component) {
        if (!isset($component['properties'])) {
            continue;
        }

        $lcComponentName = strtolower($componentName);
        $sortedComponentProperties = array_keys($component['properties']);
        sort($sortedComponentProperties);

        if ($sortedComponentProperties === $sortedProperties) {
            /**
             * Sometimes there are multiple Walmart-defined schema components that have the same structure
             * but different names. We want to get the component that is named most similarly to the component,
             * response type, or operation that it is being used as a ref for. This helps with readability (components
             * are named what you would expect) and future-proofing (so that if Walmart changes the schema for
             * a particular component/response/etc, it doesn't affect other components/responses/operations/etc
             * that have the same structure).
             *
             * For instance, imagine a getOrders and an updateOrders endpoint. Both have a response schema that contains a
             * list of orders. The schema properties of the response are the same for both endpoints, but there is a component
             * named GetOrdersResponse for getOrders, and a component named UpdateOrdersResponse for updateOrders. If we
             * didn't check which name was most similar, we would always use the first component we found -- let's say it
             * would be GetOrdersResponse. But if Walmart changed the schema for getOrders, it would also change the schema
             * for the response from updateOrders, which would be a breaking change. Also, when you called updateOrders, you
             * would, confusingly, get a GetOrdersResponse in return. This is why we check for the most similar name.
             * 
             * This is NOT a final solution -- we need to automatically construct all the component schemas from scratch to
             * ensure that we're always using the correct one, rather than trying to make the Walmart-provided schemas work.
             */
            $levenshteins = array_map(fn ($s) => levenshtein($lcComponentName, $s, 1, 1, 0), $relatedStrings);
            $levenshtein = array_sum($levenshteins) / count($levenshteins);
            
            // Sometimes for XML inline schemas, there is a matching component that is not marked as
            // XML-specific, but is the only matching schema. If we don't find a full match, we'll
            // use the component that is not marked as XML-specific, but only if we haven't already
            // found a match that is the correct content type
            $componentIsXml = isset($component['xml']);
            if (is_null($match) && $isXml !== $componentIsXml) {
                $match = $componentName;
            } else if ($levenshtein < $minLevenshtein) {
                $minLevenshtein = $levenshtein;
                $match = $componentName;
            }
        }
    }

    if ($match) {
        return [
            '$ref' => "#/components/schemas/$match",
        ];
    }
    return null;
}

/*
 * Some endpoints have multiple request/response content types, but we only care about the JSON response if it exists,
 * and we only want to have one content type per response because OpenAPI doesn't support multiple content types
 * in PHP. So we select the JSON content type if it exists, and if not, we just pick the first one.
 *
 * @param array $content The OpenAPI spec's content type objects for a given request/response
 */
function chooseContentType(array $content): string
{
    $preferredContentTypes = ['multipart/form-data', 'application/json', 'application/xml'];
    foreach($preferredContentTypes as $contentType) {
        if (array_key_exists($contentType, $content)) {
            return $contentType;
        }
    }
    return array_key_first($content);
}

/**
 * Applies specific model fixes from the resources/schema-corrections.json file to the current schema.
 *
 * @param array $schema The schema to apply the fixes to
 * @param string $country The country code for the schema
 * @param string $category The category code for the schema
 * @param string $code The internal API code for the schema
 */
function fixSchema(array $schema, string $country, string $category, string $code): array
{
    $allFixes = json_decode(file_get_contents(SCHEMA_FIXES_FILE), true);
    $fixes = $allFixes[$country][$category][$code] ?? [];

    if (isset($fixes['paths'])) {
        $schema['paths'] = array_merge_recursive_distinct(
            $schema['paths'],
            $fixes['paths']
        );
    }

    return $schema;
}

/**
 * Prepares schemas for api/model generation using janephp.
 */
function customizeSchemas(array $categories, array $countries, array $apiCodes): void
{
    $schemas = schemas($categories, $countries, $apiCodes);
    foreach ($schemas as $schemaInfo) {
        customizeSchema(
            $schemaInfo['path'],
            $schemaInfo['category'],
            $schemaInfo['country'],
            $schemaInfo['api']['code'],
            $schemaInfo['api']['name'],
        );
    }
}

$opts = handleSchemaOpts();
customizeSchemas(...$opts);
