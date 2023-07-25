# Walmart\Apis\MP\MX\InternationalShippingApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createLabel()**](#createLabel) | **POST** /v3/shipping/labels | Create label |
| [**discardLabel()**](#discardLabel) | **DELETE** /v3/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Discard label |
| [**getCarrierPackageTypes()**](#getCarrierPackageTypes) | **GET** /v3/shipping/labels/carriers/{carrierShortName}/package-types | Supported carrier package types |
| [**getCarriers()**](#getCarriers) | **GET** /v3/shipping/labels/carriers | Supported carriers |
| [**getLabel()**](#getLabel) | **GET** /v3/shipping/labels/purchase-orders/{purchaseOrderId} | Labels detail by purchase order id |
| [**getLabelByTrackingAndCarrier()**](#getLabelByTrackingAndCarrier) | **GET** /v3/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Download label |


## `createLabel()`

```php
createLabel($accept, $labelGenerationRequestMx): \Walmart\Models\MP\MX\InternationalShipping\CommonResponseLabelGenerationResponseMx
```
Create label

Create shipping label for items. The response to a successful call are of json,pdf or image type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type and 'Accept'='application/json,image/png' as image media type and 'Accept'='application/json' as json response.

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

$api = Walmart::marketplace($config)->internationalShipping();

$accept = application/json; // string | Only supported Media Type : application/json
$labelGenerationRequestMx = {"packageType":"CUSTOM_PACKAGE","boxDimensions":{"boxDimensionUnit":"IN","boxWeightUnit":"LB","boxWeight":1,"boxLength":100,"boxWidth":1,"boxHeight":1},"boxItems":[{"sku":"SKU_28072021","quantity":1,"countryOfOrigin":"US"}],"fromAddress":{"contactName":"Test","companyName":"Walmart","addressLine1":"Add1","addressLine2":"Add2","city":"Anchorage","state":"AK","postalCode":"99501","country":"US","phone":"12253","email":"test@walmart.com"},"purchaseOrderId":"P100569013","carrierName":"FedEx","carrierServiceType":"FEDEX_INTERNATIONAL_ECONOMY"}; // \Walmart\Models\MP\MX\InternationalShipping\LabelGenerationRequestMx | Label fields

try {
    $result = $api->createLabel($accept, $labelGenerationRequestMx);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->createLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Only supported Media Type : application/json | |
| **labelGenerationRequestMx** | [**\Walmart\Models\MP\MX\InternationalShipping\LabelGenerationRequestMx**](../../../Models/MP/MX/InternationalShipping/LabelGenerationRequestMx.md)| Label fields | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\CommonResponseLabelGenerationResponseMx**](../../../Models/MP/MX/InternationalShipping/CommonResponseLabelGenerationResponseMx.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `discardLabel()`

```php
discardLabel($carrierShortName, $trackingNo, $accept): \Walmart\Models\MP\MX\InternationalShipping\CommonResponseLabelGenerationResponseMx
```
Discard label

Discard label by carrier and trackingNo

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

$api = Walmart::marketplace($config)->internationalShipping();

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $api->discardLabel($carrierShortName, $trackingNo, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->discardLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName from getCarriers API | |
| **trackingNo** | **string**| trackingNo | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\CommonResponseLabelGenerationResponseMx**](../../../Models/MP/MX/InternationalShipping/CommonResponseLabelGenerationResponseMx.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getCarrierPackageTypes()`

```php
getCarrierPackageTypes($carrierShortName, $accept): \Walmart\Models\MP\MX\InternationalShipping\CommonResponseListCarrierPackageResponse
```
Supported carrier package types

This API retrieves all supported package types for the selected carrier.

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

$api = Walmart::marketplace($config)->internationalShipping();

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $api->getCarrierPackageTypes($carrierShortName, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarrierPackageTypes: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\CommonResponseListCarrierPackageResponse**](../../../Models/MP/MX/InternationalShipping/CommonResponseListCarrierPackageResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getCarriers()`

```php
getCarriers($accept): \Walmart\Models\MP\MX\InternationalShipping\CarrierCommonResponseListCarrierResponse
```
Supported carriers

This API retrieves all carriers supported by Ship With Walmart. Note that currently we are only supporting FedEx but stay tuned for more carrier options.

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

$api = Walmart::marketplace($config)->internationalShipping();

$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $api->getCarriers($accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarriers: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\CarrierCommonResponseListCarrierResponse**](../../../Models/MP/MX/InternationalShipping/CarrierCommonResponseListCarrierResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getLabel()`

```php
getLabel($purchaseOrderId, $accept): \Walmart\Models\MP\MX\InternationalShipping\CommonResponseListLabelGenerationResponseMx
```
Labels detail by purchase order id

Retrieves tracking details for a Purchase Order Id

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

$api = Walmart::marketplace($config)->internationalShipping();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $api->getLabel($purchaseOrderId, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

[**\Walmart\Models\MP\MX\InternationalShipping\CommonResponseListLabelGenerationResponseMx**](../../../Models/MP/MX/InternationalShipping/CommonResponseListLabelGenerationResponseMx.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `getLabelByTrackingAndCarrier()`

```php
getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $accept): \SplFileObject
```
Download label

Download label by carrier and trackingNoThe response to a successful call contains the tracking number with the pdf or image type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type , 'Accept'='application/json,image/png' as image media type as Accept'='application/json as json response.

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

$api = Walmart::marketplace($config)->internationalShipping();

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$accept = application/json; // string | Only supported Media Type : application/json

try {
    $result = $api->getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $accept);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabelByTrackingAndCarrier: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName from getCarriers API | |
| **trackingNo** | **string**| trackingNo | |
| **accept** | **string**| Only supported Media Type : application/json | |


### Return type

**\SplFileObject**

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
