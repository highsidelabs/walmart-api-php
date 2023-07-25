# Walmart\Apis\MP\US\ReturnsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkItemOverrideFeed()**](#bulkItemOverrideFeed) | **POST** /v3/feeds | Return Item Overrides |
| [**getReturns()**](#getReturns) | **GET** /v3/returns | Returns |
| [**issueRefund()**](#issueRefund) | **POST** /v3/returns/{returnOrderId}/refund | Issue refund |


## `bulkItemOverrideFeed()`

```php
bulkItemOverrideFeed($feedType, $file): \Walmart\Models\MP\US\Returns\FeedId
```
Return Item Overrides

Sellers can specify global settings for returns in Seller Center, and they can override individual item level settings using this API.  Empty values for the settings will remove the existing overriden values and revert them to global settings.  For more details, see the announcement for [Bulk Return Rules](https://sellerhelp.walmart.com/s/guide?article=000008197).

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

$api = Walmart::marketplace($config)->returns();

$feedType = 'RETURNS_OVERRIDES'; // string | Feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->bulkItemOverrideFeed($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReturnsApi->bulkItemOverrideFeed: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Feed Type | [default to 'RETURNS_OVERRIDES'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\US\Returns\FeedId**](../../../Models/MP/US/Returns/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getReturns()`

```php
getReturns($returnOrderId, $customerOrderId, $status, $replacementInfo, $returnType, $returnCreationStartDate, $returnCreationEndDate, $returnLastModifiedStartDate, $returnLastModifiedEndDate, $limit): \Walmart\Models\MP\US\Returns\GetReturnOrdersResponse
```
Returns

Retrieves the details of return orders for the specified filter criteria.

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

$api = Walmart::marketplace($config)->returns();

$returnOrderId = 'returnOrderId_example'; // string | Return order identifier of the return order object as part of array. This is the same as RMA number.
$customerOrderId = 'customerOrderId_example'; // string | A unique ID associated with the sales order for specified customer
$status = 'status_example'; // string | Status may be specified to query the returns with specific status.Valid statuses are: INITIATED, DELIVERED, COMPLETED
$replacementInfo = 'replacementInfo_example'; // string | Provides additional attributes - replacementCustomerOrderID, returnType, rechargeReason, returnCancellationReason - related to Replacement return order, in response, if available. Allowed values are true or false.
$returnType = 'returnType_example'; // string | Specifies if the return order is a replacement return or a regular (refund) return. Possible values are REPLACEMENT or REFUND.
$returnCreationStartDate = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start Date for querying all return orders that were created after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z'
$returnCreationEndDate = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Limits the query to the return orders that were created before this returnCreationEndDate. Use one of the following formats, based on ISO 8601, are allowed: UTC date or timestamp. Examples: '2016-08-16T10:30:30.155Z' or '2016-08-16'
$returnLastModifiedStartDate = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Start Date for querying all return orders that were modified after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z'.In case of dates with timezone, use format '2020-04-17T10:42:41.000+0000' and follow encode '+' with %20
$returnLastModifiedEndDate = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Limits the query to the return orders that were modified before this date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-18T10:30:15Z'.In case of dates with timezone, use format '2020-04-18T10:42:41.000+0000' and follow encode '+' with %20
$limit = '10'; // string | The number of orders to be returned. Cannot be larger than 200

try {
    $result = $api->getReturns($returnOrderId, $customerOrderId, $status, $replacementInfo, $returnType, $returnCreationStartDate, $returnCreationEndDate, $returnLastModifiedStartDate, $returnLastModifiedEndDate, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReturnsApi->getReturns: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **returnOrderId** | **string**| Return order identifier of the return order object as part of array. This is the same as RMA number. | [optional] |
| **customerOrderId** | **string**| A unique ID associated with the sales order for specified customer | [optional] |
| **status** | **string**| Status may be specified to query the returns with specific status.Valid statuses are: INITIATED, DELIVERED, COMPLETED | [optional] |
| **replacementInfo** | **string**| Provides additional attributes - replacementCustomerOrderID, returnType, rechargeReason, returnCancellationReason - related to Replacement return order, in response, if available. Allowed values are true or false. | [optional] |
| **returnType** | **string**| Specifies if the return order is a replacement return or a regular (refund) return. Possible values are REPLACEMENT or REFUND. | [optional] |
| **returnCreationStartDate** | **\DateTime**| Start Date for querying all return orders that were created after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z' | [optional] |
| **returnCreationEndDate** | **\DateTime**| Limits the query to the return orders that were created before this returnCreationEndDate. Use one of the following formats, based on ISO 8601, are allowed: UTC date or timestamp. Examples: '2016-08-16T10:30:30.155Z' or '2016-08-16' | [optional] |
| **returnLastModifiedStartDate** | **\DateTime**| Start Date for querying all return orders that were modified after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z'.In case of dates with timezone, use format '2020-04-17T10:42:41.000+0000' and follow encode '+' with %20 | [optional] |
| **returnLastModifiedEndDate** | **\DateTime**| Limits the query to the return orders that were modified before this date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-18T10:30:15Z'.In case of dates with timezone, use format '2020-04-18T10:42:41.000+0000' and follow encode '+' with %20 | [optional] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 200 | [optional] [default to '10'] |


### Return type

[**\Walmart\Models\MP\US\Returns\GetReturnOrdersResponse**](../../../Models/MP/US/Returns/GetReturnOrdersResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `issueRefund()`

```php
issueRefund($returnOrderId, $refundRequest): \Walmart\Models\MP\US\Returns\RefundResponse
```
Issue refund

This API allows sellers to issue refund against a return order. Multiple return order lines can be refunded in one request.  Note: Sellers can use the Refund Order Lines API for all non-exception category items, including adjustments that seller needs to determine a partial refund amount. Especially for exception category items: HAZMAT, OTHER and FREIGHT that are not eligible for the Marketplace Returns Program.

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

$api = Walmart::marketplace($config)->returns();

$returnOrderId = 'returnOrderId_example'; // string | The return order ID
$refundRequest = {"customerOrderId":"1535274411287","refundLines":[{"returnOrderLineNumber":1,"quantity":{"unitOfMeasure":"EA","measurementValue":2}}]}; // \Walmart\Models\MP\US\Returns\RefundRequest | File fields

try {
    $result = $api->issueRefund($returnOrderId, $refundRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReturnsApi->issueRefund: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **returnOrderId** | **string**| The return order ID | |
| **refundRequest** | [**\Walmart\Models\MP\US\Returns\RefundRequest**](../../../Models/MP/US/Returns/RefundRequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\US\Returns\RefundResponse**](../../../Models/MP/US/Returns/RefundResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
