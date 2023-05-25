# Walmart\Apis\MX\MPInternationalShippingApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createLabel()**](InternationalShippingApi.md#createLabel) | **POST** /v3/shipping/labels | Create label |
| [**discardLabel()**](InternationalShippingApi.md#discardLabel) | **DELETE** /v3/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Discard label |
| [**getCarrierPackageTypes()**](InternationalShippingApi.md#getCarrierPackageTypes) | **GET** /v3/shipping/labels/carriers/{carrierShortName}/package-types | Supported carrier package types |
| [**getCarriers()**](InternationalShippingApi.md#getCarriers) | **GET** /v3/shipping/labels/carriers | Supported carriers |
| [**getLabel()**](InternationalShippingApi.md#getLabel) | **GET** /v3/shipping/labels/purchase-orders/{purchaseOrderId} | Labels detail by purchase order id |
| [**getLabelByTrackingAndCarrier()**](InternationalShippingApi.md#getLabelByTrackingAndCarrier) | **GET** /v3/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Download label |


## `createLabel()`

```php
createLabel($accept, $createLabelRequest): \Walmart\Models\MP\MX\InternationalShipping\CreateLabel200Response
```
Create label

Create shipping label for items. The response to a successful call are of json,pdf or image type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type and 'Accept'='application/json,image/png' as image media type and 'Accept'='application/json' as json response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$accept = application/json; // string | Only supported Media Type : application/json
$createLabelRequest = {"packageType":"CUSTOM_PACKAGE","boxDimensions":{"boxDimensionUnit":"IN","boxWeightUnit":"LB","boxWeight":1,"boxLength":100,"boxWidth":1,"boxHeight":1},"boxItems":[{"sku":"SKU_28072021","quantity":1,"countryOfOrigin":"US"}],"fromAddress":{"contactName":"Test","companyName":"Walmart","addressLine1":"Add1","addressLine2":"Add2","city":"Anchorage","state":"AK","postalCode":"99501","country":"US","phone":"12253","email":"test@walmart.com"},"purchaseOrderId":"P100569013","carrierName":"FedEx","carrierServiceType":"FEDEX_INTERNATIONAL_ECONOMY"}; // \Walmart\Models\MP\MX\InternationalShipping\CreateLabelRequest | Label fields

try {
    $result = $apiInstance->createLabel($accept, $createLabelRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->createLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Only supported Media Type : application/json | |
| **createLabelRequest** | [**\Walmart\Models\MP\MX\InternationalShipping\CreateLabelRequest**](../Model/CreateLabelRequest.md)| Label fields | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\CreateLabel200Response**](../Model/CreateLabel200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `discardLabel()`

```php
discardLabel($carrierShortName, $trackingNo, $accept): \Walmart\Models\MP\MX\InternationalShipping\DiscardLabel200Response
```
Discard label

Discard label by carrier and trackingNo

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $apiInstance->discardLabel($carrierShortName, $trackingNo, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->discardLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName from getCarriers API | |
| **trackingNo** | **string**| trackingNo | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\DiscardLabel200Response**](../Model/DiscardLabel200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCarrierPackageTypes()`

```php
getCarrierPackageTypes($carrierShortName, $accept): \Walmart\Models\MP\MX\InternationalShipping\GetCarrierPackageTypes200Response
```
Supported carrier package types

This API retrieves all supported package types for the selected carrier.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $apiInstance->getCarrierPackageTypes($carrierShortName, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarrierPackageTypes: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\GetCarrierPackageTypes200Response**](../Model/GetCarrierPackageTypes200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCarriers()`

```php
getCarriers($accept): \Walmart\Models\MP\MX\InternationalShipping\GetCarriers200Response
```
Supported carriers

This API retrieves all carriers supported by Ship With Walmart. Note that currently we are only supporting FedEx but stay tuned for more carrier options.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $apiInstance->getCarriers($accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarriers: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\GetCarriers200Response**](../Model/GetCarriers200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLabel()`

```php
getLabel($purchaseOrderId, $accept): \Walmart\Models\MP\MX\InternationalShipping\GetLabel200Response
```
Labels detail by purchase order id

Retrieves tracking details for a Purchase Order Id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $apiInstance->getLabel($purchaseOrderId, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\GetLabel200Response**](../Model/GetLabel200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLabelByTrackingAndCarrier()`

```php
getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $accept): \SplFileObject
```
Download label

Download label by carrier and trackingNoThe response to a successful call contains the tracking number with the pdf or image type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type , 'Accept'='application/json,image/png' as image media type as Accept'='application/json as json response.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\InternationalShippingApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $apiInstance->getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabelByTrackingAndCarrier: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName from getCarriers API | |
| **trackingNo** | **string**| trackingNo | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

**\SplFileObject**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
