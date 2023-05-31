# Walmart\Apis\MP\US\SettingsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**associate3PFulfillmentCenter()**](#associate3PFulfillmentCenter) | **POST** /v3/settings/shipping/3plshipnodes | Third party fulfillment center association |
| [**createFulfillmentCenter()**](#createFulfillmentCenter) | **POST** /v3/settings/shipping/shipnodes | Create fulfillment center |
| [**createShippingTemplates()**](#createShippingTemplates) | **POST** /v3/settings/shipping/templates | Create Shipping Templates |
| [**deleteShippingTemplateDetails()**](#deleteShippingTemplateDetails) | **DELETE** /v3/settings/shipping/templates/{templateId} | Delete Shipping Template |
| [**get3PFulfillmentProviders()**](#get3PFulfillmentProviders) | **GET** /v3/settings/shipping/3plproviders | Get all third party fulfillment providers |
| [**getAllFulfillmentCenters()**](#getAllFulfillmentCenters) | **GET** /v3/settings/shipping/shipnodes | Get all fulfillment centers |
| [**getAllShippingTemplates()**](#getAllShippingTemplates) | **GET** /v3/settings/shipping/templates | Get All Shipping Templates |
| [**getCarrierMethods()**](#getCarrierMethods) | **GET** /v3/settings/shipping/carriers | Get carrier methods |
| [**getCoverageForFulfillmentCenters()**](#getCoverageForFulfillmentCenters) | **GET** /v3/settings/shipping/shipnodes/coverage | Get coverage for fulfillment centers |
| [**getPartnerConfigurations()**](#getPartnerConfigurations) | **GET** /v3/settings/partnerprofile | Get Partner Configurations |
| [**getShippingConfigurations()**](#getShippingConfigurations) | **GET** /v3/settings/shippingprofile | Get Shipping Configurations |
| [**getShippingTemplateActivationStatus()**](#getShippingTemplateActivationStatus) | **GET** /v3/settings/shipping/templates/activationStatus | Get Shipping Template Activation Status |
| [**getShippingTemplateDetails()**](#getShippingTemplateDetails) | **GET** /v3/settings/shipping/templates/{templateId} | Get Shipping Template Details |
| [**updateFulfillmentCenter()**](#updateFulfillmentCenter) | **PUT** /v3/settings/shipping/shipnodes | Update fulfillment center |
| [**updateShippingTemplates()**](#updateShippingTemplates) | **PUT** /v3/settings/shipping/templates/{templateId} | Update Shipping Templates |


## `associate3PFulfillmentCenter()`

```php
associate3PFulfillmentCenter($updateFulfillmentCenterRequest): \Walmart\Models\MP\US\Settings\Associate3PFulfillmentCenter200ResponseInner[]
```
Third party fulfillment center association

This API associate a third party fulfillment center with Seller.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$updateFulfillmentCenterRequest = {"shipNodeHeader":{"version":"1.2"},"shipNode":[{"shipNode":"99351656957153281","status":"ACTIVE"}]}; // \Walmart\Models\MP\US\Settings\UpdateFulfillmentCenterRequest | Request fields

try {
    $result = $api->associate3PFulfillmentCenter($updateFulfillmentCenterRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->associate3PFulfillmentCenter: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateFulfillmentCenterRequest** | [**\Walmart\Models\MP\US\Settings\UpdateFulfillmentCenterRequest**](../Model/UpdateFulfillmentCenterRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Settings\Associate3PFulfillmentCenter200ResponseInner[]**](../Model/Associate3PFulfillmentCenter200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createFulfillmentCenter()`

```php
createFulfillmentCenter($updateFulfillmentCenterRequest): \Walmart\Models\MP\US\Settings\CreateFulfillmentCenter200ResponseInner[]
```
Create fulfillment center

This API creates a fulfillment center.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$updateFulfillmentCenterRequest = {"shipNodeHeader":{"version":"1.2"},"shipNode":[{"shipNodeName":"my distrubutor786","status":"ACTIVE","timeZone":"PST","distributorSupportedServices":["TWO_DAY_DELIVERY"],"customNodeId":"92hb1234","postalAddress":{"addressLine1":"36 CALIFORNIA SAA233","city":"SC GABRIEL22","state":"CA","country":"USA","postalCode":"90100"},"shippingDetails":[{"twoDayShipping":[{"carrierMethodName":"FEDEX","carrierMethodType":"GROUND"}]}]}]}; // \Walmart\Models\MP\US\Settings\UpdateFulfillmentCenterRequest | Request fields

try {
    $result = $api->createFulfillmentCenter($updateFulfillmentCenterRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->createFulfillmentCenter: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateFulfillmentCenterRequest** | [**\Walmart\Models\MP\US\Settings\UpdateFulfillmentCenterRequest**](../Model/UpdateFulfillmentCenterRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Settings\CreateFulfillmentCenter200ResponseInner[]**](../Model/CreateFulfillmentCenter200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createShippingTemplates()`

```php
createShippingTemplates($updateShippingTemplateRequest): \Walmart\Models\MP\US\Settings\ShippingTemplate
```
Create Shipping Templates

Create a new shipping template

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$updateShippingTemplateRequest = {"name":"Next Day servc","type":"CUSTOM","rateModelType":"TIERED_PRICING","status":"ACTIVE","shippingMethods":[{"shipMethod":"VALUE","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State"}],"addressTypes":["STREET"],"transitTime":6,"tieredShippingCharges":[{"minLimit":0,"maxLimit":-1,"shipCharge":{"amount":0,"currency":"USD"}}]}]},{"shipMethod":"STANDARD","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State","subRegions":[{"subRegionCode":"MW","subRegionName":"MW","states":[{"stateCode":"SD","stateName":"South Dakota","stateSubregions":[{"stateSubregionCode":"SD2","stateSubregionName":"SD_WEST"},{"stateSubregionCode":"SD1","stateSubregionName":"SD_EAST"}]}]}]}],"addressTypes":["STREET"],"transitTime":3,"tieredShippingCharges":[{"minLimit":10.06,"maxLimit":-1,"shipCharge":{"amount":2,"currency":"USD"}},{"minLimit":0,"maxLimit":10.05,"shipCharge":{"amount":1,"currency":"USD"}}]}]}]}; // \Walmart\Models\MP\US\Settings\UpdateShippingTemplateRequest | Request fields

try {
    $result = $api->createShippingTemplates($updateShippingTemplateRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->createShippingTemplates: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateShippingTemplateRequest** | [**\Walmart\Models\MP\US\Settings\UpdateShippingTemplateRequest**](../Model/UpdateShippingTemplateRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingTemplate**](../Model/ShippingTemplate.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `deleteShippingTemplateDetails()`

```php
deleteShippingTemplateDetails($templateId): \Walmart\Models\MP\US\Settings\ShippingTemplateId
```
Delete Shipping Template

Delete Existing Shipping Template. DEFAULT templates cannot be deleted. 3PL partners cannot delete templates created by Sellers.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$templateId = 'templateId_example'; // string | Shipping Template ID of the template to be deleted

try {
    $result = $api->deleteShippingTemplateDetails($templateId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->deleteShippingTemplateDetails: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templateId** | **string**| Shipping Template ID of the template to be deleted | |


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingTemplateId**](../Model/ShippingTemplateId.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `get3PFulfillmentProviders()`

```php
get3PFulfillmentProviders(): \Walmart\Models\MP\US\Settings\Get3PFulfillmentProviders200ResponseInner[]
```
Get all third party fulfillment providers

Get a list of all third party fulfillment providers.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->get3PFulfillmentProviders();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->get3PFulfillmentProviders: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\Get3PFulfillmentProviders200ResponseInner[]**](../Model/Get3PFulfillmentProviders200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllFulfillmentCenters()`

```php
getAllFulfillmentCenters($includeCalendarDayConfiguration): \Walmart\Models\MP\US\Settings\GetAllFulfillmentCenters200ResponseInner[]
```
Get all fulfillment centers

This API provides a list of all the fulfillment centers

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$includeCalendarDayConfiguration = false; // bool | Flag to specify if calendarDayConfiguration block will be included in the response. Allowed values are true or false.

try {
    $result = $api->getAllFulfillmentCenters($includeCalendarDayConfiguration);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getAllFulfillmentCenters: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **includeCalendarDayConfiguration** | **bool**| Flag to specify if calendarDayConfiguration block will be included in the response. Allowed values are true or false. | [optional] [default to false] |


### Return type

[**\Walmart\Models\MP\US\Settings\GetAllFulfillmentCenters200ResponseInner[]**](../Model/GetAllFulfillmentCenters200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllShippingTemplates()`

```php
getAllShippingTemplates(): \Walmart\Models\MP\US\Settings\ShippingTemplatesSummary
```
Get All Shipping Templates

Get all the shipping templates for a Seller. All template types viz. CUSTOM, DEFAULT and 3PL-specific (eg. DELIVERR) can be retrieved through this API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->getAllShippingTemplates();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getAllShippingTemplates: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingTemplatesSummary**](../Model/ShippingTemplatesSummary.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getCarrierMethods()`

```php
getCarrierMethods(): \Walmart\Models\MP\US\Settings\GetCarrierMethods200ResponseInner[]
```
Get carrier methods

Gets the available carrier methods

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->getCarrierMethods();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getCarrierMethods: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\GetCarrierMethods200ResponseInner[]**](../Model/GetCarrierMethods200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getCoverageForFulfillmentCenters()`

```php
getCoverageForFulfillmentCenters(): \Walmart\Models\MP\US\Settings\GetCoverageForFulfillmentCenters200ResponseInner[]
```
Get coverage for fulfillment centers

This API provides the list of all fullfillment centers for the seller and their coverage areas defined by Walmart based on the address

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->getCoverageForFulfillmentCenters();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getCoverageForFulfillmentCenters: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\GetCoverageForFulfillmentCenters200ResponseInner[]**](../Model/GetCoverageForFulfillmentCenters200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getPartnerConfigurations()`

```php
getPartnerConfigurations(): \Walmart\Models\MP\US\Settings\ShippingConfigsResponseDTO
```
Get Partner Configurations

<p>This API can be used to retrieve partner configurations like Seller Account & feed throttling values configured for seller.</p><p>The Feed Configuration block in the response shows the seller specific throttling configuration based on the tier of seller. If a new Seller is not assigned any tier, the block will be empty.</p><p>Please note that the default throttling configuration across Walmart and the API Throttling Response Headers can be found <a href=\"/doc/us/mp/us-mp-throttling/\">here</a></p>

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->getPartnerConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getPartnerConfigurations: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingConfigsResponseDTO**](../Model/ShippingConfigsResponseDTO.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getShippingConfigurations()`

```php
getShippingConfigurations(): \Walmart\Models\MP\US\Settings\ShippingConfigsResponseDTO
```
Get Shipping Configurations

<p>This API can be used to retrieve shipping configurations like Lag Time configured for seller.It returns lag time for exception categories that were configured for the Seller through <a href=\"https://sellerhelp.walmart.com/s/guide?article=000005986\">Request Lag Time Exceptions</a> process.</p>

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->getShippingConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getShippingConfigurations: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingConfigsResponseDTO**](../Model/ShippingConfigsResponseDTO.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getShippingTemplateActivationStatus()`

```php
getShippingTemplateActivationStatus(): \Walmart\Models\MP\US\Settings\ShippingTemplateActivationStatus
```
Get Shipping Template Activation Status

This api can be used to get the Activation Status of the Shipping Templates, which can be set through Walmart Seller Center. This activation status is not the same as the \"status:ACTIVE/INACTIVE\" of each shipping template.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();


try {
    $result = $api->getShippingTemplateActivationStatus();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getShippingTemplateActivationStatus: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingTemplateActivationStatus**](../Model/ShippingTemplateActivationStatus.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getShippingTemplateDetails()`

```php
getShippingTemplateDetails($templateId): \Walmart\Models\MP\US\Settings\ShippingTemplate
```
Get Shipping Template Details

Get Shipping Template Details. Details of CUSTOM, DEFAULT and 3PL-specific (eg. DELIVERR) templates can be retrieved through this API. 3PL will be able to see details of only 3PL-specific templates.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$templateId = 'templateId_example'; // string | templateId

try {
    $result = $api->getShippingTemplateDetails($templateId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getShippingTemplateDetails: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templateId** | **string**| templateId | |


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingTemplate**](../Model/ShippingTemplate.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateFulfillmentCenter()`

```php
updateFulfillmentCenter($updateFulfillmentCenterRequest): \Walmart\Models\MP\US\Settings\ShipNodeResponseUpdate
```
Update fulfillment center

This API enables or disables a fulfillment center.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$updateFulfillmentCenterRequest = {"shipNodeHeader":{"version":"1.2"},"shipNode":{"shipNode":"84955660770217985","shipNodeName":"Seller test-distributor","status":"ACTIVE","timeZone":"PST","distributorSupportedServices":["TWO_DAY_DELIVERY"],"customNodeId":"91ab1234","postalAddress":{"addressLine1":"111 CALIFORNIA SA","city":"SC GABRIEL","state":"CA","country":"USA","postalCode":"90706"},"shippingDetails":[{"twoDayShipping":[{"carrierMethodName":"FEDEX","carrierMethodType":"GROUND"}]}]}}; // \Walmart\Models\MP\US\Settings\UpdateFulfillmentCenterRequest | Request fields

try {
    $result = $api->updateFulfillmentCenter($updateFulfillmentCenterRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->updateFulfillmentCenter: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateFulfillmentCenterRequest** | [**\Walmart\Models\MP\US\Settings\UpdateFulfillmentCenterRequest**](../Model/UpdateFulfillmentCenterRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Settings\ShipNodeResponseUpdate**](../Model/ShipNodeResponseUpdate.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateShippingTemplates()`

```php
updateShippingTemplates($templateId, $updateShippingTemplateRequest): \Walmart\Models\MP\US\Settings\ShippingTemplate
```
Update Shipping Templates

Update existing Shipping Template.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->settings();

$templateId = 'templateId_example'; // string | templateId
$updateShippingTemplateRequest = {"name":"Next Day servc test","type":"CUSTOM","rateModelType":"TIERED_PRICING","status":"ACTIVE","shippingMethods":[{"shipMethod":"VALUE","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State"}],"addressTypes":["STREET"],"transitTime":6,"tieredShippingCharges":[{"minLimit":0,"maxLimit":-1,"shipCharge":{"amount":0,"currency":"USD"}}]}]},{"shipMethod":"STANDARD","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State","subRegions":[{"subRegionCode":"MW","subRegionName":"MW","states":[{"stateCode":"SD","stateName":"South Dakota","stateSubregions":[{"stateSubregionCode":"SD2","stateSubregionName":"SD_WEST"},{"stateSubregionCode":"SD1","stateSubregionName":"SD_EAST"}]}]}]}],"addressTypes":["STREET"],"transitTime":3,"tieredShippingCharges":[{"minLimit":10.06,"maxLimit":-1,"shipCharge":{"amount":2,"currency":"USD"}},{"minLimit":0,"maxLimit":10.05,"shipCharge":{"amount":1,"currency":"USD"}}]}]}]}; // \Walmart\Models\MP\US\Settings\UpdateShippingTemplateRequest | Request fields

try {
    $result = $api->updateShippingTemplates($templateId, $updateShippingTemplateRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->updateShippingTemplates: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templateId** | **string**| templateId | |
| **updateShippingTemplateRequest** | [**\Walmart\Models\MP\US\Settings\UpdateShippingTemplateRequest**](../Model/UpdateShippingTemplateRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Settings\ShippingTemplate**](../Model/ShippingTemplate.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
