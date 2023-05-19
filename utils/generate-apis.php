<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/../src/constants.php';

const OUT_DIR = __DIR__ . '/../src';
const API_OUT_DIR = OUT_DIR . '/api';
const MODEL_OUT_DIR = OUT_DIR . '/model';

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
    $fullSchemaPath = RESOURCE_DIR . "/schemas/$country/$category/$name.json";
    $configPath = RESOURCE_DIR . '/generator-config.json';
    $templateDir = RESOURCE_DIR . '/templates';
    $logFile = BUILD_DIR . '/build.log';

    $categoryCaps = strtoupper($category);
    $countryCaps = strtoupper($country);

    // Ensure output files are prettified
    putenv('PHP_POST_PROCESS_FILE=' . __DIR__ . '/../vendor/bin/php-cs-fixer fix');

    $generateCmd = "openapi-generator generate \
        --input-spec $fullSchemaPath \
        --output " . BUILD_DIR . " \
        --template-dir $templateDir \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-sdk-php/$version \
        --additional-properties=\"x-walmart-api-category=$categoryCaps,x-walmart-country=$countryCaps\" \
        2>&1";

    $resultCode = 0;
    $output = [];
    exec($generateCmd, $output, $resultCode);

    // Error code 1 means there were warnings, but no errors
    if ($resultCode > 1) {
        echo "Error generating $category/$name schema for country $country\n";
        echo implode("\n", $output);
        exit(1);
    } else {
        echo "Generated $category/$name schema for country $country\n";
        file_put_contents($logFile, implode("\n", $output) . "\n", FILE_APPEND);
    }
}

$opts = handleSchemaOpts();
generateApis(...$opts);
