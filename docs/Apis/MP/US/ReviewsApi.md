# Walmart\Apis\MP\US\ReviewsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkUpdateItemStatus()**](#bulkUpdateItemStatus) | **PUT** /v3/growth/reviews-accelerator/items/status | Bulk update item status |
| [**getIrpCategories()**](#getIrpCategories) | **POST** /v3/growth/reviews-accelerator/categories | Get categories |
| [**getIrpItems()**](#getIrpItems) | **POST** /v3/growth/reviews-accelerator/items | Get RAP post-purchase items |


## `bulkUpdateItemStatus()`

```php
bulkUpdateItemStatus($bulkItemStatusUpdateRequest): \Walmart\Models\MP\US\Reviews\BulkItemUpdateResponse
```
Bulk update item status

To enroll a product in/out of the Reviews acceleration post-purchase program.

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

$api = Walmart::marketplace($config)->reviews();

$bulkItemStatusUpdateRequest = {"status":"ENROLL","items":[{"itemId":"2719243"},{"itemId":"2719255"}]}; // \Walmart\Models\MP\US\Reviews\BulkItemStatusUpdateRequest | Request fields

try {
    $result = $api->bulkUpdateItemStatus($bulkItemStatusUpdateRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReviewsApi->bulkUpdateItemStatus: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bulkItemStatusUpdateRequest** | [**\Walmart\Models\MP\US\Reviews\BulkItemStatusUpdateRequest**](../../../Models/MP/US/Reviews/BulkItemStatusUpdateRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Reviews\BulkItemUpdateResponse**](../../../Models/MP/US/Reviews/BulkItemUpdateResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getIrpCategories()`

```php
getIrpCategories($getCategoriesRequest): \Walmart\Models\MP\US\Reviews\GetCategoriesResponse
```
Get categories

To get the set of categories the RAP post-purchase items belong to.

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

$api = Walmart::marketplace($config)->reviews();

$getCategoriesRequest = {"itemStatus":["ENROLLED","ELIGIBLE","COMPLETE"]}; // \Walmart\Models\MP\US\Reviews\GetCategoriesRequest | Request payload

try {
    $result = $api->getIrpCategories($getCategoriesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReviewsApi->getIrpCategories: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **getCategoriesRequest** | [**\Walmart\Models\MP\US\Reviews\GetCategoriesRequest**](../../../Models/MP/US/Reviews/GetCategoriesRequest.md)| Request payload | |


### Return type

[**\Walmart\Models\MP\US\Reviews\GetCategoriesResponse**](../../../Models/MP/US/Reviews/GetCategoriesResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getIrpItems()`

```php
getIrpItems($scrollId, $getIrpItemsRequest): \Walmart\Models\MP\US\Reviews\GetIrpItemsResponse
```
Get RAP post-purchase items

To get all eligible products that can be enrolled into the Reviews accelerator post-purchase program. To get all products that are currently enrolled into the program. To get all products that have attained target reviews after enrolment into the program. Products can be filtered by category and price. Products can be sorted by Walmart-recommended item priorities. Searched using wildcards matching the product name and SKU.

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

$api = Walmart::marketplace($config)->reviews();

$scrollId = '*'; // string | Optional parameter specifying the scrollId to return the next set of results.
$getIrpItemsRequest = {"filter":{"itemStatus":"ELIGIBLE"}}; // \Walmart\Models\MP\US\Reviews\GetIrpItemsRequest | Request payload

try {
    $result = $api->getIrpItems($scrollId, $getIrpItemsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReviewsApi->getIrpItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **scrollId** | **string**| Optional parameter specifying the scrollId to return the next set of results. | [default to '*'] |
| **getIrpItemsRequest** | [**\Walmart\Models\MP\US\Reviews\GetIrpItemsRequest**](../../../Models/MP/US/Reviews/GetIrpItemsRequest.md)| Request payload | |


### Return type

[**\Walmart\Models\MP\US\Reviews\GetIrpItemsResponse**](../../../Models/MP/US/Reviews/GetIrpItemsResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
