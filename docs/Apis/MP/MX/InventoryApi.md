# Walmart\Api\MX\MPInventoryApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getInventory()**](InventoryApi.md#getInventory) | **GET** /v3/inventory | Get Inventory |
| [**updateBulkInventory()**](InventoryApi.md#updateBulkInventory) | **POST** /v3/feeds | Update bulk inventory |
| [**updateInventoryForAnItem()**](InventoryApi.md#updateInventoryForAnItem) | **PUT** /v3/inventory | Update inventory |


## `getInventory()`

```php
getInventory($sku): \Walmart\Model\MP\MX\Inventory\GetInventory200Response
```
Get Inventory

You can use this API to get the inventory for a given item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | A seller-provided Product ID

try {
    $result = $apiInstance->getInventory($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getInventory: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| A seller-provided Product ID | |


### Return type

[**\Walmart\Model\MP\MX\Inventory\GetInventory200Response**](../Model/GetInventory200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBulkInventory()`

```php
updateBulkInventory($feedType, $file): \Walmart\Model\MP\MX\Inventory\UpdateBulkInventory200Response
```
Update bulk inventory

Updates inventory for items in bulk. Refer to the throttling limits before uploading the Feed files

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'inventory'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $apiInstance->updateBulkInventory($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateBulkInventory: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [default to 'inventory'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Model\MP\MX\Inventory\UpdateBulkInventory200Response**](../Model/UpdateBulkInventory200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateInventoryForAnItem()`

```php
updateInventoryForAnItem($sku, $updateInventoryForAnItemRequest): \Walmart\Model\MP\MX\Inventory\GetInventory200Response
```
Update inventory

Updates the inventory for a given item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, identifying each item.
$updateInventoryForAnItemRequest = {"sku":"sku-e2e-0723x","quantity":{"unit":"EACH","amount":8596}}; // \Walmart\Model\MP\MX\Inventory\UpdateInventoryForAnItemRequest | File fields

try {
    $result = $apiInstance->updateInventoryForAnItem($sku, $updateInventoryForAnItemRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateInventoryForAnItem: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, identifying each item. | |
| **updateInventoryForAnItemRequest** | [**\Walmart\Model\MP\MX\Inventory\UpdateInventoryForAnItemRequest**](../Model/UpdateInventoryForAnItemRequest.md)| File fields | |


### Return type

[**\Walmart\Model\MP\MX\Inventory\GetInventory200Response**](../Model/GetInventory200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
