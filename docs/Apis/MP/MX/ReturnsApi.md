# Walmart\Apis\MP\MX\ReturnsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllReturnsUsingCursor()**](#getAllReturnsUsingCursor) | **GET** /v3/returns/cursor | Get all returns with cursor mark |
| [**getReturns()**](#getReturns) | **GET** /v3/returns | Get Returns |
| [**refundOrderLines()**](#refundOrderLines) | **POST** /v3/returns/{returnOrderId}/refund | Refund Order Lines |


## `getAllReturnsUsingCursor()`

```php
getAllReturnsUsingCursor($returnCreationStartDate, $returnCreationEndDate, $limit, $cursorMark, $customerOrderId, $returnOrderId, $statusCodeFilter, $isWFSEnabled): \Walmart\Models\MP\MX\Returns\GetReturnOrdersResponse
```
Get all returns with cursor mark

Retrieves the details of all return orders for the specified filter criteria. With this API you can get all orders in response, it returns nextCursorMark for the next 100 orders so on and so forth upto the last order. The same API can be used to search a single order based on returnOrderId/ customerOrderId.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->returns();

$returnCreationStartDate = 'NOW-180DAYS'; // string | Start Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format.
$returnCreationEndDate = 'NOW'; // string | End Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format.
$limit = '10'; // string | The number of orders to be returned. Cannot be greater than 100.
$cursorMark = '*'; // string | The cursor from which next set of records to be retrieved.
$customerOrderId = 'customerOrderId_example'; // string
$returnOrderId = 'returnOrderId_example'; // string | The return order ID.
$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Initiated, Completed and Cancelled.
$isWFSEnabled = 'isWFSEnabled_example'; // string | Flag to get WFS returns. Valid value is Y

try {
    $result = $api->getAllReturnsUsingCursor($returnCreationStartDate, $returnCreationEndDate, $limit, $cursorMark, $customerOrderId, $returnOrderId, $statusCodeFilter, $isWFSEnabled);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReturnsApi->getAllReturnsUsingCursor: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **returnCreationStartDate** | **string**| Start Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format. | [optional] [default to 'NOW-180DAYS'] |
| **returnCreationEndDate** | **string**| End Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format. | [optional] [default to 'NOW'] |
| **limit** | **string**| The number of orders to be returned. Cannot be greater than 100. | [optional] [default to '10'] |
| **cursorMark** | **string**| The cursor from which next set of records to be retrieved. | [optional] [default to '*'] |
| **customerOrderId** | **string**|  | [optional] |
| **returnOrderId** | **string**| The return order ID. | [optional] |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Initiated, Completed and Cancelled. | [optional] |
| **isWFSEnabled** | **string**| Flag to get WFS returns. Valid value is Y | [optional] |


### Return type

[**\Walmart\Models\MP\MX\Returns\GetReturnOrdersResponse**](../../../Models/MP/MX/returns/GetReturnOrdersResponse.md)

### Authorization



This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getReturns()`

```php
getReturns($returnCreationStartDate, $returnCreationEndDate, $limit, $offset, $customerOrderId, $returnOrderId, $statusCodeFilter, $isWFSEnabled): \Walmart\Models\MP\MX\Returns\GetReturnOrdersResponse
```
Get Returns

Retrieves the details of all return orders for the specified filter criteria. The same API can be used to search a single order based on returnOrderId/ customerOrderId This API supports only upto an offset of 1000 in response with max limit 100 orders. If you want to fetch more than 1000 then you can use the cursor API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->returns();

$returnCreationStartDate = 'NOW-180DAYS'; // string | Start Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. Use URI encoded time format.
$returnCreationEndDate = 'NOW'; // string | End Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. Use URI encoded time format.
$limit = '10'; // string | The number of orders to be returned. Cannot be greater than 100.
$offset = '0'; // string | The starting offset of the first order required in the response. Cannot be greater than 1000
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID.
$returnOrderId = 'returnOrderId_example'; // string | The return order ID.
$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Initiated, Completed and Cancelled.
$isWFSEnabled = 'isWFSEnabled_example'; // string | Flag to get WFS returns. Valid value is Y

try {
    $result = $api->getReturns($returnCreationStartDate, $returnCreationEndDate, $limit, $offset, $customerOrderId, $returnOrderId, $statusCodeFilter, $isWFSEnabled);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReturnsApi->getReturns: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **returnCreationStartDate** | **string**| Start Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. Use URI encoded time format. | [optional] [default to 'NOW-180DAYS'] |
| **returnCreationEndDate** | **string**| End Date for querying all return orders after that date. Either both the returnCreationStartDate, returnCreationEndDate must be present in the query params or none present. Use URI encoded time format. | [optional] [default to 'NOW'] |
| **limit** | **string**| The number of orders to be returned. Cannot be greater than 100. | [optional] [default to '10'] |
| **offset** | **string**| The starting offset of the first order required in the response. Cannot be greater than 1000 | [optional] [default to '0'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] |
| **returnOrderId** | **string**| The return order ID. | [optional] |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Initiated, Completed and Cancelled. | [optional] |
| **isWFSEnabled** | **string**| Flag to get WFS returns. Valid value is Y | [optional] |


### Return type

[**\Walmart\Models\MP\MX\Returns\GetReturnOrdersResponse**](../../../Models/MP/MX/returns/GetReturnOrdersResponse.md)

### Authorization



This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `refundOrderLines()`

```php
refundOrderLines($returnOrderId, $orderRefundRequest): string
```
Refund Order Lines

Refunds one or more order lines that have been shipped. The response to a successful call contains the order with the refunded line item

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->returns();

$returnOrderId = 'returnOrderId_example'; // string | returnOrderId
$orderRefundRequest = {"orderRefund":{"orderLines":{"orderLine":[{"lineNumber":"1","orderLineStatuses":{"orderLineStatus":[{"status":"Received","statusQuantity":{"unitOfMeasurement":"EACH","amount":"2"}}]}}]}}}; // \Walmart\Models\MP\MX\Returns\OrderRefundRequest | OrderRefund request body

try {
    $result = $api->refundOrderLines($returnOrderId, $orderRefundRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReturnsApi->refundOrderLines: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **returnOrderId** | **string**| returnOrderId | |
| **orderRefundRequest** | [**\Walmart\Models\MP\MX\Returns\OrderRefundRequest**](../../../Models/MP/MX/returns/OrderRefundRequest.md)| OrderRefund request body | |


### Return type

**string**

### Authorization



This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
