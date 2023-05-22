<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/constants.php';

/**
 * Generate the SDK based on the schemas that fit the given options.
 *
 * @param array $categories The Walmart API categories for which to generate code.
 * @param array $countries The countries for which to generate code.
 * @param array $apiNames The individual schema codes for which to generate code.
 * @return void 
 */
function generateApis(array $categories, array $countries, array $apiNames): void
{
    $schemas = schemas($categories, $countries, $apiNames);

    foreach ($schemas as $schema) {
        openApiGenerator($schema['apiName'], $schema['category'], $schema['country']);
    }

    generateSupportingFiles();
}


/**
 * Generate the SDK for the given schema.
 *
 * @param string $name 
 * @param string $category 
 * @param string $country 
 * @return void 
 */
function openApiGenerator(string $name, string $category, string $country): void
{
    $version = libVersion();
    $schemaPath = SCHEMA_DIR . "/$country/$category/$name.json";
    $configPath = RESOURCE_DIR . '/generator-config.json';

    $categoryCaps = strtoupper($category);
    $countryCaps = strtoupper($country);

    // Ensure output files are prettified
    putenv('PHP_POST_PROCESS_FILE=' . __DIR__ . '/../vendor/bin/php-cs-fixer fix');

    $generateCmd = "openapi-generator generate \
        --input-spec $schemaPath \
        --template-dir " . TEMPLATE_DIR . " \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --global-property apis,models \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-sdk-php/$version \
        --api-package \"Api\\$categoryCaps\\$countryCaps\" \
        --model-package \"Model\\$categoryCaps\\$countryCaps\" \
        --additional-properties=\"x-walmart-api-category=$categoryCaps,x-walmart-country=$countryCaps\" \
        2>&1";

    execAndLog($generateCmd);
}

function generateSupportingFiles(): void
{
    $version = libVersion();
    $configPath = RESOURCE_DIR . '/generator-config.json';
    // Static path -- this won't actually be used since we're only generating supporting files
    $schemaPath = SCHEMA_DIR . '/us/mp/auth.json';

    // Ensure output files are prettified
    putenv('PHP_POST_PROCESS_FILE=' . __DIR__ . '/../vendor/bin/php-cs-fixer fix');

    $generateCmd = "openapi-generator generate \
        --input-spec $schemaPath \
        --template-dir " . TEMPLATE_DIR . " \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --global-property supportingFiles \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-sdk-php/$version \
        2>&1";
    
    execAndLog($generateCmd);
}

function execAndLog(string $cmd): void
{
    $resultCode = 0;
    $output = [];
    exec($cmd, $output, $resultCode);

    file_put_contents(LOGFILE, implode("\n", $output) . "\n", FILE_APPEND);

    if ($resultCode > 0) {
        echo "Error executing command\n";
        exit(1);
    }
}

$opts = handleSchemaOpts();
generateApis(...$opts);
