<?php

require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/constants.php';

/**
 * Generate the SDK based on the schemas that fit the given options.
 *
 * @param array $categories The Walmart API categories for which to generate code.
 * @param array $countries The countries for which to generate code.
 * @param array $apiCodes The individual schema codes for which to generate code.
 * @return void 
 */
function generateApis(array $categories, array $countries, array $apiCodes): void
{
    $schemas = schemas($categories, $countries, $apiCodes);

    foreach ($schemas as $schema) {
        openApiGenerator($schema['api']['code'], $schema['api']['name'], $schema['category'], $schema['country']);
    }

    generateSupportingFiles();
}


/**
 * Generate the SDK for the given schema.
 *
 * @param string $code The schema code
 * @param string $name The human-readable schema name
 * @param string $category The schema's category code
 * @param string $country The country the schema applies to
 * @return void 
 */
function openApiGenerator(string $code, string $name, string $category, string $country): void
{
    $version = libVersion();
    $schemaPath = SCHEMA_DIR . "/$country/$category/$code.json";
    $configPath = RESOURCE_DIR . '/generator-config.json';

    $categoryCaps = strtoupper($category);
    $countryCaps = strtoupper($country);

    setPrettifyEnv();

    $compressedSchemaName = str_replace(' ', '', $name);
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
        --model-package \"Model\\$categoryCaps\\$countryCaps\\$compressedSchemaName\" \
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

    setPrettifyEnv();

    $generateCmd = "openapi-generator generate \
        --input-spec $schemaPath \
        --template-dir " . TEMPLATE_DIR . " \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --global-property supportingFiles \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-sdk-php/$version \
        --openapi-normalizer KEEP_ONLY_FIRST_TAG_IN_OPERATION=true \
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

function setPrettifyEnv(): void
{
    // Ensure OpenAPI generator's output files are prettified
    putenv('PHP_POST_PROCESS_FILE=' . __DIR__ . '/../vendor/bin/php-cs-fixer fix --allow-risky=yes --config ' . __DIR__ . '/../.php-cs-fixer.dist.php');
}

$opts = handleSchemaOpts();
generateApis(...$opts);
