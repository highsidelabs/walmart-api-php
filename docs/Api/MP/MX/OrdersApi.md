# Walmart\Api\MX\MPOrdersApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**acknowledgeOrders()**](OrdersApi.md#acknowledgeOrders) | **POST** /v3/orders/{purchaseOrderId}/acknowledge | Acknowledge Orders |
| [**cancelOrderLines()**](OrdersApi.md#cancelOrderLines) | **POST** /v3/orders/{purchaseOrderId}/cancel | Cancel Order Lines |
| [**deliveryUpdates()**](OrdersApi.md#deliveryUpdates) | **POST** /v3/orders/{purchaseOrderId}/deliver | Delivery Updates |
| [**getAllOrders()**](OrdersApi.md#getAllOrders) | **GET** /v3/orders | Get all orders |
| [**getAllOrdersUsingCursor()**](OrdersApi.md#getAllOrdersUsingCursor) | **GET** /v3/orders/cursor | Get all orders using cursor mark |
| [**getAllWFSOrders()**](OrdersApi.md#getAllWFSOrders) | **GET** /v3/orders/wfsorders | Get all WFS orders |
| [**getShippingLabel()**](OrdersApi.md#getShippingLabel) | **GET** /v3/orders/label/{trackingNumber} | Get Shipping Label |
| [**postBulkShippingLabel()**](OrdersApi.md#postBulkShippingLabel) | **POST** /v3/orders/labels | Bulk Shipping Label |
| [**shippingUpdates()**](OrdersApi.md#shippingUpdates) | **POST** /v3/orders/{purchaseOrderId}/ship | Shipping Updates |


## `acknowledgeOrders()`

```php
acknowledgeOrders($purchaseOrderId, $acknowledgeOrdersRequest): string
```
Acknowledge Orders

You can use this API to acknowledge an entire order, including all of its order lines. The response to a successful call contains the acknowledged order.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$acknowledgeOrdersRequest = {"orderAcknowledge":{"orderLines":{"orderLine":[{"lineNumber":"1","orderLineStatuses":{"orderLineStatus":[{"status":"Acknowledged","statusQuantity":{"unitOfMeasurement":"EACH","amount":"4"}}]}}]}}}; // \Walmart\Model\MP\MX\Orders\AcknowledgeOrdersRequest

try {
    $result = $apiInstance->acknowledgeOrders($purchaseOrderId, $acknowledgeOrdersRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->acknowledgeOrders: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **acknowledgeOrdersRequest** | [**\Walmart\Model\MP\MX\Orders\AcknowledgeOrdersRequest**](../Model/AcknowledgeOrdersRequest.md)|  | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelOrderLines()`

```php
cancelOrderLines($purchaseOrderId, $cancelOrderLinesRequest): string
```
Cancel Order Lines

You can cancel one or more order lines. You must include a purchaseOrderId when cancelling an order line. The response to a successful call contains the order with the cancelled line items

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$cancelOrderLinesRequest = {"orderCancellation":{"orderLines":{"orderLine":[{"lineNumber":"5","orderLineStatuses":{"orderLineStatus":[{"status":"Cancelled","cancellationReason":"CUSTOMER_REQUESTED_SELLER_TO_CANCEL","statusQuantity":{"unitOfMeasurement":"EACH","amount":"2"}}]}}]}}}; // \Walmart\Model\MP\MX\Orders\CancelOrderLinesRequest | File fields

try {
    $result = $apiInstance->cancelOrderLines($purchaseOrderId, $cancelOrderLinesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->cancelOrderLines: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **cancelOrderLinesRequest** | [**\Walmart\Model\MP\MX\Orders\CancelOrderLinesRequest**](../Model/CancelOrderLinesRequest.md)| File fields | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deliveryUpdates()`

```php
deliveryUpdates($purchaseOrderId, $deliveryUpdatesRequest): string
```
Delivery Updates

Updates the status of order lines to Delivered. The response to a successful call returns 200 Status Code.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$deliveryUpdatesRequest = {"packages":[{"trackingNo":"P100011150a","eventTime":"1540845015000","eventName":"DELIVERY_UPDATE","purchaseOrderNo":"P100011150","packageNo":"144553632_123456"}]}; // \Walmart\Model\MP\MX\Orders\DeliveryUpdatesRequest | File fields

try {
    $result = $apiInstance->deliveryUpdates($purchaseOrderId, $deliveryUpdatesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->deliveryUpdates: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **deliveryUpdatesRequest** | [**\Walmart\Model\MP\MX\Orders\DeliveryUpdatesRequest**](../Model/DeliveryUpdatesRequest.md)| File fields | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllOrders()`

```php
getAllOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $purchaseOrderId, $statusCodeFilter): \Walmart\Model\MP\MX\Orders\GetAllOrders200Response
```
Get all orders

Retrieves the details of all the orders for specified search criteria. The same API can be used to search a single order based on purchaseOrderId/ customerOrderId This API supports only upto an offset of 1000 in response with max limit 100 orders. You can use cursor based API instead to get all the orders.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createdStartDate = 'NOW-180DAYS'; // string | Start Date for querying all purchase orders after this date. Use epoch time format in seconds.
$createdEndDate = 'NOW'; // string | End Date for querying all purchase orders after this date. Use epoch time format in seconds.
$limit = '10'; // string | The number of orders to be returned. Cannot be greater than 100.
$offset = '0'; // string | The starting offset of the first order required in the response. Cannot be greater than 1000
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID.
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID.
$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered.

try {
    $result = $apiInstance->getAllOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $purchaseOrderId, $statusCodeFilter);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllOrders: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] [default to 'NOW-180DAYS'] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] [default to 'NOW'] |
| **limit** | **string**| The number of orders to be returned. Cannot be greater than 100. | [optional] [default to '10'] |
| **offset** | **string**| The starting offset of the first order required in the response. Cannot be greater than 1000 | [optional] [default to '0'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. | [optional] |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered. | [optional] |


### Return type

[**\Walmart\Model\MP\MX\Orders\GetAllOrders200Response**](../Model/GetAllOrders200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllOrdersUsingCursor()`

```php
getAllOrdersUsingCursor($statusCodeFilter, $createdStartDate, $createdEndDate, $limit, $cursorMark, $customerOrderId, $purchaseOrderId): \Walmart\Model\MP\MX\Orders\GetAllOrdersUsingCursor200Response
```
Get all orders using cursor mark

Retrieves the details of all the orders for specified search criteria. The same API can be used to search a single order based on purchaseOrderId/ customerOrderId With this API you can get all orders in response, it returns nextCursorMark for the next 100 orders so on and so forth upto the last order

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered.
$createdStartDate = 'NOW-180DAYS'; // string | Start Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format.
$createdEndDate = 'NOW'; // string | End Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-03-29T16:43:12.355+05:30 ). Use URI encoded time format.
$limit = '10'; // string | The number of orders to be returned. Cannot be larger than 100.
$cursorMark = '*'; // string | The cursor from which next set of records to be retrieved.
$customerOrderId = 'customerOrderId_example'; // string | The customer order ID.
$purchaseOrderId = 'purchaseOrderId_example'; // string | The purchase order ID.

try {
    $result = $apiInstance->getAllOrdersUsingCursor($statusCodeFilter, $createdStartDate, $createdEndDate, $limit, $cursorMark, $customerOrderId, $purchaseOrderId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllOrdersUsingCursor: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Created, Acknowledged, Shipped, Cancelled, OnHold, Delivered. | |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-01-29T10:53:12.355-09:30 ). Use URI encoded time format. | [optional] [default to 'NOW-180DAYS'] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Either both the createdStartDate, createdEndDate must be present in the query params or none present. If passed must be in the format - 'yyyy-MM-dd'T'HH:mm:ss.SSSXXX' (Ex. 2022-03-29T16:43:12.355+05:30 ). Use URI encoded time format. | [optional] [default to 'NOW'] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 100. | [optional] [default to '10'] |
| **cursorMark** | **string**| The cursor from which next set of records to be retrieved. | [optional] [default to '*'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] |
| **purchaseOrderId** | **string**| The purchase order ID. | [optional] |


### Return type

[**\Walmart\Model\MP\MX\Orders\GetAllOrdersUsingCursor200Response**](../Model/GetAllOrdersUsingCursor200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllWFSOrders()`

```php
getAllWFSOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $statusCodeFilter): \Walmart\Model\MP\MX\Orders\GetAllWFSOrders200Response
```
Get all WFS orders

Retrieves the details of all the WFS orders for specified search criteria.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createdStartDate = 'createdStartDate_example'; // string | Start Date for querying all purchase orders after this date. Use epoch time format in seconds.
$createdEndDate = 'createdEndDate_example'; // string | End Date for querying all purchase orders after this date. Use epoch time format in seconds.
$limit = '10'; // string | The number of orders to be returned. Cannot be larger than 200.
$offset = '0'; // string | The starting offset of the first order required in the response.
$customerOrderId = '0'; // string | The customer order ID.
$statusCodeFilter = 'statusCodeFilter_example'; // string | The status code filter to apply. Valid values will be Created, SentForFulfillment, Shipped, Cancelled, Delivered

try {
    $result = $apiInstance->getAllWFSOrders($createdStartDate, $createdEndDate, $limit, $offset, $customerOrderId, $statusCodeFilter);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getAllWFSOrders: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createdStartDate** | **string**| Start Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] |
| **createdEndDate** | **string**| End Date for querying all purchase orders after this date. Use epoch time format in seconds. | [optional] |
| **limit** | **string**| The number of orders to be returned. Cannot be larger than 200. | [optional] [default to '10'] |
| **offset** | **string**| The starting offset of the first order required in the response. | [optional] [default to '0'] |
| **customerOrderId** | **string**| The customer order ID. | [optional] [default to '0'] |
| **statusCodeFilter** | **string**| The status code filter to apply. Valid values will be Created, SentForFulfillment, Shipped, Cancelled, Delivered | [optional] |


### Return type

[**\Walmart\Model\MP\MX\Orders\GetAllWFSOrders200Response**](../Model/GetAllWFSOrders200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShippingLabel()`

```php
getShippingLabel($trackingNumber): string
```
Get Shipping Label

Get Shipping Label in PNG format

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$trackingNumber = 'trackingNumber_example'; // string | trackingNumber

try {
    $result = $apiInstance->getShippingLabel($trackingNumber);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->getShippingLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **trackingNumber** | **string**| trackingNumber | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postBulkShippingLabel()`

```php
postBulkShippingLabel($postBulkShippingLabelRequest, $fORMAT): string
```
Bulk Shipping Label

Get Shipping Label in bulk for multiple tracking numbers in zip/pdf file

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$postBulkShippingLabelRequest = {"trackingNumbers":["499903935503","477502530976"]}; // \Walmart\Model\MP\MX\Orders\PostBulkShippingLabelRequest | Request body with list of tracking numbers
$fORMAT = 'ZIP'; // string | format in which you want to download bulk labels, expected values are ZIP/ PDF only

try {
    $result = $apiInstance->postBulkShippingLabel($postBulkShippingLabelRequest, $fORMAT);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->postBulkShippingLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **postBulkShippingLabelRequest** | [**\Walmart\Model\MP\MX\Orders\PostBulkShippingLabelRequest**](../Model/PostBulkShippingLabelRequest.md)| Request body with list of tracking numbers | |
| **fORMAT** | **string**| format in which you want to download bulk labels, expected values are ZIP/ PDF only | [optional] [default to 'ZIP'] |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/octet-stream`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `shippingUpdates()`

```php
shippingUpdates($purchaseOrderId, $shippingUpdatesRequest): string
```
Shipping Updates

Updates the status of order lines to Shipped and trigger the charge to the customer. The response to a successful call contains the order with the shipped line items.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\OrdersApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$shippingUpdatesRequest = {"shipments":[{"shipmentLines":[{"primeLineNo":"2","shipmentLineNo":"2","quantity":{"unitOfMeasurement":"EACH","amount":"2"}}],"trackingNumber":"12345","trackingURL":"http://www.otherCarrier.com","carrier":"Other"}]}; // \Walmart\Model\MP\MX\Orders\ShippingUpdatesRequest | File fields

try {
    $result = $apiInstance->shippingUpdates($purchaseOrderId, $shippingUpdatesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling OrdersApi->shippingUpdates: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **shippingUpdatesRequest** | [**\Walmart\Model\MP\MX\Orders\ShippingUpdatesRequest**](../Model/ShippingUpdatesRequest.md)| File fields | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
