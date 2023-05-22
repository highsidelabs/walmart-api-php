<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/constants.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

const BASE_SCHEMA_DOWNLOAD_URL = 'https://developer.walmart.com/api/detail';

function downloadSchemas(?array $categories, ?array $countries, ?array $apiNames): void
{
    $toDownload = schemas($categories, $countries, $apiNames);

    $client = new Client([
        'base_uri' => BASE_SCHEMA_DOWNLOAD_URL,
        'headers' => [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
            // Walmart seems to have blocked Guzzle's default user agent
            'User-Agent' => 'highsidelabs/walmart-api-client',
        ],
    ]);

    foreach ($toDownload as $schema) {
        $category = $schema['category'];
        $country = $schema['country'];
        $apiName = $schema['apiName'];
        
        $savePath = SCHEMA_DIR . "/$country/{$category}";
        if (!file_exists($savePath)) {
            mkdir($savePath, 0755, true);
        }
    
        echo 'Retrieving ' . strtoupper($country) . " schemas for $category category {$apiName}\n";
    
        $contents = null;
        try {
            $res = $client->post('', [
                RequestOptions::JSON => [
                    'params' => [
                        'category' => $category,
                        'country' => $country,
                        'apiName' => $apiName,
                    ],
                ],
            ]);
            $contents = json_decode($res->getBody()->getContents());
        } catch (GuzzleException $e) {
            echo "Error downloading {$apiName} schema: {$e->getCode()}\n";
            continue;
        }

        file_put_contents($schema['path'], json_encode($contents, JSON_PRETTY_PRINT));
        echo "Downloaded {$apiName} schema\n";
    }
}

$opts = handleSchemaOpts();
downloadSchemas(...$opts);
