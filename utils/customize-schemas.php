<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/constants.php';

/**
 * Customize Walmart's JSON schemas to be spec-conformant and standardized, so that we can more easily generate
 * code from them
 *
 * @param string $path The path to the schema file
 * @param string $category The category code for the schema
 * @param string $name The human-readable API name for the schema
 * @return void
 */
function customizeSchema(string $path, string $category, string $name): void
{
    // There are auth headers that are the same on (nearly) every request, but which Walmart includes in every
    // single request schema. We remove them so that the SDK is easier to use, and will pass them in during the
    // request signing process when an endpoint is called.
    $ignoreHeaders = [
        BASIC_SCHEME_HEADER,
        ACCESS_TOKEN_HEADER,
        CONSUMER_ID_HEADER,
        AUTH_SIG_HEADER,
        MARKET_HEADER,
        'WM_QOS.CORRELATION_ID',
        'WM_SVC.NAME',
        'WM_CONSUMER.CHANNEL.TYPE',
        'WM_SEC.TIMESTAMP',
    ];

    $schema = json_decode(file_get_contents($path), true);

    if (!isset($schema['info']['version'])) {
        $schema['info']['version'] = API_VERSION;
    }

    $allSecuritySchemes = [
        // Used by all endpoints
        BASIC_SCHEME_NAME => [
            'type' => 'http',
            'scheme' => 'basic',
        ],
        // Used by some endpoints in most APIs
        ACCESS_TOKEN_SCHEME_NAME => [
            'type' => 'http',
            'scheme' => 'bearer',
        ],
        CONSUMER_ID_SCHEME_NAME => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => CONSUMER_ID_HEADER,
        ],
        AUTH_SIG_SCHEME_NAME => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => AUTH_SIG_HEADER,
        ],
    ];
    $usedSecuritySchemes = [];

    foreach ($schema['paths'] as $p => $apiPath) {
        if (strpos($p, '/' . API_VERSION . '/') === false) {
            unset($schema['paths'][$p]);
            echo "Removed path $p from $name schema in $category category, only /" . API_VERSION . "/ API paths are supported\n";
            continue;
        }

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
            $verb['tags'] = [$name];

            // Update each operation's parameters and auth information
            foreach ($verb['parameters'] as $i => $parameter) {    
                if ($parameter['in'] === 'header' && in_array($parameter['name'], $ignoreHeaders, true)) {

                    // Apply all relevant security schemes to the endpoint
                    $schemeName = match ($parameter['name']) {
                        BASIC_SCHEME_HEADER => BASIC_SCHEME_NAME,
                        ACCESS_TOKEN_HEADER => ACCESS_TOKEN_SCHEME_NAME,
                        CONSUMER_ID_HEADER => CONSUMER_ID_SCHEME_NAME,
                        AUTH_SIG_HEADER => AUTH_SIG_SCHEME_NAME,
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
                    /*
                     * Some endpoints have multiple response content types, but we only care about the JSON response if it exists,
                     * and we only want to have one content type per response because OpenAPI doesn't support multiple content types
                     * in PHP
                     */
                    $contentType = 'application/json';
                    if (!array_key_exists('application/json', $response['content'])) {
                        $contentType = array_key_first($response['content']);
                    }
                    if (count($response['content']) > 1) {
                        // If there is a JSON response, use it and remove the other content types. Otherwise, use the first content type
                        $response['content'] = [$contentType => $response['content'][$contentType]];
                    }

                    // All responses need to have their headers accessible, but the JSON models don't typically include headers
                    // as one of the properties of the response model, so we mark the responses with a custom attribute that tells
                    // the generator to expose a headers attribute
                    $response['content'][$contentType]['schema']['x-expose-headers'] = true;
                }

                $verb['responses'][$code] = $response;
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

    file_put_contents($path, json_encode($schema, JSON_PRETTY_PRINT));
}

/**
 * Prepares schemas for api/model generation using janephp.
 */
function customizeSchemas(array $categories, array $countries, array $apiCodes): void
{
    $schemas = schemas($categories, $countries, $apiCodes);
    foreach ($schemas as $schemaInfo) {
        customizeSchema($schemaInfo['path'], $schemaInfo['category'], $schemaInfo['api']['name']);
    }
}

$opts = handleSchemaOpts();
customizeSchemas(...$opts);
