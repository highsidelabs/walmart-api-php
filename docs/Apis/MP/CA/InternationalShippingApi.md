# Walmart\Apis\CA\MPInternationalShippingApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createConsolidation()**](InternationalShippingApi.md#createConsolidation) | **POST** /v3/ca/shipping/labels/shipment/international/consolidation | Create consolidation |
| [**createLabel()**](InternationalShippingApi.md#createLabel) | **POST** /v3/ca/shipping/labels | Create label |
| [**discardLabel()**](InternationalShippingApi.md#discardLabel) | **DELETE** /v3/ca/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Discard label |
| [**getCarrierPackageTypes()**](InternationalShippingApi.md#getCarrierPackageTypes) | **GET** /v3/ca/shipping/labels/carriers/{carrierShortName}/package-types | Supported carrier package types |
| [**getCarriers()**](InternationalShippingApi.md#getCarriers) | **GET** /v3/ca/shipping/labels/carriers | Supported carriers |
| [**getConsolidation()**](InternationalShippingApi.md#getConsolidation) | **GET** /v3/ca/shipping/labels/shipment/international/consolidation | Get consolidation details |
| [**getLabel()**](InternationalShippingApi.md#getLabel) | **GET** /v3/ca/shipping/labels/purchase-orders/{purchaseOrderId} | Labels by purchase order id |
| [**getLabelByTrackingAndCarrier()**](InternationalShippingApi.md#getLabelByTrackingAndCarrier) | **GET** /v3/ca/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Download label |


## `createConsolidation()`

```php
createConsolidation($accept, $contentType, $createConsolidationRequest): \Walmart\Models\MP\CA\InternationalShipping\GetConsolidation200Response
```
Create consolidation

Use this API to consolidate shipments. Provide the list of packages that form part of the consolidation and its corresponding domestic tracking number and carrier. The synchronous API call returns the status of the operation and a correlation ID in response. Use the correlation ID to connect via email to the IMD team in case of issues pertaining to the consolidation call. In case of any failure, the client has to retry.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header
$createConsolidationRequest = {"domesticCarrierId":1000,"domesticTrackingNo":"20128590000367","shipmentIds":["875F143972000000CA8020EA"]}; // \Walmart\Models\MP\CA\InternationalShipping\CreateConsolidationRequest | Consolidation Request

try {
    $result = $apiInstance->createConsolidation($accept, $contentType, $createConsolidationRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->createConsolidation: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |
| **createConsolidationRequest** | [**\Walmart\Models\MP\CA\InternationalShipping\CreateConsolidationRequest**](../Model/CreateConsolidationRequest.md)| Consolidation Request | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\GetConsolidation200Response**](../Model/GetConsolidation200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createLabel()`

```php
createLabel($accept, $contentType, $createLabelRequest, $wMTESTMODE): \Walmart\Models\MP\CA\InternationalShipping\CreateLabel200Response
```
Create label

Create shipping label for items. The response to a successful call are of json or pdf type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type and 'Accept'='application/json' as json response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header
$createLabelRequest = {"packageType":"CUSTOM_PACKAGE","boxDimensions":{"boxDimensionUnit":"IN","boxWeightUnit":"LB","boxWeight":1,"boxLength":100,"boxWidth":1,"boxHeight":1},"boxItems":[{"sku":"SKU_28072021","quantity":1}],"fromAddress":{"contactName":"Test","companyName":"Walmart","addressLine1":"Add1","addressLine2":"Add2","city":"Anchorage","state":"AK","postalCode":"99501","country":"US","phone":"12253","email":"test@walmart.com"},"purchaseOrderId":"P100569013","carrierName":"FedEx","carrierServiceType":"FEDEX_INTERNATIONAL_ECONOMY","labelSize":"A6"}; // \Walmart\Models\MP\CA\InternationalShipping\CreateLabelRequest | Label fields
$wMTESTMODE = false; // bool | For sellers/clients who are in the process of on boarding or already on boarded to IMD platforms, this feature allows them to test the API integration to SWW international label generation API. Sellers get a response which maps their request attributes with some additional static information like tracking and label. The label returned is corresponding to the carrier configured for each seller, in case if the configuration is still in progress a sample Fedex Express label is returned.

try {
    $result = $apiInstance->createLabel($accept, $contentType, $createLabelRequest, $wMTESTMODE);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->createLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |
| **createLabelRequest** | [**\Walmart\Models\MP\CA\InternationalShipping\CreateLabelRequest**](../Model/CreateLabelRequest.md)| Label fields | |
| **wMTESTMODE** | **bool**| For sellers/clients who are in the process of on boarding or already on boarded to IMD platforms, this feature allows them to test the API integration to SWW international label generation API. Sellers get a response which maps their request attributes with some additional static information like tracking and label. The label returned is corresponding to the carrier configured for each seller, in case if the configuration is still in progress a sample Fedex Express label is returned. | [optional] [default to false] |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CreateLabel200Response**](../Model/CreateLabel200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `discardLabel()`

```php
discardLabel($carrierShortName, $trackingNo, $accept, $contentType): \Walmart\Models\MP\CA\InternationalShipping\DiscardLabel200Response
```
Discard label

Discard label by carrier and trackingNo

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header

try {
    $result = $apiInstance->discardLabel($carrierShortName, $trackingNo, $accept, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->discardLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName from getCarriers API | |
| **trackingNo** | **string**| trackingNo | |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\DiscardLabel200Response**](../Model/DiscardLabel200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCarrierPackageTypes()`

```php
getCarrierPackageTypes($carrierShortName, $accept, $contentType): \Walmart\Models\MP\CA\InternationalShipping\GetCarrierPackageTypes200Response
```
Supported carrier package types

This API retrieves all supported package types for the selected carrier.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers
$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header

try {
    $result = $apiInstance->getCarrierPackageTypes($carrierShortName, $accept, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarrierPackageTypes: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers | |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\GetCarrierPackageTypes200Response**](../Model/GetCarrierPackageTypes200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCarriers()`

```php
getCarriers($accept, $contentType): \Walmart\Models\MP\CA\InternationalShipping\GetCarriers200Response
```
Supported carriers

This API retrieves all carriers supported by Ship With Walmart.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header

try {
    $result = $apiInstance->getCarriers($accept, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarriers: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\GetCarriers200Response**](../Model/GetCarriers200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getConsolidation()`

```php
getConsolidation($domesticTrackingNo, $domesticCarrierId, $accept, $contentType): \Walmart\Models\MP\CA\InternationalShipping\GetConsolidation200Response
```
Get consolidation details

Use this API to get consolidation details for the shipment. Provide the domestic Tracking Number and Carrier Id. The synchronous API call returns a list of packages consolidated under that tracking number in response. In case of any failure, the client has to retry.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$domesticTrackingNo = 'domesticTrackingNo_example'; // string | Domestic TrackingNo.
$domesticCarrierId = 56; // int | Domestic CarrierId.
$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header

try {
    $result = $apiInstance->getConsolidation($domesticTrackingNo, $domesticCarrierId, $accept, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getConsolidation: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domesticTrackingNo** | **string**| Domestic TrackingNo. | |
| **domesticCarrierId** | **int**| Domestic CarrierId. | |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\GetConsolidation200Response**](../Model/GetConsolidation200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLabel()`

```php
getLabel($purchaseOrderId, $accept, $contentType): \Walmart\Models\MP\CA\InternationalShipping\GetLabel200Response
```
Labels by purchase order id

Retrieves tracking details for a Purchase Order Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header

try {
    $result = $apiInstance->getLabel($purchaseOrderId, $accept, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\GetLabel200Response**](../Model/GetLabel200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLabelByTrackingAndCarrier()`

```php
getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $accept, $contentType): \SplFileObject
```
Download label

Download label by carrier and trackingNoThe response to a successful call contains the tracking number with the pdf or image type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type and 'Accept'='application/json,image/png' as image media type.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$accept = application/json; // string | Accept Header
$contentType = application/json; // string | Content-Type Header

try {
    $result = $apiInstance->getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $accept, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabelByTrackingAndCarrier: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName from getCarriers API | |
| **trackingNo** | **string**| trackingNo | |
| **accept** | **string**| Accept Header | |
| **contentType** | **string**| Content-Type Header | |


### Return type

**\SplFileObject**

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
