<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

const BASE_SCHEMA_DOWNLOAD_URL = 'https://developer.walmart.com/api/detail';

const API_DATA_FILE = __DIR__ . '/../resources/apis.json';
const COUNTRIES_DATA_FILE = __DIR__ . '/../resources/countries.json';

function downloadSchemas(
    string $path = null,
    array $categories = null,
    array $apis = null,
    array $countries = null
): void {
    if (is_null($path)) {
        $path = getcwd() . '/schemas-new';
    }

    $fullApiMap = json_decode(file_get_contents(API_DATA_FILE), true);
    $allCountries = json_decode(file_get_contents(COUNTRIES_DATA_FILE), true);

    $cats = null;
    if (is_null($categories)) {
        $cats = $fullApiMap;
    } else {
        $cats = array_filter(
            $fullApiMap,
            fn ($cat) => in_array($cat['code'], $categories)
        );
    }

    if (empty($cats)) {
        echo "No matching categories found.\n";
        return;
    }

    $ctrys = null;
    if (is_null($countries)) {
        $ctrys = $allCountries;
    } else {
        $ctrys = array_filter(
            $allCountries,
            fn ($ctry) => in_array($ctry, $countries)
        );
    }

    if (empty($ctrys)) {
        echo "No matching countries found.\n";
        return;
    }

    $client = new Client([
        'base_uri' => BASE_SCHEMA_DOWNLOAD_URL,
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
    ]);

    foreach ($ctrys as $country) {
        foreach ($cats as $cat) {
            $savePath = "$path/$country/{$cat['code']}";

            if (!file_exists($savePath)) {
                mkdir($savePath, 0755, true);
            }

            echo 'Retrieving ' . strtoupper($country) . " schemas for {$cat['name']}\n";

            $catApis = null;
            if (is_null($apis)) {
                $catApis = $cat['apis'];
            } else {
                $catApis = array_filter(
                    $cat['apis'],
                    fn ($api) => in_array($api['code'], $apis)
                );
            }
    
            if (empty($catApis)) {
                echo "No APIs to process for {$cat['name']}, skipping\n";
                continue;
            }
    
            foreach ($catApis as $api) {
                $contents = null;
                try {
                    $res = $client->post('', [
                        'json' => [
                            'params' => [
                                'category' => $cat['code'],
                                'country' => $country,
                                'apiName' => $api['code'],
                            ],    
                        ],
                    ]);
                    $contents = json_decode($res->getBody()->getContents());
                } catch (GuzzleException $e) {
                    echo "Error downloading {$api['name']} schema: {$e->getCode()}\n";
                    continue;
                }

                file_put_contents("$savePath/{$api['code']}.json", json_encode($contents, JSON_PRETTY_PRINT));
                echo "Downloaded {$api['name']} schema\n";
            }
        }    
    }
}

downloadSchemas();
