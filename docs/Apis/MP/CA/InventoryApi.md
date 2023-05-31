# Walmart\Apis\MP\CA\InventoryApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getInventory()**](#getInventory) | **GET** /v3/ca/inventory | Inventory |
| [**updateBulkInventory()**](#updateBulkInventory) | **POST** /v3/ca/feeds | Bulk update |
| [**updateInventoryForAnItemCA()**](#updateInventoryForAnItemCA) | **PUT** /v3/ca/inventory | Update inventory |


## `getInventory()`

```php
getInventory($sku): \Walmart\Models\MP\CA\Inventory\InventoryV2
```
Inventory

You can use this API to get the inventory for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item.

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
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. | |


### Return type

[**\Walmart\Models\MP\CA\Inventory\InventoryV2**](../../../Models/MP/CA/inventory/InventoryV2.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `updateBulkInventory()`

```php
updateBulkInventory($feedType, $file): \Walmart\Models\MP\CA\Inventory\UpdateBulkInventory200Response
```
Bulk update

Updates inventory for items in bulk. Refer to the throttling limits before uploading the Feed files

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
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

[**\Walmart\Models\MP\CA\Inventory\UpdateBulkInventory200Response**](../../../Models/MP/CA/inventory/UpdateBulkInventory200Response.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `updateInventoryForAnItemCA()`

```php
updateInventoryForAnItemCA($sku, $inventoryV2): \Walmart\Models\MP\CA\Inventory\InventoryV2
```
Update inventory

Updates the inventory for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, identifying each item.
$inventoryV2 = <?xml version="1.0" encoding="UTF-8"?>
<inventory xmlns="http://walmart.com/">
    <sku>1068155</sku>
    <quantity>
        <unit>EACH</unit>
        <amount>3</amount>
    </quantity>
    <fulfillmentLagTime>1</fulfillmentLagTime>
</inventory>; // \Walmart\Models\MP\CA\Inventory\InventoryV2 | File fields

try {
    $result = $api->updateInventoryForAnItemCA($sku, $inventoryV2);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateInventoryForAnItemCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, identifying each item. | |
| **inventoryV2** | [**\Walmart\Models\MP\CA\Inventory\InventoryV2**](../../../Models/MP/CA/inventory/InventoryV2.md)| File fields | |


### Return type

[**\Walmart\Models\MP\CA\Inventory\InventoryV2**](../../../Models/MP/CA/inventory/InventoryV2.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
