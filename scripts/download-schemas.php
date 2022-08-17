<?php

require_once __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;

const BASE_URL = 'https://developer.walmart.com/api/detail';
const COUNTRY_CODES = ['us', 'mx', 'ca'];
const API_MAP = [
    [
        'name' => 'Content Providers',
        'code' => 'cp',
        'apis' => [
            [
                'name' => 'Content Feeds',
                'code' => 'feeds',
            ],
        ],
    ],
    [
        'name' => 'Drop Ship Vendors',
        'code' => 'dsv',
        'apis' => [
            [
                'name' => 'Feeds',
                'code' => 'feeds',
            ],
            [
                'name' => 'Items',
                'code' => 'items',
            ],
            [
                'name' => 'Cost',
                'code' => 'cost',
            ],
            [
                'name' => 'Inventory',
                'code' => 'inventory',
            ],
            [
                'name' => 'Lag Time',
                'code' => 'lagtime',
            ],
            [
                'name' => 'Orders',
                'code' => 'orders',
            ],
            [
                'name' => 'Reports',
                'code' => 'reports',
            ],
        ],
    ],
    [
        'name' => 'Marketplace Partners',
        'code' => 'mp',
        'apis' => [
            [
                'name' => 'Authentication & Authorization',
                'code' => 'auth',
            ],
            [
                'name' => 'Feeds',
                'code' => 'feeds',
            ],
            [
                'name' => 'Items',
                'code' => 'items',
            ],
            [
                'name' => 'Prices',
                'code' => 'price',
            ],
            [
                'name' => 'Promotions',
                'code' => 'promotion',
            ],
            [
                'name' => 'Inventory',
                'code' => 'inventory',
            ],
            [
                'name' => 'Walmart Fulfillment Services',
                'code' => 'fulfillment',
            ],
            [
                'name' => 'Orders',
                'code' => 'orders',
            ],
            [
                'name' => 'Returns',
                'code' => 'returns',
            ],
            [
                'name' => 'Lag Time',
                'code' => 'lagtime',
            ],
            [
                'name' => 'Insights',
                'code' => 'insights',
            ],
            [
                'name' => 'Pre-generated Reports',
                'code' => 'reports',
            ],
            [
                'name' => 'On-request Reports',
                'code' => 'onrequestreports',
            ],
            [
                'name' => 'Utilities',
                'code' => 'utilities',
            ],
            [
                'name' => 'Rules',
                'code' => 'rules',
            ],
            [
                'name' => 'Settings',
                'code' => 'settings',
            ],
            [
                'name' => 'Notifications',
                'code' => 'notifications',
            ],
        ],
        [
            'name' => 'Warehouse Suppliers',
            'code' => 'warehouse',
            'apis' => [
                [
                    'name' => 'Feeds',
                    'code' => 'feeds',
                ],
                [
                    'name' => 'Items',
                    'code' => 'items',
                ],
                [
                    'name' => 'Reports',
                    'code' => 'reports',
                ],                
            ]
        ]
    ],
];

function downloadSchemas(
    string $path = null,
    array $categories = null,
    array $apis = null,
    array $countries = null
): void {
    if (is_null($path)) {
        $path = getcwd() . '/schemas';
    }

    $cats = null;
    if (is_null($categories)) {
        $cats = API_MAP;
    } else {
        $cats = array_filter(
            API_MAP,
            fn ($cat) => in_array($cat['code'], $categories)
        );
    }

    if (empty($cats)) {
        echo "No matching categories found.\n";
        return;
    }

    $ctrys = null;
    if (is_null($countries)) {
        $ctrys = COUNTRY_CODES;
    } else {
        $ctrys = array_filter(
            COUNTRY_CODES,
            fn ($ctry) => in_array($ctry, $countries)
        );
    }

    if (empty($ctrys)) {
        echo "No matching countries found.\n";
        return;
    }

    $client = new Client([
        'base_uri' => BASE_URL,
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
                $res = $client->post('', [
                    'json' => [
                        'params' => [
                            'category' => $cat['code'],
                            'country' => $country,
                            'apiName' => $api['code'],
                        ],    
                    ],
                ]);

                $contents = json_decode($res->getBody()->getContents(), true);

                if (is_null($contents)) continue;

                file_put_contents("$savePath/{$api['code']}.json", json_encode($contents, JSON_PRETTY_PRINT));
                echo "Downloaded {$api['name']} schema\n";
            }
        }    
    }
}

downloadSchemas();
