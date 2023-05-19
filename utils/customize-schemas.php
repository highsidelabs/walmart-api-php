<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../src/constants.php';

const MP_AUTH_API_TAG = 'Authentication';

function customizeSchema(string $path, string $category): void
{
    // There are auth headers that are the same on (nearly) every request, but which Walmart includes in every
    // single request schema. We remove them so that the SDK is easier to use, and will pass them in during the
    // request signing process when an endpoint is called.
    $ignoreHeaders = [
        'Authorization',
        ACCESS_TOKEN_HEADER,
        'WM_QOS.CORRELATION_ID',
        'WM_SVC.NAME',
        'WM_CONSUMER.CHANNEL.TYPE',
    ];

    $schema = json_decode(file_get_contents($path), true);

    if (!isset($schema['info']['version'])) {
        $schema['info']['version'] = API_VERSION;
    }

    $firstPath = $schema['paths'][array_key_first($schema['paths'])];
    $firstVerb = $firstPath[array_key_first($firstPath)];
    $tag = $firstVerb['tags'][0];

    $schema['components']['securitySchemes']['apiKeyAuth'] = [
        'type' => 'apiKey',
        'in' => 'header',
        'name' => ACCESS_TOKEN_HEADER,
    ];

    // Only the Marketplace Authentication & Authorization API uses standalone basic auth for an endpoint
    if ($tag === MP_AUTH_API_TAG) {
        $schema['components']['securitySchemes']['basicAuth'] = [
            'type' => 'http',
            'scheme' => 'basic',
        ];
    }

    foreach ($schema['paths'] as $p => $apiPath) {
        if (strpos($p, '/' . API_VERSION . '/') === false) {
            unset($schema['paths'][$p]);
            echo "Removed path $p from $tag schema in $category category, only /" . API_VERSION . "/ API paths are supported\n";
            continue;
        }

        foreach ($apiPath as $x => $verb) {
            $apiKeyAuth = false;

            foreach ($verb['parameters'] as $i => $parameter) {
                if ($parameter['in'] === 'header' && in_array($parameter['name'], $ignoreHeaders)) {
                    if ($parameter['name'] === ACCESS_TOKEN_HEADER) {
                        $apiKeyAuth = true;
                    }
                    unset($verb['parameters'][$i]);
                }
            }

            $verb['security'][$apiKeyAuth ? 'apiKey' : 'basicAuth'] = [];
            $apiPath[$x] = $verb;
        }
        $schema['paths'][$p] = $apiPath;
    }

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
