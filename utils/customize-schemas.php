<?php

const SCHEMA_DIR = __DIR__ . '/../schemas';

/**
 * Prepares schemas for api/model generation using janephp.
 */
function customizeSchemas(): void
{
    $paths = getSchemaFiles();

    // Since Jane expects authorization-related headers to NOT be listed in the OpenAPI spec for each
    // request that they apply to, but Walmart DOES list them, Jane will generate code that rejects
    // every request as invalid even though it's not, because the authorization-related headers have
    // not been added to the request by the time Jane checks the request for missing required headers.
    // So we tell Jane to skip validation on these headers.
    $ignoreHeaders = [
        'Authorization',
        'WM_QOS.CORRELATION_ID',
        'WM_SVC.NAME'
    ];

    foreach ($paths as $schemaFile) {
        $schema = json_decode(file_get_contents($schemaFile));

        foreach ($schema->paths as $p => $apiPath) {
            foreach ($apiPath as $x => $verb) {
                foreach ($verb->parameters as $parameter) {
                    if ($parameter->in === 'header' && in_array($parameter->name, $ignoreHeaders)) {
                        $parameter->{'x-jane-skip-validation'} = true;
                    }
                }
            }
        }

        file_put_contents($schemaFile, json_encode($schema, JSON_PRETTY_PRINT));
    }
}

function getSchemaFiles(): array
{
    function getSchemaFilesHelper($dir): array
    {
        $files = scandir($dir);
        $schemaPaths = [];

        foreach ($files as $file) {
            $path = realpath($dir . '/' . $file);
            $lastPeriod = strrpos($path, '.');
            if (is_dir($path) && $file !== '.' && $file !== '..') {
                $schemaPaths = array_merge($schemaPaths, getSchemaFilesHelper($path));
            } else if (
                !is_dir($path) &&
                is_numeric($lastPeriod) &&
                substr($path, $lastPeriod + 1) === 'json'
            ) {
                $schemaPaths[] = $path;
            }
        }

        return $schemaPaths;
    }

    return getSchemaFilesHelper(SCHEMA_DIR);
}


customizeSchemas();
