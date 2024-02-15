<?php

use Walmart\Enums\ApiCategory;

require_once __DIR__ . '/../vendor/autoload.php';
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
        echo "Generating SDK for {$schema['api']['name']} in category {$schema['category']}/country {$schema['country']}...";
        openApiGenerator($schema['api']['code'], $schema['api']['name'], $schema['category'], $schema['country']);
        echo "done\n";
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
    $schemaPath = MODEL_DIR . "/$country/$category/$code.json";
    $configPath = RESOURCE_DIR . '/generator-config.json';

    $categoryNamespace = $category === ApiCategory::SUPPLIER ? ucfirst($category) : strtoupper($category);
    $categoryCode = ApiCategory::asCategoryName($category);
    $countryCaps = strtoupper($country);
    $nameStr = str_replace(' ', '', $name);
    $nameAccessor = lcfirst($nameStr);

    setPrettifyEnv();

    $compressedSchemaName = str_replace(' ', '', $name);
    $generateCmd = OPENAPI_GENERATOR . " generate \
        --input-spec $schemaPath \
        --template-dir " . TEMPLATE_DIR . " \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --global-property apis,models \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-api-php/$version \
        --api-package 'Apis\\\\$categoryNamespace\\\\$countryCaps' \
        --model-package 'Models\\\\$categoryNamespace\\\\$countryCaps\\\\$compressedSchemaName' \
        --additional-properties=\"x-walmart-api-category=$categoryNamespace,x-walmart-country=$countryCaps,x-walmart-category-code=$categoryCode,x-walmart-api-accessor=$nameAccessor,x-walmart-api-name=$nameStr\" \
        2>&1";

    execAndLog($generateCmd);

    $defaultApiDocsPath = DOCS_DIR . '/' . DEFAULT_API_DIR;
    $defaultModelDocsPath = DOCS_DIR . '/' . DEFAULT_MODEL_DIR;
    // There is currently no way to change the docs output directories with the OpenAPI generator
    $apiDocSrcPath = "$defaultApiDocsPath/{$compressedSchemaName}Api.md";
    $modelDocSrcPath = "$defaultModelDocsPath/*.md";

    $apiDocDestPath = DOCS_DIR . '/' . CUSTOM_API_DIR . "/$categoryNamespace/$countryCaps/";
    $modelDocDestPath = DOCS_DIR . '/' . CUSTOM_MODEL_DIR . "/$categoryNamespace/$countryCaps/$compressedSchemaName/";

    // Create the documentation directories if they don't exist
    if (!file_exists($apiDocDestPath)) {
        mkdir($apiDocDestPath, 0755, true);
    }
    if (!file_exists($modelDocDestPath)) {
        mkdir($modelDocDestPath, 0755, true);
    }

    // Move the generated documentation to the correct directories
    execAndLog("mv $apiDocSrcPath $apiDocDestPath");

    if (count(glob($modelDocSrcPath)) > 0) {
        execAndLog("mv $modelDocSrcPath $modelDocDestPath");
    } else {
        echo "No model documentation found for $name in category $category/country $country\n";
    }

    // Delete default documentation directories if they are not in use
    if (
        DEFAULT_API_DIR !== CUSTOM_API_DIR
        && file_exists($defaultApiDocsPath)
        && count(scandir($defaultApiDocsPath)) === 2  // 2 because of . and ..
    ) {
        rmdir($defaultApiDocsPath);
    }
    if (
        DEFAULT_MODEL_DIR !== CUSTOM_MODEL_DIR
        && file_exists($defaultModelDocsPath)
        && count(scandir($defaultModelDocsPath)) === 2
    ) {
        rmdir($defaultModelDocsPath);
    }
}

function generateSupportingFiles(): void
{
    $version = libVersion();
    $configPath = RESOURCE_DIR . '/generator-config.json';
    // Static path -- this won't actually be used since we're only generating supporting files
    $schemaPath = MODEL_DIR . '/us/mp/auth.json';

    setPrettifyEnv();

    $generateCmd = OPENAPI_GENERATOR . " generate \
        --input-spec $schemaPath \
        --template-dir " . TEMPLATE_DIR . " \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --global-property supportingFiles \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-api-php/$version \
        --api-package Apis \
        --model-package Models \
        --openapi-normalizer KEEP_ONLY_FIRST_TAG_IN_OPERATION=true \
        2>&1";

    execAndLog($generateCmd);
}

/**
 * Execute a command. If it succeeds, return. Otherwise exit with command's exit code.
 * Logs the command's output to the log file.
 *
 * @param string $cmd The command to execute
 * @return void
 */
function execAndLog(string $cmd): void
{
    file_put_contents(LOGFILE, $cmd . "\n", FILE_APPEND);
    $resultCode = 0;
    $output = [];
    exec($cmd, $output, $resultCode);

    file_put_contents(LOGFILE, implode("\n", $output) . "\n", FILE_APPEND);

    if ($resultCode > 0) {
        echo "Error executing command\n";
        exit($resultCode);
    }
}

function setPrettifyEnv(): void
{
    // Ensure OpenAPI generator's output files are prettified
    putenv('PHP_POST_PROCESS_FILE=' . __DIR__ . '/../vendor/bin/php-cs-fixer fix --allow-risky=yes --config ' . __DIR__ . '/../.php-cs-fixer.dist.php');
}

// Only regenerate supporting files if the --supporting-files-only flag is passed, regardless of any other flags
$opts = getopt('', ['supporting-files-only']);
if (array_key_exists('supporting-files-only', $opts)) {
    generateSupportingFiles();
} else {
    $opts = handleSchemaOpts();
    generateApis(...$opts);
}
