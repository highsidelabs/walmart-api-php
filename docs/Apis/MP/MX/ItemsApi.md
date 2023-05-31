# Walmart\Apis\MP\MX\ItemsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkItemSetup()**](#bulkItemSetup) | **POST** /v3/feeds | Bulk Item Setup |
| [**getAllItems()**](#getAllItems) | **GET** /v3/items | Get all items |
| [**getAnItem()**](#getAnItem) | **GET** /v3/items/{sku} | Get an item |
| [**retireAnItem()**](#retireAnItem) | **DELETE** /v3/items/{SKU} | Retire an item |


## `bulkItemSetup()`

```php
bulkItemSetup($feedType, $file): \Walmart\Models\MP\MX\Items\FeedId
```
Bulk Item Setup

You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB to ensure optimal feed processing time. You can use the Bulk Item Setup API for any of the following item spec versions, just specify the corresponding feed type as a query parameter. Please ensure the WFS onboarding is complete before using WFS Specs or converting items to WFS *   Item spec feed type: item *   WFS Item spec feed type: OMNI_WFSSETUP  * Item spec feed type for 4.x spec: MP_ITEM_INTL  *   Convert an existing item to WFS feed type : OMNI_WFSCONVERT

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->items();

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->bulkItemSetup($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->bulkItemSetup: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\MX\Items\FeedId**](../../../Models/MP/MX/items/FeedId.md)

### Authorization

[basicScheme](../../../README.md#basicScheme), [accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getAllItems()`

```php
getAllItems($nextCursor, $sku, $offset, $limit): \Walmart\Models\MP\MX\Items\ItemResponses
```
Get all items

Displays a list of all items by using either nextCursor or offset and limit query parameters

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->items();

$nextCursor = '*'; // string | Used for pagination when more than 200 items are retrieved.
$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item.
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '20'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $api->getAllItems($nextCursor, $sku, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAllItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **nextCursor** | **string**| Used for pagination when more than 200 items are retrieved. | [optional] [default to '*'] |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. | [optional] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '20'] |


### Return type

[**\Walmart\Models\MP\MX\Items\ItemResponses**](../../../Models/MP/MX/items/ItemResponses.md)

### Authorization

[basicScheme](../../../README.md#basicScheme), [accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getAnItem()`

```php
getAnItem($sku): \Walmart\Models\MP\MX\Items\ItemResponse
```
Get an item

Retrieves an item and displays the item details.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->items();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item.

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
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. | |


### Return type

[**\Walmart\Models\MP\MX\Items\ItemResponse**](../../../Models/MP/MX/items/ItemResponse.md)

### Authorization

[basicScheme](../../../README.md#basicScheme), [accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `retireAnItem()`

```php
retireAnItem($sKU): \Walmart\Models\MP\MX\Items\ItemRetireResponseV2
```
Retire an item

Completely deactivates and un-publishes an item from the site.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->items();

$sKU = 'sKU_example'; // string | SKU

try {
    $result = $api->retireAnItem($sKU);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->retireAnItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sKU** | **string**| SKU | |


### Return type

[**\Walmart\Models\MP\MX\Items\ItemRetireResponseV2**](../../../Models/MP/MX/items/ItemRetireResponseV2.md)

### Authorization

[basicScheme](../../../README.md#basicScheme), [accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
