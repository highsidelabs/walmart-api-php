<?php

const RESOURCE_DIR = __DIR__ . '/../resources';
const OUT_DIR = __DIR__ . '/../src';
const API_OUT_DIR = OUT_DIR . '/api';
const MODEL_OUT_DIR = OUT_DIR . '/model';

function openApiGenerator(string $name, string $category, string $country): void
{
    $version = libVersion();
    $fullSchemaPath = RESOURCE_DIR . "/schemas/$country/$category/$name.json";
    $buildDir = __DIR__ . '/../build';
    $configPath = RESOURCE_DIR . '/generator-config.json';
    $templateDir = RESOURCE_DIR . '/templates';
    $logFile = $buildDir . '/build.log';

    // Ensure output files are prettified
    // $_ENV['PHP_POST_PROCESS_FILE'] = __DIR__ . '/../vendor/bin/php_cs_fixer fix src';
    putenv('PHP_POST_PROCESS_FILE=' . __DIR__ . '/../vendor/bin/php-cs-fixer fix');

    $generateCmd = "openapi-generator generate \
        --input-spec $fullSchemaPath \
        --output $buildDir \
        --template-dir $templateDir \
        --generator-name php \
        --config $configPath \
        --engine handlebars \
        --enable-post-process-file \
        --http-user-agent highsidelabs/walmart-sdk-php/$version \
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

// Get the library version
function libVersion(): string
{
    $configPath = RESOURCE_DIR . '/generator-config.json';
    $config = json_decode(file_get_contents($configPath), true);
    return $config['artifactVersion'];
}

openApiGenerator('feeds', 'mp', 'us');
