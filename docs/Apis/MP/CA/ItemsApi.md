# Walmart\Apis\MP\CA\ItemsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkItemSetupCA()**](#bulkItemSetupCA) | **POST** /v3/ca/feeds | Bulk upload |
| [**getAllItems()**](#getAllItems) | **GET** /v3/ca/items | Get all items |
| [**getAnItem()**](#getAnItem) | **GET** /v3/ca/items/{sku} | Get an item |
| [**retireAnItem()**](#retireAnItem) | **DELETE** /v3/ca/items/{SKU} | Retire an item |


## `bulkItemSetupCA()`

```php
bulkItemSetupCA($feedType, $file): \Walmart\Models\MP\CA\Items\BulkItemSetupCA200Response
```
Bulk upload

You can upload items in bulk. If the items are successfully uploaded, it returns a feed ID. Use the returned feed ID to retrieve a feed status. You can use the Bulk Item Setup API for any of the following item spec versions, just specify the corresponding feed type as a query parameter. Please ensure the WFS onboarding is complete before using WFS Specs or converting items to WFS *   Item spec feed type: item *   WFS Item spec feed type: OMNI_WFSSETUP  * Item spec feed type for 4.x spec: MP_ITEM_INTL  *   Convert an existing item to WFS feed type : OMNI_WFSCONVERT

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

$api = Walmart::marketplace($config)->items();

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->bulkItemSetupCA($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->bulkItemSetupCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\CA\Items\BulkItemSetupCA200Response**](../../../Models/MP/CA/items/BulkItemSetupCA200Response.md)

### Authorization



This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAllItems()`

```php
getAllItems($nextCursor, $sku, $offset, $limit): \Walmart\Models\MP\CA\Items\ItemResponses
```
Get all items

Displays a list of all items by using either nextCursor or offset and limit query parameters.   There are two ways of pagination for this API  * Using nextCursor query parameter First call will have the value of nextCursor as '*'. If a call to the endpoint results in a large number of items being returned, the results are sent back in pages. The element nextCursor which is returned in the response is required for pagination.   The nextCursor element contains the string that should be send as a query parameter to the subsequent GET call to get the next page of results.   A missing or empty nextCursor element in the response means that there are no more items left to retrieve. The totalCount returns the total number of available items. Therefore, analysis of the totalCount provides the number of pages to be retrieved to get the whole list of items.  * Using offset and limit query parameter First call to the API using offset=0 will return the first page of the list of items. The full list can be retrieved by subsequent requests to the same API with successively larger values of offset.  If a SKU is included, this request is semantically identical to Get an Item request. It will return only one item and hence pagination is not required.

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

[**\Walmart\Models\MP\CA\Items\ItemResponses**](../../../Models/MP/CA/items/ItemResponses.md)

### Authorization



This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAnItem()`

```php
getAnItem($sku): \Walmart\Models\MP\CA\Items\ItemResponse
```
Get an item

Retrieves an item and displays the item details shown in the response sample.

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

[**\Walmart\Models\MP\CA\Items\ItemResponse**](../../../Models/MP/CA/items/ItemResponse.md)

### Authorization



This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `retireAnItem()`

```php
retireAnItem($sKU): \Walmart\Models\MP\CA\Items\ItemRetireResponseV2
```
Retire an item

Completely deactivates and unpublishes an item from the site.  Retired items are not displayed on Walmart.com, but their content stays intact in our system. You can republish an item by providing future discontinue date for the item.  --- **Note**  You can't reuse the SKU or Product ID from a retired item. If you need to change the SKU or Product ID, see Product ID & SKU section.  ---

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

[**\Walmart\Models\MP\CA\Items\ItemRetireResponseV2**](../../../Models/MP/CA/items/ItemRetireResponseV2.md)

### Authorization



This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
