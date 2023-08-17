# Walmart\Apis\MP\CA\InternationalShippingApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createConsolidation()**](#createConsolidation) | **POST** /v3/ca/shipping/labels/shipment/international/consolidation | Create consolidation |
| [**createLabel()**](#createLabel) | **POST** /v3/ca/shipping/labels | Create label |
| [**discardLabel()**](#discardLabel) | **DELETE** /v3/ca/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Discard label |
| [**getCarrierPackageTypes()**](#getCarrierPackageTypes) | **GET** /v3/ca/shipping/labels/carriers/{carrierShortName}/package-types | Supported carrier package types |
| [**getCarriers()**](#getCarriers) | **GET** /v3/ca/shipping/labels/carriers | Supported carriers |
| [**getConsolidation()**](#getConsolidation) | **GET** /v3/ca/shipping/labels/shipment/international/consolidation | Get consolidation details |
| [**getLabel()**](#getLabel) | **GET** /v3/ca/shipping/labels/purchase-orders/{purchaseOrderId} | Labels by purchase order id |
| [**getLabelByTrackingAndCarrier()**](#getLabelByTrackingAndCarrier) | **GET** /v3/ca/shipping/labels/carriers/{carrierShortName}/trackings/{trackingNo} | Download label |


## `createConsolidation()`

```php
createConsolidation($contentType, $consolidationRequest): \Walmart\Models\MP\CA\InternationalShipping\CommonResponseConsolidationResponse
```
Create consolidation

Use this API to consolidate shipments. Provide the list of packages that form part of the consolidation and its corresponding domestic tracking number and carrier. The synchronous API call returns the status of the operation and a correlation ID in response. Use the correlation ID to connect via email to the IMD team in case of issues pertaining to the consolidation call. In case of any failure, the client has to retry.

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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$contentType = application/json; // string | Content-Type Header
$consolidationRequest = {"domesticCarrierId":1000,"domesticTrackingNo":"20128590000367","shipmentIds":["875F143972000000CA8020EA"]}; // \Walmart\Models\MP\CA\InternationalShipping\ConsolidationRequest | Consolidation Request

try {
    $result = $api->createConsolidation($contentType, $consolidationRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->createConsolidation: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentType** | **string**| Content-Type Header | |
| **consolidationRequest** | [**\Walmart\Models\MP\CA\InternationalShipping\ConsolidationRequest**](../../../Models/MP/CA/InternationalShipping/ConsolidationRequest.md)| Consolidation Request | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CommonResponseConsolidationResponse**](../../../Models/MP/CA/InternationalShipping/CommonResponseConsolidationResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `createLabel()`

```php
createLabel($contentType, $labelGenerationRequestCa, $wMTESTMODE): \Walmart\Models\MP\CA\InternationalShipping\CommonResponseLabelGenerationResponseCa
```
Create label

Create shipping label for items. The response to a successful call are of json or pdf type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type and 'Accept'='application/json' as json response.

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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$contentType = application/json; // string | Content-Type Header
$labelGenerationRequestCa = {"packageType":"CUSTOM_PACKAGE","boxDimensions":{"boxDimensionUnit":"IN","boxWeightUnit":"LB","boxWeight":1,"boxLength":100,"boxWidth":1,"boxHeight":1},"boxItems":[{"sku":"SKU_28072021","quantity":1}],"fromAddress":{"contactName":"Test","companyName":"Walmart","addressLine1":"Add1","addressLine2":"Add2","city":"Anchorage","state":"AK","postalCode":"99501","country":"US","phone":"12253","email":"test@walmart.com"},"purchaseOrderId":"P100569013","carrierName":"FedEx","carrierServiceType":"FEDEX_INTERNATIONAL_ECONOMY","labelSize":"A6"}; // \Walmart\Models\MP\CA\InternationalShipping\LabelGenerationRequestCa | Label fields
$wMTESTMODE = false; // bool | For sellers/clients who are in the process of on boarding or already on boarded to IMD platforms, this feature allows them to test the API integration to SWW international label generation API. Sellers get a response which maps their request attributes with some additional static information like tracking and label. The label returned is corresponding to the carrier configured for each seller, in case if the configuration is still in progress a sample Fedex Express label is returned.

try {
    $result = $api->createLabel($contentType, $labelGenerationRequestCa, $wMTESTMODE);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->createLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentType** | **string**| Content-Type Header | |
| **labelGenerationRequestCa** | [**\Walmart\Models\MP\CA\InternationalShipping\LabelGenerationRequestCa**](../../../Models/MP/CA/InternationalShipping/LabelGenerationRequestCa.md)| Label fields | |
| **wMTESTMODE** | **bool**| For sellers/clients who are in the process of on boarding or already on boarded to IMD platforms, this feature allows them to test the API integration to SWW international label generation API. Sellers get a response which maps their request attributes with some additional static information like tracking and label. The label returned is corresponding to the carrier configured for each seller, in case if the configuration is still in progress a sample Fedex Express label is returned. | [optional] [default to false] |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CommonResponseLabelGenerationResponseCa**](../../../Models/MP/CA/InternationalShipping/CommonResponseLabelGenerationResponseCa.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `discardLabel()`

```php
discardLabel($carrierShortName, $trackingNo, $contentType): \Walmart\Models\MP\CA\InternationalShipping\CommonResponseLabelGenerationResponseCa
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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$contentType = application/json; // string | Content-Type Header

try {
    $result = $api->discardLabel($carrierShortName, $trackingNo, $contentType);
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
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CommonResponseLabelGenerationResponseCa**](../../../Models/MP/CA/InternationalShipping/CommonResponseLabelGenerationResponseCa.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getCarrierPackageTypes()`

```php
getCarrierPackageTypes($carrierShortName, $contentType): \Walmart\Models\MP\CA\InternationalShipping\CommonResponseListCarrierPackageResponse
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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers
$contentType = application/json; // string | Content-Type Header

try {
    $result = $api->getCarrierPackageTypes($carrierShortName, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarrierPackageTypes: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierShortName** | **string**| carrierShortName received from getCarrier API or pass 'ALL' to fetch all supported package types of different carriers | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CommonResponseListCarrierPackageResponse**](../../../Models/MP/CA/InternationalShipping/CommonResponseListCarrierPackageResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getCarriers()`

```php
getCarriers($contentType): \Walmart\Models\MP\CA\InternationalShipping\CarrierCommonResponseListCarrierResponse
```
Supported carriers

This API retrieves all carriers supported by Ship With Walmart.

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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$contentType = application/json; // string | Content-Type Header

try {
    $result = $api->getCarriers($contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getCarriers: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CarrierCommonResponseListCarrierResponse**](../../../Models/MP/CA/InternationalShipping/CarrierCommonResponseListCarrierResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getConsolidation()`

```php
getConsolidation($domesticTrackingNo, $domesticCarrierId, $contentType): \Walmart\Models\MP\CA\InternationalShipping\CommonResponseConsolidationResponse
```
Get consolidation details

Use this API to get consolidation details for the shipment. Provide the domestic Tracking Number and Carrier Id. The synchronous API call returns a list of packages consolidated under that tracking number in response. In case of any failure, the client has to retry.

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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$domesticTrackingNo = 'domesticTrackingNo_example'; // string | Domestic TrackingNo.
$domesticCarrierId = 56; // int | Domestic CarrierId.
$contentType = application/json; // string | Content-Type Header

try {
    $result = $api->getConsolidation($domesticTrackingNo, $domesticCarrierId, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getConsolidation: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **domesticTrackingNo** | **string**| Domestic TrackingNo. | |
| **domesticCarrierId** | **int**| Domestic CarrierId. | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CommonResponseConsolidationResponse**](../../../Models/MP/CA/InternationalShipping/CommonResponseConsolidationResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getLabel()`

```php
getLabel($purchaseOrderId, $contentType): \Walmart\Models\MP\CA\InternationalShipping\CommonResponseListLabelGenerationResponseCa
```
Labels by purchase order id

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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$purchaseOrderId = 'purchaseOrderId_example'; // string | purchaseOrderId
$contentType = application/json; // string | Content-Type Header

try {
    $result = $api->getLabel($purchaseOrderId, $contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InternationalShippingApi->getLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **purchaseOrderId** | **string**| purchaseOrderId | |
| **contentType** | **string**| Content-Type Header | |


### Return type

[**\Walmart\Models\MP\CA\InternationalShipping\CommonResponseListLabelGenerationResponseCa**](../../../Models/MP/CA/InternationalShipping/CommonResponseListLabelGenerationResponseCa.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getLabelByTrackingAndCarrier()`

```php
getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $contentType): \SplFileObject
```
Download label

Download label by carrier and trackingNoThe response to a successful call contains the tracking number with the pdf or image type based on the media type passed in Accept header. For eg. 'Accept'='application/json,application/pdf' will result in pdf media type and 'Accept'='application/json,image/png' as image media type.

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
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->internationalShipping();

$carrierShortName = 'carrierShortName_example'; // string | carrierShortName from getCarriers API
$trackingNo = 'trackingNo_example'; // string | trackingNo
$contentType = application/json; // string | Content-Type Header

try {
    $result = $api->getLabelByTrackingAndCarrier($carrierShortName, $trackingNo, $contentType);
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
| **contentType** | **string**| Content-Type Header | |


### Return type

**\SplFileObject**

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
