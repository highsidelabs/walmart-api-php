# Walmart\Api\US\MPInventoryApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getInventory()**](InventoryApi.md#getInventory) | **GET** /v3/inventory | Inventory |
| [**getMultiNodeInventoryForAllSkuAndAllShipNodes()**](InventoryApi.md#getMultiNodeInventoryForAllSkuAndAllShipNodes) | **GET** /v3/inventories | Multiple Item Inventory for All Ship Nodes |
| [**getMultiNodeInventoryForSkuAndAllShipnodes()**](InventoryApi.md#getMultiNodeInventoryForSkuAndAllShipnodes) | **GET** /v3/inventories/{sku} | Single Item Inventory by Ship Node |
| [**getWFSInventory()**](InventoryApi.md#getWFSInventory) | **GET** /v3/fulfillment/inventory | WFS Inventory |
| [**updateBulkInventory()**](InventoryApi.md#updateBulkInventory) | **POST** /v3/feeds | Bulk Item Inventory Update |
| [**updateInventoryForAnItem()**](InventoryApi.md#updateInventoryForAnItem) | **PUT** /v3/inventory | Update inventory |
| [**updateMultiNodeInventory()**](InventoryApi.md#updateMultiNodeInventory) | **PUT** /v3/inventories/{sku} | Update Item Inventory per Ship Node |


## `getInventory()`

```php
getInventory($sku, $shipNode): \Walmart\Models\MP\US\Inventory\GetInventory200Response
```
Inventory

You can use this API to get the inventory for a given item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$shipNode = 'shipNode_example'; // string | The shipNode for which the inventory is requested

try {
    $result = $apiInstance->getInventory($sku, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getInventory: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **shipNode** | **string**| The shipNode for which the inventory is requested | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\GetInventory200Response**](../Model/GetInventory200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMultiNodeInventoryForAllSkuAndAllShipNodes()`

```php
getMultiNodeInventoryForAllSkuAndAllShipNodes($limit, $nextCursor): \Walmart\Models\MP\US\Inventory\GetMultiNodeInventoryForAllSkuAndAllShipNodes200Response
```
Multiple Item Inventory for All Ship Nodes

This API will retrieve the inventory count for all of a seller's items across all ship nodes by item to ship node mapping. Inventory can be zero or non-zero. Please note that NextCursor value changes and it needs to be passed on from the previous call to next call.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$limit = '10'; // string | The number of items returned. Cannot be more than 50.
$nextCursor = 'nextCursor_example'; // string | String returned from initial API call to indicate pagination. Specify nextCursor value to retrieve the next 50 items.

try {
    $result = $apiInstance->getMultiNodeInventoryForAllSkuAndAllShipNodes($limit, $nextCursor);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getMultiNodeInventoryForAllSkuAndAllShipNodes: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **string**| The number of items returned. Cannot be more than 50. | [optional] [default to '10'] |
| **nextCursor** | **string**| String returned from initial API call to indicate pagination. Specify nextCursor value to retrieve the next 50 items. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\GetMultiNodeInventoryForAllSkuAndAllShipNodes200Response**](../Model/GetMultiNodeInventoryForAllSkuAndAllShipNodes200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMultiNodeInventoryForSkuAndAllShipnodes()`

```php
getMultiNodeInventoryForSkuAndAllShipnodes($sku, $shipNode): \Walmart\Models\MP\US\Inventory\GetMultiNodeInventoryForSkuAndAllShipnodes200Response
```
Single Item Inventory by Ship Node

This API will retrieve the inventory count for an item across all ship nodes or one specific ship node. You can specify the ship node for which you want to fetch the inventory

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$shipNode = 'shipNode_example'; // string | ShipNode Id of the ship node for which the inventory is requested

try {
    $result = $apiInstance->getMultiNodeInventoryForSkuAndAllShipnodes($sku, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getMultiNodeInventoryForSkuAndAllShipnodes: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **shipNode** | **string**| ShipNode Id of the ship node for which the inventory is requested | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\GetMultiNodeInventoryForSkuAndAllShipnodes200Response**](../Model/GetMultiNodeInventoryForSkuAndAllShipnodes200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWFSInventory()`

```php
getWFSInventory($sku, $fromModifiedDate, $toModifiedDate, $limit, $offset): \Walmart\Models\MP\US\Inventory\GetWFSInventory200Response
```
WFS Inventory

You can use this API to get the current Available to Sell inventory quantities for all WFS items in your catalog. You can also query specific SKUs or filter to only items updated after a specific date in order to reduce the response size.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$fromModifiedDate = 'fromModifiedDate_example'; // string | last inventory modified date - starting range.
$toModifiedDate = 'toModifiedDate_example'; // string | last inventory modified date - starting range.
$limit = '10'; // string | Number of Sku to be returned. Cannot be larger than 300.
$offset = '0'; // string | Offset is the number of records you wish to skip before selecting records.

try {
    $result = $apiInstance->getWFSInventory($sku, $fromModifiedDate, $toModifiedDate, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getWFSInventory: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | [optional] |
| **fromModifiedDate** | **string**| last inventory modified date - starting range. | [optional] |
| **toModifiedDate** | **string**| last inventory modified date - starting range. | [optional] |
| **limit** | **string**| Number of Sku to be returned. Cannot be larger than 300. | [optional] [default to '10'] |
| **offset** | **string**| Offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |


### Return type

[**\Walmart\Models\MP\US\Inventory\GetWFSInventory200Response**](../Model/GetWFSInventory200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBulkInventory()`

```php
updateBulkInventory($feedType, $file, $shipNode): \Walmart\Models\MP\US\Inventory\UpdateBulkInventory200Response
```
Bulk Item Inventory Update

Updates inventory for items in bulk.  Seller Can either use feed type \"inventory\" or \"MP_INVENTORY\"  * Inventory spec 1.4 feed type: inventory  * Inventory spec 1.5 feed type: MP_INVENTORY   Please Note: Multi Node Inventory Update Feed (feedType=MP_INVENTORY) only supports JSON Request and Responses. Refer to \"MultiNode_Bulk_Inventory_Update_Request.json\" for the corresponding request sample    Refer to the <a href=\"https://developer.walmart.com/doc/us/us-mp/us-mp-inventory/\">guide section</a> for more detailed guide around each of the feed types    Refer to the throttling limits before uploading the Feed Files.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload
$shipNode = 'shipNode_example'; // string | The shipNode for which the inventory is to be updated. Not required in case of Multi Node Inventory Update Feed (feedType=MP_INVENTORY)

try {
    $result = $apiInstance->updateBulkInventory($feedType, $file, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateBulkInventory: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |
| **shipNode** | **string**| The shipNode for which the inventory is to be updated. Not required in case of Multi Node Inventory Update Feed (feedType=MP_INVENTORY) | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\UpdateBulkInventory200Response**](../Model/UpdateBulkInventory200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateInventoryForAnItem()`

```php
updateInventoryForAnItem($sku, $updateInventoryForAnItemRequest, $shipNode): \Walmart\Models\MP\US\Inventory\GetInventory200Response
```
Update inventory

Updates the inventory for a given item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$updateInventoryForAnItemRequest = {"sku":"97964_KFTest","quantity":{"unit":"EACH","amount":10}}; // \Walmart\Models\MP\US\Inventory\UpdateInventoryForAnItemRequest | File fields
$shipNode = 'shipNode_example'; // string | The shipNode for which the inventory is to be updated.

try {
    $result = $apiInstance->updateInventoryForAnItem($sku, $updateInventoryForAnItemRequest, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateInventoryForAnItem: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **updateInventoryForAnItemRequest** | [**\Walmart\Models\MP\US\Inventory\UpdateInventoryForAnItemRequest**](../Model/UpdateInventoryForAnItemRequest.md)| File fields | |
| **shipNode** | **string**| The shipNode for which the inventory is to be updated. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\GetInventory200Response**](../Model/GetInventory200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateMultiNodeInventory()`

```php
updateMultiNodeInventory($sku, $updateMultiNodeInventoryRequest): \Walmart\Models\MP\US\Inventory\UpdateMultiNodeInventory200Response
```
Update Item Inventory per Ship Node

This API will update the inventory for an item across one or more fulfillment centers, known as ship nodes.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\InventoryApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$updateMultiNodeInventoryRequest = {"inventories":{"nodes":[{"shipNode":"1000005050","inputQty":{"unit":"EACH","amount":88}},{"shipNode":"79897837271126017","inputQty":{"unit":"EACH","amount":55}}]}}; // \Walmart\Models\MP\US\Inventory\UpdateMultiNodeInventoryRequest | Request fields

try {
    $result = $apiInstance->updateMultiNodeInventory($sku, $updateMultiNodeInventoryRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateMultiNodeInventory: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **updateMultiNodeInventoryRequest** | [**\Walmart\Models\MP\US\Inventory\UpdateMultiNodeInventoryRequest**](../Model/UpdateMultiNodeInventoryRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Inventory\UpdateMultiNodeInventory200Response**](../Model/UpdateMultiNodeInventory200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
