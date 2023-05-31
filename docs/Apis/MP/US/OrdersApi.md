# Walmart\Apis\MP\US\OrdersApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**acknowledgeOrders()**](#acknowledgeOrders) | **POST** /v3/orders/{purchaseOrderId}/acknowledge | Acknowledge Orders |
| [**cancelOrderLines()**](#cancelOrderLines) | **POST** /v3/orders/{purchaseOrderId}/cancel | Cancel Order Lines |
| [**getAllOrders()**](#getAllOrders) | **GET** /v3/orders | All orders |
| [**getAllReleasedOrders()**](#getAllReleasedOrders) | **GET** /v3/orders/released | All released orders |
| [**getAnOrder()**](#getAnOrder) | **GET** /v3/orders/{purchaseOrderId} | An order |
| [**refundOrderLines()**](#refundOrderLines) | **POST** /v3/orders/{purchaseOrderId}/refund | Refund Order Lines |
| [**shippingUpdates()**](#shippingUpdates) | **POST** /v3/orders/{purchaseOrderId}/shipping | Ship Order Lines |


## `acknowledgeOrders()`

```php
acknowledgeOrders($purchaseOrderId): \Walmart\Models\MP\US\Orders\ShippingUpdates200Response
```
Acknowledge Orders

You can use this API to acknowledge an entire order, including all of its order lines. The response to a successful call contains the acknowledged order.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId

try {
    $result = $api->acknowledgeOrders($purchaseOrderId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->acknowledgeOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |


### Return type

[**\Walmart\Models\MP\US\Orders\ShippingUpdates200Response**](../Model/ShippingUpdates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `cancelOrderLines()`

```php
cancelOrderLines($purchaseOrderId, $cancelOrderLinesRequest): \Walmart\Models\MP\US\Orders\ShippingUpdates200Response
```
Cancel Order Lines

You can cancel one or more order lines. You must include a purchaseOrderId when cancelling an order line. The response to a successful call contains the order with the cancelled line items

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$cancelOrderLinesRequest = {"orderCancellation":{"orderLines":{"orderLine":[{"lineNumber":"1","orderLineStatuses":{"orderLineStatus":[{"status":"Cancelled","cancellationReason":"CUSTOMER_REQUESTED_SELLER_TO_CANCEL","statusQuantity":{"unitOfMeasurement":"EA","amount":"1"}}]}}]}}}; // \Walmart\Models\MP\US\Orders\CancelOrderLinesRequest | File fields

try {
    $result = $api->cancelOrderLines($purchaseOrderId, $cancelOrderLinesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->cancelOrderLines: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **cancelOrderLinesRequest** | [**\Walmart\Models\MP\US\Orders\CancelOrderLinesRequest**](../Model/CancelOrderLinesRequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\US\Orders\ShippingUpdates200Response**](../Model/ShippingUpdates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllOrders()`

```php
getAllOrders($sku, $customerOrderId, $purchaseOrderId, $status, $createdStartDate, $createdEndDate, $fromExpectedShipDate, $toExpectedShipDate, $lastModifiedStartDate, $lastModifiedEndDate, $limit, $productInfo, $shipNodeType, $shippingProgramType, $replacementInfo, $orderType): \Walmart\Models\MP\US\Orders\GetAllOrders200Response
```
All orders

Retrieves the details of all the orders for specified search criteria.  Only orders created in last 180 days and a maximum of 20000 orders can be fetched at a time. Attempting to download more than 20000 orders will return an error.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$sku = 'sku_example'; // string | A seller-provided Product ID
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID. One customer may have multiple purchase orders.
$status = 'status_example'; // string | Status of purchase order line. Valid statuses are: Created, Acknowledged, Shipped, Delivered and Cancelled.
$createdStartDate = 'createdStartDate_example'; // string | Fetches all purchase orders that were created after this date. Default is current date - 7 days. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ).
$createdEndDate = 'createdEndDate_example'; // string | Fetches all purchase orders that were created before this date. Default is current date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ).
$fromExpectedShipDate = 'fromExpectedShipDate_example'; // string | Fetches all purchase orders that have order lines with an expected ship date after this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ)
$toExpectedShipDate = 'toExpectedShipDate_example'; // string | Fetches all purchase orders that have order lines with an expected ship date before this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ)
$lastModifiedStartDate = 'lastModifiedStartDate_example'; // string | Fetches all purchase orders that were modified after this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ).
$lastModifiedEndDate = 'lastModifiedEndDate_example'; // string | Fetches all purchase orders that were modified before this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ).
$limit = '100'; // string | The number of orders to be returned. Cannot be larger than 200.
$productInfo = 'false'; // string | Provides the image URL and product weight in response, if available. Allowed values are true or false.
$shipNodeType = 'SellerFulfilled'; // string | Specifies the type of shipNode. Allowed values are SellerFulfilled(Default), WFSFulfilled and 3PLFulfilled.
$shippingProgramType = 'shippingProgramType_example'; // string | Specifies the type of program. Allowed value is TWO_DAY.
$replacementInfo = 'false'; // string | Provides additional attributes - originalCustomerOrderID, orderType - related to Replacement order, in response, if available. Allowed values are true or false.
$orderType = 'orderType_example'; // string | Specifies if the order is a regular order or replacement order. Possible values are REGULAR or REPLACEMENT. Provided in response only if query parameter replacementInfo=true.

try {
    $result = $api->getAllOrders($sku, $customerOrderId, $purchaseOrderId, $status, $createdStartDate, $createdEndDate, $fromExpectedShipDate, $toExpectedShipDate, $lastModifiedStartDate, $lastModifiedEndDate, $limit, $productInfo, $shipNodeType, $shippingProgramType, $replacementInfo, $orderType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| A seller-provided Product ID | [optional] |
| **customerOrderId** | **string**| The customer order ID | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. One customer may have multiple purchase orders. | [optional] |
| **status** | **string**| Status of purchase order line. Valid statuses are: Created, Acknowledged, Shipped, Delivered and Cancelled. | [optional] |
| **createdStartDate** | **string**| Fetches all purchase orders that were created after this date. Default is current date - 7 days. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ). | [optional] |
| **createdEndDate** | **string**| Fetches all purchase orders that were created before this date. Default is current date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ). | [optional] |
| **fromExpectedShipDate** | **string**| Fetches all purchase orders that have order lines with an expected ship date after this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ) | [optional] |
| **toExpectedShipDate** | **string**| Fetches all purchase orders that have order lines with an expected ship date before this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ) | [optional] |
| **lastModifiedStartDate** | **string**| Fetches all purchase orders that were modified after this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ). | [optional] |
| **lastModifiedEndDate** | **string**| Fetches all purchase orders that were modified before this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ). | [optional] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 200. | [optional] [default to '100'] |
| **productInfo** | **string**| Provides the image URL and product weight in response, if available. Allowed values are true or false. | [optional] [default to 'false'] |
| **shipNodeType** | **string**| Specifies the type of shipNode. Allowed values are SellerFulfilled(Default), WFSFulfilled and 3PLFulfilled. | [optional] [default to 'SellerFulfilled'] |
| **shippingProgramType** | **string**| Specifies the type of program. Allowed value is TWO_DAY. | [optional] |
| **replacementInfo** | **string**| Provides additional attributes - originalCustomerOrderID, orderType - related to Replacement order, in response, if available. Allowed values are true or false. | [optional] [default to 'false'] |
| **orderType** | **string**| Specifies if the order is a regular order or replacement order. Possible values are REGULAR or REPLACEMENT. Provided in response only if query parameter replacementInfo=true. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Orders\GetAllOrders200Response**](../Model/GetAllOrders200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllReleasedOrders()`

```php
getAllReleasedOrders($createdStartDate, $createdEndDate, $limit, $productInfo, $shipNodeType, $sku, $customerOrderId, $purchaseOrderId, $fromExpectedShipDate, $toExpectedShipDate, $shippingProgramType, $replacementInfo, $orderType): \Walmart\Models\MP\US\Orders\GetAllOrders200Response
```
All released orders

Retrieves all the orders with line items that are in the \"created\" status, that is, these orders have been released from the Walmart Order Management System to the seller for processing. The released orders are the orders that are ready for a seller to fulfill.  Only orders created in last 180 days and a maximum of 20000 orders can be fetched at a time. Attempting to download more than 20000 orders will return an error.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$createdStartDate = 'createdStartDate_example'; // string | Fetches all purchase orders that were created after this date. Default is current date - 7 days. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ).
$createdEndDate = 'createdEndDate_example'; // string | Fetches all purchase orders that were created before this date. Default is current date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ).
$limit = '100'; // string | The number of orders to be returned. Cannot be larger than 200.
$productInfo = 'false'; // string | Provides the image URL and product weight in response, if available. Allowed values are true or false.
$shipNodeType = 'SellerFulfilled'; // string | Specifies the type of shipNode. Allowed values are SellerFulfilled(Default), WFSFulfilled and 3PLFulfilled.
$sku = 'sku_example'; // string | A seller-provided Product ID
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID. One customer may have multiple purchase orders.
$fromExpectedShipDate = 'fromExpectedShipDate_example'; // string | Fetches all purchase orders that have order lines with an expected ship date after this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ)
$toExpectedShipDate = 'toExpectedShipDate_example'; // string | Fetches all purchase orders that have order lines with an expected ship date before this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ)
$shippingProgramType = 'shippingProgramType_example'; // string | Specifies the type of program. Allowed value is TWO_DAY.
$replacementInfo = 'false'; // string | Provides additional attributes - originalCustomerOrderID, orderType - related to Replacement order, in response, if available. Allowed values are true or false.
$orderType = 'orderType_example'; // string | Specifies if the order is a regular order or replacement order. Possible values are REGULAR or REPLACEMENT. Provided in response only if query parameter replacementInfo=true.

try {
    $result = $api->getAllReleasedOrders($createdStartDate, $createdEndDate, $limit, $productInfo, $shipNodeType, $sku, $customerOrderId, $purchaseOrderId, $fromExpectedShipDate, $toExpectedShipDate, $shippingProgramType, $replacementInfo, $orderType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllReleasedOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Fetches all purchase orders that were created after this date. Default is current date - 7 days. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ). | [optional] |
| **createdEndDate** | **string**| Fetches all purchase orders that were created before this date. Default is current date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ). | [optional] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 200. | [optional] [default to '100'] |
| **productInfo** | **string**| Provides the image URL and product weight in response, if available. Allowed values are true or false. | [optional] [default to 'false'] |
| **shipNodeType** | **string**| Specifies the type of shipNode. Allowed values are SellerFulfilled(Default), WFSFulfilled and 3PLFulfilled. | [optional] [default to 'SellerFulfilled'] |
| **sku** | **string**| A seller-provided Product ID | [optional] |
| **customerOrderId** | **string**| The customer order ID | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. One customer may have multiple purchase orders. | [optional] |
| **fromExpectedShipDate** | **string**| Fetches all purchase orders that have order lines with an expected ship date after this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ) | [optional] |
| **toExpectedShipDate** | **string**| Fetches all purchase orders that have order lines with an expected ship date before this date. Use either UTC or ISO 8601 formats. Date example: '2020-03-16'(yyyy-MM-dd). Date with Timestamp example: '2020-03-16T10:30:15Z'(yyyy-MM-dd'T'HH:mm:ssZ) | [optional] |
| **shippingProgramType** | **string**| Specifies the type of program. Allowed value is TWO_DAY. | [optional] |
| **replacementInfo** | **string**| Provides additional attributes - originalCustomerOrderID, orderType - related to Replacement order, in response, if available. Allowed values are true or false. | [optional] [default to 'false'] |
| **orderType** | **string**| Specifies if the order is a regular order or replacement order. Possible values are REGULAR or REPLACEMENT. Provided in response only if query parameter replacementInfo=true. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Orders\GetAllOrders200Response**](../Model/GetAllOrders200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAnOrder()`

```php
getAnOrder($purchaseOrderId, $productInfo, $replacementInfo): \Walmart\Models\MP\US\Orders\GetAnOrder200Response
```
An order

Retrieves an order detail for a specific purchaseOrderId

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$productInfo = 'false'; // string | Provides the image URL and product weight in response, if available. Allowed values are true or false.
$replacementInfo = 'false'; // string | Provides additional attributes - originalCustomerOrderID, orderType - related to Replacement order, in response, if available. Allowed values are true or false.

try {
    $result = $api->getAnOrder($purchaseOrderId, $productInfo, $replacementInfo);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAnOrder: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **productInfo** | **string**| Provides the image URL and product weight in response, if available. Allowed values are true or false. | [optional] [default to 'false'] |
| **replacementInfo** | **string**| Provides additional attributes - originalCustomerOrderID, orderType - related to Replacement order, in response, if available. Allowed values are true or false. | [optional] [default to 'false'] |


### Return type

[**\Walmart\Models\MP\US\Orders\GetAnOrder200Response**](../Model/GetAnOrder200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `refundOrderLines()`

```php
refundOrderLines($purchaseOrderId, $refundOrderLinesRequest): \Walmart\Models\MP\US\Orders\ShippingUpdates200Response
```
Refund Order Lines

Refunds one or more order lines that have been shipped. The response to a successful call contains the order with the refunded line items

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$refundOrderLinesRequest = {"orderRefund":{"purchaseOrderId":"2577453162650","orderLines":{"orderLine":[{"lineNumber":"4","isFullRefund":false,"refunds":{"refund":[{"refundComments":"test test","refundCharges":{"refundCharge":[{"refundReason":"Merchandise not received","charge":{"chargeType":"PRODUCT","chargeName":"Item Price","chargeAmount":{"currency":"USD","amount":-0.1},"tax":{"taxName":"Item Price Tax","taxAmount":{"currency":"USD","amount":-0.1}}}}]}}]}}]}}}; // \Walmart\Models\MP\US\Orders\RefundOrderLinesRequest | File fields

try {
    $result = $api->refundOrderLines($purchaseOrderId, $refundOrderLinesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->refundOrderLines: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **refundOrderLinesRequest** | [**\Walmart\Models\MP\US\Orders\RefundOrderLinesRequest**](../Model/RefundOrderLinesRequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\US\Orders\ShippingUpdates200Response**](../Model/ShippingUpdates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `shippingUpdates()`

```php
shippingUpdates($purchaseOrderId, $shippingUpdatesRequest): \Walmart\Models\MP\US\Orders\ShippingUpdates200Response
```
Ship Order Lines

Updates the status of order lines to Shipped and trigger the charge to the customer. The response to a successful call contains the order with the shipped line items.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$shippingUpdatesRequest = {"orderShipment":{"orderLines":{"orderLine":[{"lineNumber":"1","intentToCancelOverride":false,"sellerOrderId":"92344","orderLineStatuses":{"orderLineStatus":[{"status":"Shipped","statusQuantity":{"unitOfMeasurement":"EACH","amount":"1"},"trackingInfo":{"shipDateTime":1580821866000,"carrierName":{"carrier":"UPS"},"methodCode":"Standard","trackingNumber":"22344","trackingURL":"http://walmart/tracking/ups?&type=MP&seller_id=12345&promise_date=03/02/2020&dzip=92840&tracking_numbers=92345"},"returnCenterAddress":{"name":"walmart","address1":"walmart store 2","city":"Huntsville","state":"AL","postalCode":"35805","country":"USA","dayPhone":"12344","emailId":"walmart@walmart.com"}}]}},{"lineNumber":"2","sellerOrderId":"92344","orderLineStatuses":{"orderLineStatus":[{"status":"Shipped","statusQuantity":{"unitOfMeasurement":"EACH","amount":"1"},"trackingInfo":{"shipDateTime":1580821866000,"carrierName":{"carrier":"FedEx"},"methodCode":"Express","trackingNumber":"22344","trackingURL":"http://walmart/tracking/fedEx?&type=MP&seller_id=12345&promise_date=03/02/2020&dzip=92840&tracking_numbers=92344"},"returnCenterAddress":{"name":"walmart","address1":"walmart store 2","city":"Huntsville","state":"AL","postalCode":"35805","country":"USA","dayPhone":"12344","emailId":"walmart@walmart.com"}}]}}]}}}; // \Walmart\Models\MP\US\Orders\ShippingUpdatesRequest | File fields

try {
    $result = $api->shippingUpdates($purchaseOrderId, $shippingUpdatesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->shippingUpdates: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **shippingUpdatesRequest** | [**\Walmart\Models\MP\US\Orders\ShippingUpdatesRequest**](../Model/ShippingUpdatesRequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\US\Orders\ShippingUpdates200Response**](../Model/ShippingUpdates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
