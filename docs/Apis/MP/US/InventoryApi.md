# Walmart\Apis\MP\US\InventoryApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getInventory()**](#getInventory) | **GET** /v3/inventory | Inventory |
| [**getMultiNodeInventoryForAllSkuAndAllShipNodes()**](#getMultiNodeInventoryForAllSkuAndAllShipNodes) | **GET** /v3/inventories | Multiple Item Inventory for All Ship Nodes |
| [**getMultiNodeInventoryForSkuAndAllShipnodes()**](#getMultiNodeInventoryForSkuAndAllShipnodes) | **GET** /v3/inventories/{sku} | Single Item Inventory by Ship Node |
| [**getWFSInventory()**](#getWFSInventory) | **GET** /v3/fulfillment/inventory | WFS Inventory |
| [**updateBulkInventory()**](#updateBulkInventory) | **POST** /v3/feeds | Bulk Item Inventory Update |
| [**updateInventoryForAnItem()**](#updateInventoryForAnItem) | **PUT** /v3/inventory | Update inventory |
| [**updateMultiNodeInventory()**](#updateMultiNodeInventory) | **PUT** /v3/inventories/{sku} | Update Item Inventory per Ship Node |


## `getInventory()`

```php
getInventory($sku, $shipNode): \Walmart\Models\MP\US\Inventory\Inventory
```
Inventory

You can use this API to get the inventory for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$shipNode = 'shipNode_example'; // string | The shipNode for which the inventory is requested

try {
    $result = $api->getInventory($sku, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getInventory: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **shipNode** | **string**| The shipNode for which the inventory is requested | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\Inventory**](../../../Models/MP/US/Inventory/Inventory.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getMultiNodeInventoryForAllSkuAndAllShipNodes()`

```php
getMultiNodeInventoryForAllSkuAndAllShipNodes($limit, $nextCursor): \Walmart\Models\MP\US\Inventory\MultiNodeInventoryFetchResponseDTO
```
Multiple Item Inventory for All Ship Nodes

This API will retrieve the inventory count for all of a seller's items across all ship nodes by item to ship node mapping. Inventory can be zero or non-zero. Please note that NextCursor value changes and it needs to be passed on from the previous call to next call.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$limit = '10'; // string | The number of items returned. Cannot be more than 50.
$nextCursor = 'nextCursor_example'; // string | String returned from initial API call to indicate pagination. Specify nextCursor value to retrieve the next 50 items.

try {
    $result = $api->getMultiNodeInventoryForAllSkuAndAllShipNodes($limit, $nextCursor);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getMultiNodeInventoryForAllSkuAndAllShipNodes: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **string**| The number of items returned. Cannot be more than 50. | [optional] [default to '10'] |
| **nextCursor** | **string**| String returned from initial API call to indicate pagination. Specify nextCursor value to retrieve the next 50 items. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\MultiNodeInventoryFetchResponseDTO**](../../../Models/MP/US/Inventory/MultiNodeInventoryFetchResponseDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getMultiNodeInventoryForSkuAndAllShipnodes()`

```php
getMultiNodeInventoryForSkuAndAllShipnodes($sku, $shipNode): \Walmart\Models\MP\US\Inventory\MultiNodeInventoryUpdateResponseDTO
```
Single Item Inventory by Ship Node

This API will retrieve the inventory count for an item across all ship nodes or one specific ship node. You can specify the ship node for which you want to fetch the inventory

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$shipNode = 'shipNode_example'; // string | ShipNode Id of the ship node for which the inventory is requested

try {
    $result = $api->getMultiNodeInventoryForSkuAndAllShipnodes($sku, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getMultiNodeInventoryForSkuAndAllShipnodes: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **shipNode** | **string**| ShipNode Id of the ship node for which the inventory is requested | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\MultiNodeInventoryUpdateResponseDTO**](../../../Models/MP/US/Inventory/MultiNodeInventoryUpdateResponseDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getWFSInventory()`

```php
getWFSInventory($sku, $fromModifiedDate, $toModifiedDate, $limit, $offset): \Walmart\Models\MP\US\Inventory\WfsInventoryDTO
```
WFS Inventory

You can use this API to get the current Available to Sell inventory quantities for all WFS items in your catalog. You can also query specific SKUs or filter to only items updated after a specific date in order to reduce the response size.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$fromModifiedDate = 'fromModifiedDate_example'; // string | last inventory modified date - starting range.
$toModifiedDate = 'toModifiedDate_example'; // string | last inventory modified date - starting range.
$limit = '10'; // string | Number of Sku to be returned. Cannot be larger than 300.
$offset = '0'; // string | Offset is the number of records you wish to skip before selecting records.

try {
    $result = $api->getWFSInventory($sku, $fromModifiedDate, $toModifiedDate, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->getWFSInventory: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | [optional] |
| **fromModifiedDate** | **string**| last inventory modified date - starting range. | [optional] |
| **toModifiedDate** | **string**| last inventory modified date - starting range. | [optional] |
| **limit** | **string**| Number of Sku to be returned. Cannot be larger than 300. | [optional] [default to '10'] |
| **offset** | **string**| Offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |


### Return type

[**\Walmart\Models\MP\US\Inventory\WfsInventoryDTO**](../../../Models/MP/US/Inventory/WfsInventoryDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateBulkInventory()`

```php
updateBulkInventory($feedType, $file, $shipNode): \Walmart\Models\MP\US\Inventory\FeedId
```
Bulk Item Inventory Update

Updates inventory for items in bulk.  Seller Can either use feed type \"inventory\" or \"MP_INVENTORY\"  * Inventory spec 1.4 feed type: inventory  * Inventory spec 1.5 feed type: MP_INVENTORY   Please Note: Multi Node Inventory Update Feed (feedType=MP_INVENTORY) only supports JSON Request and Responses. Refer to \"MultiNode_Bulk_Inventory_Update_Request.json\" for the corresponding request sample    Refer to the <a href=\"https://developer.walmart.com/doc/us/us-mp/us-mp-inventory/\">guide section</a> for more detailed guide around each of the feed types    Refer to the throttling limits before uploading the Feed Files.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload
$shipNode = 'shipNode_example'; // string | The shipNode for which the inventory is to be updated. Not required in case of Multi Node Inventory Update Feed (feedType=MP_INVENTORY)

try {
    $result = $api->updateBulkInventory($feedType, $file, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateBulkInventory: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |
| **shipNode** | **string**| The shipNode for which the inventory is to be updated. Not required in case of Multi Node Inventory Update Feed (feedType=MP_INVENTORY) | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\FeedId**](../../../Models/MP/US/Inventory/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateInventoryForAnItem()`

```php
updateInventoryForAnItem($sku, $inventory, $shipNode): \Walmart\Models\MP\US\Inventory\Inventory
```
Update inventory

Updates the inventory for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$inventory = {"sku":"97964_KFTest","quantity":{"unit":"EACH","amount":10}}; // \Walmart\Models\MP\US\Inventory\Inventory | File fields
$shipNode = 'shipNode_example'; // string | The shipNode for which the inventory is to be updated.

try {
    $result = $api->updateInventoryForAnItem($sku, $inventory, $shipNode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateInventoryForAnItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **inventory** | [**\Walmart\Models\MP\US\Inventory\Inventory**](../../../Models/MP/US/Inventory/Inventory.md)| File fields | |
| **shipNode** | **string**| The shipNode for which the inventory is to be updated. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Inventory\Inventory**](../../../Models/MP/US/Inventory/Inventory.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateMultiNodeInventory()`

```php
updateMultiNodeInventory($sku, $multiNodeInventoryUpdateRequestDTO): \Walmart\Models\MP\US\Inventory\MultiNodeInventoryUpdateResponseDTO
```
Update Item Inventory per Ship Node

This API will update the inventory for an item across one or more fulfillment centers, known as ship nodes.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->inventory();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.
$multiNodeInventoryUpdateRequestDTO = {"inventories":{"nodes":[{"shipNode":"1000005050","inputQty":{"unit":"EACH","amount":88}},{"shipNode":"79897837271126017","inputQty":{"unit":"EACH","amount":55}}]}}; // \Walmart\Models\MP\US\Inventory\MultiNodeInventoryUpdateRequestDTO | Request fields

try {
    $result = $api->updateMultiNodeInventory($sku, $multiNodeInventoryUpdateRequestDTO);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InventoryApi->updateMultiNodeInventory: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’ as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |
| **multiNodeInventoryUpdateRequestDTO** | [**\Walmart\Models\MP\US\Inventory\MultiNodeInventoryUpdateRequestDTO**](../../../Models/MP/US/Inventory/MultiNodeInventoryUpdateRequestDTO.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Inventory\MultiNodeInventoryUpdateResponseDTO**](../../../Models/MP/US/Inventory/MultiNodeInventoryUpdateResponseDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
