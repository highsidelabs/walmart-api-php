# Walmart\Apis\DSV\US\ItemsApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllItems()**](#getAllItems) | **GET** /v3/items | All items |
| [**getAnItem()**](#getAnItem) | **GET** /v3/items/{sku} | An item |
| [**itemBulkUploads()**](#itemBulkUploads) | **POST** /v3/feeds | Bulk Item Setup |


## `getAllItems()`

```php
getAllItems($nextCursor, $sku): \Walmart\Models\DSV\US\Items\ItemResponses
```
All items

Displays a list of all items. If no SKU is included in this request, all items are retrieved from all pages. The full list can be retrieved by subsequent requests to the same API with successively larger values of offset. If a SKU is included, this request is semantically identical to the Get an Item request.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::dropShipVendor($config)->items();

$nextCursor = '*'; // string | Used for paginated results - use the nextCursor response element from the prior API call.
$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the DSV, which identifies each item. This will be used by the DSV in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $api->getAllItems($nextCursor, $sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAllItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **nextCursor** | **string**| Used for paginated results - use the nextCursor response element from the prior API call. | [optional] [default to '*'] |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the DSV, which identifies each item. This will be used by the DSV in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | [optional] |


### Return type

[**\Walmart\Models\DSV\US\Items\ItemResponses**](../Model/ItemResponses.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/DSV/US)
[[Back to README]](../../../../README.md)

## `getAnItem()`

```php
getAnItem($sku): \Walmart\Models\DSV\US\Items\ItemResponse
```
An item

Retrieves an item and displays the item details.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::dropShipVendor($config)->items();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the DSV, which identifies each item. This will be used by the DSV in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $api->getAnItem($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAnItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the DSV, which identifies each item. This will be used by the DSV in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | |


### Return type

[**\Walmart\Models\DSV\US\Items\ItemResponse**](../Model/ItemResponse.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/DSV/US)
[[Back to README]](../../../../README.md)

## `itemBulkUploads()`

```php
itemBulkUploads($feedType, $file): \Walmart\Models\DSV\US\Items\ItemBulkUploads200Response
```
Bulk Item Setup

Updates items in bulk.  You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB to ensure optimal feed processing time.  Once the XML request is built using the Drop Ship Vendor Feeds XSD, you can pass the payload using the Drop Ship Vendor Feed API.  You must use the relevant category XSD to build the XML payload. The Drop Ship Vendor Feed XSD must use a category-specific XSD for each ingested item. For example, if you need to sell a TV on Walmart.com, first you must use the Electronic Category XSD to define all of the TV’s elements, and then you should add it to the Drop Ship Vendor Product XSD.  To get the Feed Status for a specific Product ID, use the Feed Item Status API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::dropShipVendor($config)->items();

$feedType = 'SUPPLIER_FULL_ITEM'; // string | The Drop Ship Vendor Feed type. Must be SUPPLIER_FULL_ITEM.
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->itemBulkUploads($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->itemBulkUploads: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The Drop Ship Vendor Feed type. Must be SUPPLIER_FULL_ITEM. | [default to 'SUPPLIER_FULL_ITEM'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\DSV\US\Items\ItemBulkUploads200Response**](../Model/ItemBulkUploads200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/DSV/US)
[[Back to README]](../../../../README.md)
