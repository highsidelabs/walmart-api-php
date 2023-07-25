# Walmart\Apis\MP\MX\OrdersApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**acknowledgeOrders()**](#acknowledgeOrders) | **POST** /v3/orders/{purchaseOrderId}/acknowledge | Acknowledge Orders |
| [**cancelOrderLines()**](#cancelOrderLines) | **POST** /v3/orders/{purchaseOrderId}/cancel | Cancel Order Lines |
| [**deliveryUpdates()**](#deliveryUpdates) | **POST** /v3/orders/{purchaseOrderId}/deliver | Delivery Updates |
| [**getAllOrders()**](#getAllOrders) | **GET** /v3/orders | Get all orders |
| [**getAllOrdersUsingCursor()**](#getAllOrdersUsingCursor) | **GET** /v3/orders/cursor | Get all orders using cursor mark |
| [**getAllWFSOrders()**](#getAllWFSOrders) | **GET** /v3/orders/wfsorders | Get all WFS orders |
| [**getShippingLabel()**](#getShippingLabel) | **GET** /v3/orders/label/{trackingNumber} | Get Shipping Label |
| [**postBulkShippingLabel()**](#postBulkShippingLabel) | **POST** /v3/orders/labels | Bulk Shipping Label |
| [**shippingUpdates()**](#shippingUpdates) | **POST** /v3/orders/{purchaseOrderId}/ship | Shipping Updates |


## `acknowledgeOrders()`

```php
acknowledgeOrders($purchaseOrderId, $orderAckRequest): string
```
Acknowledge Orders

You can use this API to acknowledge an entire order, including all of its order lines. The response to a successful call contains the acknowledged order.

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$orderAckRequest = {"orderAcknowledge":{"orderLines":{"orderLine":[{"lineNumber":"1","orderLineStatuses":{"orderLineStatus":[{"status":"Acknowledged","statusQuantity":{"unitOfMeasurement":"EACH","amount":"4"}}]}}]}}}; // \Walmart\Models\MP\MX\Orders\OrderAckRequest

try {
    $result = $api->acknowledgeOrders($purchaseOrderId, $orderAckRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->acknowledgeOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **orderAckRequest** | [**\Walmart\Models\MP\MX\Orders\OrderAckRequest**](../../../Models/MP/MX/Orders/OrderAckRequest.md)|  | |


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

## `cancelOrderLines()`

```php
cancelOrderLines($purchaseOrderId, $orderCancellationRequest): string
```
Cancel Order Lines

You can cancel one or more order lines. You must include a purchaseOrderId when cancelling an order line. The response to a successful call contains the order with the cancelled line items

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$orderCancellationRequest = {"orderCancellation":{"orderLines":{"orderLine":[{"lineNumber":"5","orderLineStatuses":{"orderLineStatus":[{"status":"Cancelled","cancellationReason":"CUSTOMER_REQUESTED_SELLER_TO_CANCEL","statusQuantity":{"unitOfMeasurement":"EACH","amount":"2"}}]}}]}}}; // \Walmart\Models\MP\MX\Orders\OrderCancellationRequest | File fields

try {
    $result = $api->cancelOrderLines($purchaseOrderId, $orderCancellationRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->cancelOrderLines: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **orderCancellationRequest** | [**\Walmart\Models\MP\MX\Orders\OrderCancellationRequest**](../../../Models/MP/MX/Orders/OrderCancellationRequest.md)| File fields | |


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

## `deliveryUpdates()`

```php
deliveryUpdates($purchaseOrderId, $deliver): string
```
Delivery Updates

Updates the status of order lines to Delivered. The response to a successful call returns 200 Status Code.

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$deliver = {"packages":[{"trackingNo":"P100011150a","eventTime":"1540845015000","eventName":"DELIVERY_UPDATE","purchaseOrderNo":"P100011150","packageNo":"144553632_123456"}]}; // \Walmart\Models\MP\MX\Orders\Deliver | File fields

try {
    $result = $api->deliveryUpdates($purchaseOrderId, $deliver);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->deliveryUpdates: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **deliver** | [**\Walmart\Models\MP\MX\Orders\Deliver**](../../../Models/MP/MX/Orders/Deliver.md)| File fields | |


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

## `getAllOrders()`

```php
getAllOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $purchaseOrderId, $statusCodeFilter): \Walmart\Models\MP\MX\Orders\WFSOrderResponse
```
Get all orders

Retrieves the details of all the orders for specified search criteria. The same API can be used to search a single order based on purchaseOrderId/ customerOrderId This API supports only upto an offset of 1000 in response with max limit 100 orders. You can use cursor based API instead to get all the orders.

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$createdStartDate = 'NOW-180DAYS'; // string | Start Date for querying all purchase orders after this date. Use epoch time format in seconds.
$createdEndDate = 'NOW'; // string | End Date for querying all purchase orders after this date. Use epoch time format in seconds.
$limit = '10'; // string | The number of orders to be returned. Cannot be greater than 100.
$offset = '0'; // string | The starting offset of the first order required in the response. Cannot be greater than 1000
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID.
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID.
$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered.

try {
    $result = $api->getAllOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $purchaseOrderId, $statusCodeFilter);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] [default to 'NOW-180DAYS'] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] [default to 'NOW'] |
| **limit** | **string**| The number of orders to be returned. Cannot be greater than 100. | [optional] [default to '10'] |
| **offset** | **string**| The starting offset of the first order required in the response. Cannot be greater than 1000 | [optional] [default to '0'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. | [optional] |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered. | [optional] |


### Return type

[**\Walmart\Models\MP\MX\Orders\WFSOrderResponse**](../../../Models/MP/MX/Orders/WFSOrderResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getAllOrdersUsingCursor()`

```php
getAllOrdersUsingCursor($statusCodeFilter, $createdStartDate, $createdEndDate, $limit, $cursorMark, $customerOrderId, $purchaseOrderId): \Walmart\Models\MP\MX\Orders\MxOrderWithCursor
```
Get all orders using cursor mark

Retrieves the details of all the orders for specified search criteria. The same API can be used to search a single order based on purchaseOrderId/ customerOrderId With this API you can get all orders in response, it returns nextCursorMark for the next 100 orders so on and so forth upto the last order

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered.
$createdStartDate = 'NOW-180DAYS'; // string | Start Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format.
$createdEndDate = 'NOW'; // string | End Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-03-29T16:43:12.355+05:30 ). Use URI encoded time format.
$limit = '10'; // string | The number of orders to be returned. Cannot be larger than 100.
$cursorMark = '*'; // string | The cursor from which next set of records to be retrieved.
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID.
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID.

try {
    $result = $api->getAllOrdersUsingCursor($statusCodeFilter, $createdStartDate, $createdEndDate, $limit, $cursorMark, $customerOrderId, $purchaseOrderId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllOrdersUsingCursor: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered. | |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format. | [optional] [default to 'NOW-180DAYS'] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-03-29T16:43:12.355+05:30 ). Use URI encoded time format. | [optional] [default to 'NOW'] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 100. | [optional] [default to '10'] |
| **cursorMark** | **string**| The cursor from which next set of records to be retrieved. | [optional] [default to '*'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. | [optional] |


### Return type

[**\Walmart\Models\MP\MX\Orders\MxOrderWithCursor**](../../../Models/MP/MX/Orders/MxOrderWithCursor.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getAllWFSOrders()`

```php
getAllWFSOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $statusCodeFilter): \Walmart\Models\MP\MX\Orders\WFSOrderResponse
```
Get all WFS orders

Retrieves the details of all the WFS orders for specified search criteria.

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$createdStartDate = 'createdStartDate_example'; // string | Start Date for querying all purchase orders after this date. Use epoch time format in seconds.
$createdEndDate = 'createdEndDate_example'; // string | End Date for querying all purchase orders after this date. Use epoch time format in seconds.
$limit = '10'; // string | The number of orders to be returned. Cannot be larger than 200.
$offset = '0'; // string | The starting offset of the first order required in the response.
$customerOrderId = '0'; // string | The customer order ID.
$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Created, SentForFulfillment, Shipped, Cancelled, Delivered

try {
    $result = $api->getAllWFSOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $statusCodeFilter);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllWFSOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 200. | [optional] [default to '10'] |
| **offset** | **string**| The starting offset of the first order required in the response. | [optional] [default to '0'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] [default to '0'] |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Created, SentForFulfillment, Shipped, Cancelled, Delivered | [optional] |


### Return type

[**\Walmart\Models\MP\MX\Orders\WFSOrderResponse**](../../../Models/MP/MX/Orders/WFSOrderResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getShippingLabel()`

```php
getShippingLabel($trackingNumber): string
```
Get Shipping Label

Get Shipping Label in PNG format

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$trackingNumber = 'trackingNumber_example'; // string | trackingNumber

try {
    $result = $api->getShippingLabel($trackingNumber);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getShippingLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **trackingNumber** | **string**| trackingNumber | |


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

## `postBulkShippingLabel()`

```php
postBulkShippingLabel($shippingLabelRequest, $fORMAT): string
```
Bulk Shipping Label

Get Shipping Label in bulk for multiple tracking numbers in zip/pdf file

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$shippingLabelRequest = {"trackingNumbers":["499903935503","477502530976"]}; // \Walmart\Models\MP\MX\Orders\ShippingLabelRequest | Request body with list of tracking numbers
$fORMAT = 'ZIP'; // string | format in which you want to download bulk labels, expected values are ZIP/ PDF only

try {
    $result = $api->postBulkShippingLabel($shippingLabelRequest, $fORMAT);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->postBulkShippingLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shippingLabelRequest** | [**\Walmart\Models\MP\MX\Orders\ShippingLabelRequest**](../../../Models/MP/MX/Orders/ShippingLabelRequest.md)| Request body with list of tracking numbers | |
| **fORMAT** | **string**| format in which you want to download bulk labels, expected values are ZIP/ PDF only | [optional] [default to 'ZIP'] |


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

## `shippingUpdates()`

```php
shippingUpdates($purchaseOrderId, $shipmentMx): string
```
Shipping Updates

Updates the status of order lines to Shipped and trigger the charge to the customer. The response to a successful call contains the order with the shipped line items.

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$shipmentMx = {"shipments":[{"shipmentLines":[{"primeLineNo":"2","shipmentLineNo":"2","quantity":{"unitOfMeasurement":"EACH","amount":"2"}}],"trackingNumber":"12345","trackingURL":"http://www.otherCarrier.com","carrier":"Other"}]}; // \Walmart\Models\MP\MX\Orders\ShipmentMx | File fields

try {
    $result = $api->shippingUpdates($purchaseOrderId, $shipmentMx);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->shippingUpdates: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **shipmentMx** | [**\Walmart\Models\MP\MX\Orders\ShipmentMx**](../../../Models/MP/MX/Orders/ShipmentMx.md)| File fields | |


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
