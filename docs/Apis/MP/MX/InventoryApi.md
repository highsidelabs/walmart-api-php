# Walmart\Apis\MP\MX\InventoryApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getInventory()**](#getInventory) | **GET** /v3/inventory | Get Inventory |
| [**updateBulkInventory()**](#updateBulkInventory) | **POST** /v3/feeds | Update bulk inventory |
| [**updateInventoryForAnItem()**](#updateInventoryForAnItem) | **PUT** /v3/inventory | Update inventory |


## `getInventory()`

```php
getInventory($sku): \Walmart\Models\MP\MX\Inventory\Inventory
```
Get Inventory

You can use this API to get the inventory for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | A seller-provided Product ID

try {
    $result = $api->getInventory($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getInventory: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| A seller-provided Product ID | |


### Return type

[**\Walmart\Models\MP\MX\Inventory\Inventory**](../../../Models/MP/MX/Inventory/Inventory.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `updateBulkInventory()`

```php
updateBulkInventory($feedType, $file): \Walmart\Models\MP\MX\Inventory\FeedId
```
Update bulk inventory

Updates inventory for items in bulk. Refer to the throttling limits before uploading the Feed files

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$feedType = 'inventory'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->updateBulkInventory($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateBulkInventory: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [default to 'inventory'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\MX\Inventory\FeedId**](../../../Models/MP/MX/Inventory/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `updateInventoryForAnItem()`

```php
updateInventoryForAnItem($sku, $inventory): \Walmart\Models\MP\MX\Inventory\Inventory
```
Update inventory

Updates the inventory for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, identifying each item.
$inventory = {"sku":"sku-e2e-0723x","quantity":{"unit":"EACH","amount":8596}}; // \Walmart\Models\MP\MX\Inventory\Inventory | File fields

try {
    $result = $api->updateInventoryForAnItem($sku, $inventory);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateInventoryForAnItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, identifying each item. | |
| **inventory** | [**\Walmart\Models\MP\MX\Inventory\Inventory**](../../../Models/MP/MX/Inventory/Inventory.md)| File fields | |


### Return type

[**\Walmart\Models\MP\MX\Inventory\Inventory**](../../../Models/MP/MX/Inventory/Inventory.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
