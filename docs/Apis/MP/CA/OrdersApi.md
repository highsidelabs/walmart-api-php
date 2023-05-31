# Walmart\Apis\MP\CA\OrdersApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**acknowledgeOrdersCA()**](#acknowledgeOrdersCA) | **POST** /v3/ca/orders/{purchaseOrderId}/acknowledge | Acknowledge Orders |
| [**cancelOrderLinesCA()**](#cancelOrderLinesCA) | **POST** /v3/ca/orders/{purchaseOrderId}/cancel | Cancel Order Lines |
| [**getAllOrders()**](#getAllOrders) | **GET** /v3/ca/orders | Get all orders |
| [**getAllReleasedOrders()**](#getAllReleasedOrders) | **GET** /v3/ca/orders/released | Get all released orders |
| [**getAllWFSOrders()**](#getAllWFSOrders) | **GET** /v3/ca/orders/wfs | Get all WFS orders |
| [**getAnOrder()**](#getAnOrder) | **GET** /v3/ca/orders/{purchaseOrderId} | Get an order |
| [**refundOrderLinesCA()**](#refundOrderLinesCA) | **POST** /v3/ca/orders/{purchaseOrderId}/refund | Refund Order Lines |
| [**shippingUpdatesCA()**](#shippingUpdatesCA) | **POST** /v3/ca/orders/{purchaseOrderId}/shipping | Shipping Updates |


## `acknowledgeOrdersCA()`

```php
acknowledgeOrdersCA($purchaseOrderId): \Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response
```
Acknowledge Orders

You can use this API to acknowledge an entire order, including all of its order lines. Walmart requires a seller to acknowledge orders within **four** hours of receipt of the order, except in extenuating circumstances.  The response to a successful call contains the acknowledged order.  In general, only orders that are in a **Created** state should be acknowledged. As a good practice, acknowledge your orders to avoid underselling. Orders that are in an **Acknowledged** state can be re-acknowledged, possibly in response to an error response from an earlier call to acknowledge order. Orders with line items that are shipped or canceled should not be re-acknowledged.

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

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID

try {
    $result = $api->acknowledgeOrdersCA($purchaseOrderId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->acknowledgeOrdersCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| The purchase order ID | |


### Return type

[**\Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response**](../Model/ShippingUpdatesCA200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `cancelOrderLinesCA()`

```php
cancelOrderLinesCA($purchaseOrderId, $cancelOrderLinesCARequest): \Walmart\Models\MP\CA\Orders\CancelOrderLinesCA200Response
```
Cancel Order Lines

You can cancel one or more order lines. You must include a purchaseOrderId when cancelling an order line. After cancelling your order, update the inventory for the cancelled order and send it in the next inventory feed.  The response to a successful call contains the order with the cancelled line item.  Cancellation Reasons supported: - CANCEL_BY_SELLER - CUSTOMER_REQUESTED_SELLER_TO_CANCEL

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

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID
$cancelOrderLinesCARequest = <?xml version="1.0" encoding="UTF-8"?>
<orderCancellation xmlns="http://walmart.com/mp/v3/orders">
    <orderLines>
        <orderLine>
            <lineNumber>1</lineNumber>
            <orderLineStatuses>
                <orderLineStatus>
                    <status>Cancelled</status>
                    <cancellationReason>CUSTOMER_REQUESTED_SELLER_TO_CANCEL</cancellationReason>
                    <statusQuantity>
                        <unitOfMeasurement>EACH</unitOfMeasurement>
                        <amount>1</amount>
                    </statusQuantity>
                </orderLineStatus>
            </orderLineStatuses>
        </orderLine>
    </orderLines>
</orderCancellation>; // \Walmart\Models\MP\CA\Orders\CancelOrderLinesCARequest | File fields

try {
    $result = $api->cancelOrderLinesCA($purchaseOrderId, $cancelOrderLinesCARequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->cancelOrderLinesCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| The purchase order ID | |
| **cancelOrderLinesCARequest** | [**\Walmart\Models\MP\CA\Orders\CancelOrderLinesCARequest**](../Model/CancelOrderLinesCARequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\CA\Orders\CancelOrderLinesCA200Response**](../Model/CancelOrderLinesCA200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAllOrders()`

```php
getAllOrders($createdStartDate, $sku, $customerOrderId, $purchaseOrderId, $status, $createdEndDate, $fromExpectedShipDate, $toExpectedShipDate, $limit, $productInfo): \Walmart\Models\MP\CA\Orders\GetAllOrders200Response
```
Get all orders

Retrieves the details of all the orders for specified search criteria.

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

$api = Walmart::marketplace($config)->orders();

$createdStartDate = 'createdStartDate_example'; // string | Start Date for querying all purchase orders after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z'
$sku = 'sku_example'; // string | A seller-provided Product ID
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID. One customer may have multiple purchase orders.
$status = 'status_example'; // string | Status may be specified to return orders of that type. Valid statuses are: Created, Acknowledged, Shipped, and Cancelled.
$createdEndDate = 'createdEndDate_example'; // string | Limits orders returned to those created before this createdEndDate. Two formats, based on ISO 8601, are allowed: UTC date or timestamp. Examples: '2016-08-16T10:30:30.155Z' or '2016-08-16'.
$fromExpectedShipDate = 'fromExpectedShipDate_example'; // string | Limits orders returned to those that have orderLines with an expected ship date after this fromExpectedShipDate. Format: YYYY-MM-DD
$toExpectedShipDate = 'toExpectedShipDate_example'; // string | Limits orders returned to those that have orderLines with an expected ship date before this toExpectedShipDate. Format: YYYY-MM-DD
$limit = 'limit_example'; // string | The number of orders to be returned.Cannot be larger than 200.
$productInfo = 'productInfo_example'; // string | Provides the image URL and product weight in response, if available. This parameter must be boolean, e.g.: productInfo=true.

try {
    $result = $api->getAllOrders($createdStartDate, $sku, $customerOrderId, $purchaseOrderId, $status, $createdEndDate, $fromExpectedShipDate, $toExpectedShipDate, $limit, $productInfo);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z' | |
| **sku** | **string**| A seller-provided Product ID | [optional] |
| **customerOrderId** | **string**| The customer order ID | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. One customer may have multiple purchase orders. | [optional] |
| **status** | **string**| Status may be specified to return orders of that type. Valid statuses are: Created, Acknowledged, Shipped, and Cancelled. | [optional] |
| **createdEndDate** | **string**| Limits orders returned to those created before this createdEndDate. Two formats, based on ISO 8601, are allowed: UTC date or timestamp. Examples: '2016-08-16T10:30:30.155Z' or '2016-08-16'. | [optional] |
| **fromExpectedShipDate** | **string**| Limits orders returned to those that have orderLines with an expected ship date after this fromExpectedShipDate. Format: YYYY-MM-DD | [optional] |
| **toExpectedShipDate** | **string**| Limits orders returned to those that have orderLines with an expected ship date before this toExpectedShipDate. Format: YYYY-MM-DD | [optional] |
| **limit** | **string**| The number of orders to be returned.Cannot be larger than 200. | [optional] |
| **productInfo** | **string**| Provides the image URL and product weight in response, if available. This parameter must be boolean, e.g.: productInfo=true. | [optional] |


### Return type

[**\Walmart\Models\MP\CA\Orders\GetAllOrders200Response**](../Model/GetAllOrders200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAllReleasedOrders()`

```php
getAllReleasedOrders($createdStartDate, $createdEndDate, $limit, $productInfo): \Walmart\Models\MP\CA\Orders\GetAllOrders200Response
```
Get all released orders

Retrieves all the orders with line items that are in the \"created\" status, that is, these orders have been released from the Walmart Order Management System to the seller for processing. The released orders are the orders that are ready for a seller to fulfill.    --- **Note**  There is a maximum limit of 2000 orders that can be downloaded at a time. Attempting to download more than 2000 orders will return an error.  ---

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

$api = Walmart::marketplace($config)->orders();

$createdStartDate = 'createdStartDate_example'; // string | Start Date for querying all purchase orders after this date. Use epoch time format in seconds.
$createdEndDate = 'createdEndDate_example'; // string | End Date for querying all purchase orders after this date. Use epoch time format in seconds.
$limit = '10'; // string | The number of orders to be returned. Cannot be larger than 200.
$productInfo = 'productInfo_example'; // string | Provides the image URL and product weight in response, if available. This parameter must be boolean, e.g.: productInfo=true.

try {
    $result = $api->getAllReleasedOrders($createdStartDate, $createdEndDate, $limit, $productInfo);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllReleasedOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 200. | [optional] [default to '10'] |
| **productInfo** | **string**| Provides the image URL and product weight in response, if available. This parameter must be boolean, e.g.: productInfo=true. | [optional] |


### Return type

[**\Walmart\Models\MP\CA\Orders\GetAllOrders200Response**](../Model/GetAllOrders200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAllWFSOrders()`

```php
getAllWFSOrders($createdStartDate, $customerOrderId, $status, $createdEndDate, $limit, $offset): \Walmart\Models\MP\CA\Orders\GetAllOrders200Response
```
Get all WFS orders

Retrieves the details of all the WFS orders for specified search criteria.

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

$api = Walmart::marketplace($config)->orders();

$createdStartDate = 'createdStartDate_example'; // string | Start Date for querying all purchase orders after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z'
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID
$status = 'status_example'; // string | Status may be specified to return orders of that type. Valid statuses are: Created, Shipped and Cancelled.
$createdEndDate = 'createdEndDate_example'; // string | Limits orders returned to those created before this createdEndDate. Two formats, based on ISO 8601, are allowed: UTC date or timestamp. Examples: '2016-08-16T10:30:30.155Z' or '2016-08-16'.
$limit = 'limit_example'; // string | The number of orders to be returned.Cannot be larger than 200.
$offset = 'offset_example'; // string | Starting order offset for the current page

try {
    $result = $api->getAllWFSOrders($createdStartDate, $customerOrderId, $status, $createdEndDate, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllWFSOrders: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after that date. Use one of the following formats, based on UTC, ISO 8601. Date example: '2013-08-16' Timestamp example: '2013-08-16T10:30:15Z' | |
| **customerOrderId** | **string**| The customer order ID | [optional] |
| **status** | **string**| Status may be specified to return orders of that type. Valid statuses are: Created, Shipped and Cancelled. | [optional] |
| **createdEndDate** | **string**| Limits orders returned to those created before this createdEndDate. Two formats, based on ISO 8601, are allowed: UTC date or timestamp. Examples: '2016-08-16T10:30:30.155Z' or '2016-08-16'. | [optional] |
| **limit** | **string**| The number of orders to be returned.Cannot be larger than 200. | [optional] |
| **offset** | **string**| Starting order offset for the current page | [optional] |


### Return type

[**\Walmart\Models\MP\CA\Orders\GetAllOrders200Response**](../Model/GetAllOrders200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAnOrder()`

```php
getAnOrder($purchaseOrderId, $productInfo): \Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response
```
Get an order

Retrieves an order detail for a specific purchaseOrderId

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

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID
$productInfo = 'productInfo_example'; // string | Provides the image URL and product weight in response, if available. This parameter must be boolean, e.g.: productInfo=true.

try {
    $result = $api->getAnOrder($purchaseOrderId, $productInfo);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAnOrder: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| The purchase order ID | |
| **productInfo** | **string**| Provides the image URL and product weight in response, if available. This parameter must be boolean, e.g.: productInfo=true. | [optional] |


### Return type

[**\Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response**](../Model/ShippingUpdatesCA200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `refundOrderLinesCA()`

```php
refundOrderLinesCA($purchaseOrderId, $refundOrderLinesCARequest): \Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response
```
Refund Order Lines

Refunds one or more order lines that have been shipped.  The response to a successful call contains the order with the refunded line item.  You can only refund an order line that has a status of **Shipped**.  The value for the **amount** element in the refund must be negative. The magnitude of the amount specified as the refund cannot be greater than the original amount that was charged for the line.

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

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID
$refundOrderLinesCARequest = <?xml version="1.0" encoding="UTF-8"?>
<orderRefund
  xmlns:ns2="http://walmart.com/mp/v3/orders"
  xmlns:ns3="http://walmart.com/">
    <purchaseOrderId>2575193093772</purchaseOrderId>
    <orderLines>
        <orderLine>
            <lineNumber>1</lineNumber>
            <refunds>
                <refund>
                    <refundComments>test test</refundComments>
                    <refundCharges>
                        <refundCharge>
                            <refundReason>DamagedItem</refundReason>
                            <charge>
                                <chargeType>PRODUCT</chargeType>
                                <chargeName>Item Price</chargeName>
                                <chargeAmount>
                                    <currency>USD</currency>
                                    <amount>-10.02</amount>
                                </chargeAmount>
                                <tax>
                                    <taxName>Item Price Tax</taxName>
                                    <taxAmount>
                                        <currency>USD</currency>
                                        <amount>-5.03</amount>
                                    </taxAmount>
                                </tax>
                            </charge>
                        </refundCharge>
                        <refundCharge>
                            <refundReason>TaxExemptCustomer</refundReason>
                            <charge>
                                <chargeType>SHIPPING</chargeType>
                                <chargeName>Shipping Price</chargeName>
                                <chargeAmount>
                                    <currency>USD</currency>
                                    <amount>-1.02</amount>
                                </chargeAmount>
                                <tax>
                                    <taxName>Shipping Tax</taxName>
                                    <taxAmount>
                                        <currency>USD</currency>
                                        <amount>-0.05</amount>
                                    </taxAmount>
                                </tax>
                            </charge>
                        </refundCharge>
                    </refundCharges>
                </refund>
            </refunds>
        </orderLine>
    </orderLines>
</orderRefund>; // \Walmart\Models\MP\CA\Orders\RefundOrderLinesCARequest | File fields

try {
    $result = $api->refundOrderLinesCA($purchaseOrderId, $refundOrderLinesCARequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->refundOrderLinesCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| The purchase order ID | |
| **refundOrderLinesCARequest** | [**\Walmart\Models\MP\CA\Orders\RefundOrderLinesCARequest**](../Model/RefundOrderLinesCARequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response**](../Model/ShippingUpdatesCA200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `shippingUpdatesCA()`

```php
shippingUpdatesCA($purchaseOrderId, $shippingUpdatesCARequest): \Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response
```
Shipping Updates

Updates the status of order lines to **Shipped** and trigger the charge to the customer. You must acknowledge your orders before sending a shipping update to avoid underselling. After canceling your order, update the inventory for the canceled order and send it in the next inventory feed. An order line, once marked as shipped, cannot be updated.  **NOTE: shipDateTime must be in UTC. **  The response to a successful call contains the order with the shipped line item.  #### Process Mode  The processMode parameter allows the Seller to track and update any shipment information after the order has already shipped. This parameter is used to differentiate between the first shipment and subsequent shipments, and track information updates post shipment. This is an optional parameter, and if not passed it will be considered as a regular shipment update. The supported value for processMode is listed in the table below.  The following table describes the processMode parameter:  | Description | Required | | --- | --- | | Allows tracking of order shipment information | Yes |

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

$api = Walmart::marketplace($config)->orders();

$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID
$shippingUpdatesCARequest = <?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<orderShipment
  xmlns:ns2="http://walmart.com/mp/v3/orders"
  xmlns:ns3="http://walmart.com/">
    <orderLines>
        <orderLine>
            <lineNumber>2</lineNumber>
            <shipFromCountry>CA</shipFromCountry>
            <orderLineStatuses>
                <orderLineStatus>
                    <status>Shipped</status>
                    <statusQuantity>
                        <unitOfMeasurement>Each</unitOfMeasurement>
                        <amount>1</amount>
                    </statusQuantity>
                    <trackingInfo>
                        <shipDateTime>2016-06-27T05:30:15.000Z</shipDateTime>
                        <carrierName>
                            <carrier>FedEx</carrier>
                        </carrierName>
                        <methodCode>Standard</methodCode>
                        <trackingNumber>12333634122</trackingNumber>
                        <trackingURL>http://www.fedex.com</trackingURL>
                    </trackingInfo>
                </orderLineStatus>
            </orderLineStatuses>
        </orderLine>
    </orderLines>
</orderShipment>; // \Walmart\Models\MP\CA\Orders\ShippingUpdatesCARequest | File fields

try {
    $result = $api->shippingUpdatesCA($purchaseOrderId, $shippingUpdatesCARequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->shippingUpdatesCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| The purchase order ID | |
| **shippingUpdatesCARequest** | [**\Walmart\Models\MP\CA\Orders\ShippingUpdatesCARequest**](../Model/ShippingUpdatesCARequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\CA\Orders\ShippingUpdatesCA200Response**](../Model/ShippingUpdatesCA200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
