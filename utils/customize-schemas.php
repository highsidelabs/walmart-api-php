<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/constants.php';

const MP_AUTH_API_TAG = 'Authentication';

function customizeSchema(string $path, string $category): void
{
    // There are auth headers that are the same on (nearly) every request, but which Walmart includes in every
    // single request schema. We remove them so that the SDK is easier to use, and will pass them in during the
    // request signing process when an endpoint is called.
    $ignoreHeaders = [
        BASIC_SCHEME_HEADER,
        ACCESS_TOKEN_HEADER,
        CONSUMER_ID_HEADER,
        AUTH_SIG_HEADER,
        'WM_QOS.CORRELATION_ID',
        'WM_SVC.NAME',
        'WM_CONSUMER.CHANNEL.TYPE',
        'WM_SEC.TIMESTAMP',
    ];

    $schema = json_decode(file_get_contents($path), true);

    if (!isset($schema['info']['version'])) {
        $schema['info']['version'] = API_VERSION;
    }

    $firstPath = $schema['paths'][array_key_first($schema['paths'])];
    $firstVerb = $firstPath[array_key_first($firstPath)];
    $tag = $firstVerb['tags'][0];

    $allSecuritySchemes = [
        // Used by all endpoints
        BASIC_SCHEME_NAME => [
            'type' => 'http',
            'scheme' => 'basic',
        ],
        // Used by some endpoints in most APIs
        ACCESS_TOKEN_SCHEME_NAME => [
            'type' => 'apiKey',
            'in' => 'header',
            'name' => ACCESS_TOKEN_HEADER,
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
            echo "Removed path $p from $tag schema in $category category, only /" . API_VERSION . "/ API paths are supported\n";
            continue;
        }

        foreach ($apiPath as $x => $verb) {
            $security = [];
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

            // Update endpoint responses
            foreach ($verb['responses'] as $code => $response) {
                // Some endpoints have multiple response content types, but we only care about the JSON response if it exists,
                // and we only want to have one content type per response because OpenAPI doesn't support multiple content types
                // in PHP
                if (isset($response['content']) && count($response['content']) > 1) {
                    $jsonResponse = $response['content']['application/json'] ?? null;

                    // If there is a JSON response, use it and remove the other content types
                    if (!is_null($jsonResponse)) {
                        $verb['responses'][$code]['content'] = ['application/json' => $jsonResponse];
                    } else {  // Otherwise, only keep the first content type
                        $contentType = array_key_first($response['content']);
                        $verb['responses'][$code]['content'][$contentType] = $response['content'][$contentType];
                    }
                }
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
function customizeSchemas(array $categories, array $countries, array $apiNames): void
{
    $schemas = schemas($categories, $countries, $apiNames);
    foreach ($schemas as $schemaInfo) {
        customizeSchema($schemaInfo['path'], $schemaInfo['category']);
    }
}

$opts = handleSchemaOpts();
customizeSchemas(...$opts);
