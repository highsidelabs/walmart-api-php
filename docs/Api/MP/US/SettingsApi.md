# Walmart\Api\US\MPSettingsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**associate3PFulfillmentCenter()**](SettingsApi.md#associate3PFulfillmentCenter) | **POST** /v3/settings/shipping/3plshipnodes | Third party fulfillment center association |
| [**createFulfillmentCenter()**](SettingsApi.md#createFulfillmentCenter) | **POST** /v3/settings/shipping/shipnodes | Create fulfillment center |
| [**createShippingTemplates()**](SettingsApi.md#createShippingTemplates) | **POST** /v3/settings/shipping/templates | Create Shipping Templates |
| [**deleteShippingTemplateDetails()**](SettingsApi.md#deleteShippingTemplateDetails) | **DELETE** /v3/settings/shipping/templates/{templateId} | Delete Shipping Template |
| [**get3PFulfillmentProviders()**](SettingsApi.md#get3PFulfillmentProviders) | **GET** /v3/settings/shipping/3plproviders | Get all third party fulfillment providers |
| [**getAllFulfillmentCenters()**](SettingsApi.md#getAllFulfillmentCenters) | **GET** /v3/settings/shipping/shipnodes | Get all fulfillment centers |
| [**getAllShippingTemplates()**](SettingsApi.md#getAllShippingTemplates) | **GET** /v3/settings/shipping/templates | Get All Shipping Templates |
| [**getCarrierMethods()**](SettingsApi.md#getCarrierMethods) | **GET** /v3/settings/shipping/carriers | Get carrier methods |
| [**getCoverageForFulfillmentCenters()**](SettingsApi.md#getCoverageForFulfillmentCenters) | **GET** /v3/settings/shipping/shipnodes/coverage | Get coverage for fulfillment centers |
| [**getPartnerConfigurations()**](SettingsApi.md#getPartnerConfigurations) | **GET** /v3/settings/partnerprofile | Get Partner Configurations |
| [**getShippingConfigurations()**](SettingsApi.md#getShippingConfigurations) | **GET** /v3/settings/shippingprofile | Get Shipping Configurations |
| [**getShippingTemplateActivationStatus()**](SettingsApi.md#getShippingTemplateActivationStatus) | **GET** /v3/settings/shipping/templates/activationStatus | Get Shipping Template Activation Status |
| [**getShippingTemplateDetails()**](SettingsApi.md#getShippingTemplateDetails) | **GET** /v3/settings/shipping/templates/{templateId} | Get Shipping Template Details |
| [**updateFulfillmentCenter()**](SettingsApi.md#updateFulfillmentCenter) | **PUT** /v3/settings/shipping/shipnodes | Update fulfillment center |
| [**updateShippingTemplates()**](SettingsApi.md#updateShippingTemplates) | **PUT** /v3/settings/shipping/templates/{templateId} | Update Shipping Templates |


## `associate3PFulfillmentCenter()`

```php
associate3PFulfillmentCenter($associate3PFulfillmentCenterRequest): \Walmart\Model\MP\US\Settings\Associate3PFulfillmentCenterRequestShipNodeInner[]
```
Third party fulfillment center association

This API associate a third party fulfillment center with Seller.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$associate3PFulfillmentCenterRequest = {"shipNodeHeader":{"version":"1.2"},"shipNode":[{"shipNode":"99351656957153281","status":"ACTIVE"}]}; // \Walmart\Model\MP\US\Settings\Associate3PFulfillmentCenterRequest | Request fields

try {
    $result = $apiInstance->associate3PFulfillmentCenter($associate3PFulfillmentCenterRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->associate3PFulfillmentCenter: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **associate3PFulfillmentCenterRequest** | [**\Walmart\Model\MP\US\Settings\Associate3PFulfillmentCenterRequest**](../Model/Associate3PFulfillmentCenterRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Settings\Associate3PFulfillmentCenterRequestShipNodeInner[]**](../Model/Associate3PFulfillmentCenterRequestShipNodeInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createFulfillmentCenter()`

```php
createFulfillmentCenter($createFulfillmentCenterRequest): \Walmart\Model\MP\US\Settings\CreateFulfillmentCenter200ResponseInner[]
```
Create fulfillment center

This API creates a fulfillment center.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createFulfillmentCenterRequest = {"shipNodeHeader":{"version":"1.2"},"shipNode":[{"shipNodeName":"my distrubutor786","status":"ACTIVE","timeZone":"PST","distributorSupportedServices":["TWO_DAY_DELIVERY"],"customNodeId":"92hb1234","postalAddress":{"addressLine1":"36 CALIFORNIA SAA233","city":"SC GABRIEL22","state":"CA","country":"USA","postalCode":"90100"},"shippingDetails":[{"twoDayShipping":[{"carrierMethodName":"FEDEX","carrierMethodType":"GROUND"}]}]}]}; // \Walmart\Model\MP\US\Settings\CreateFulfillmentCenterRequest | Request fields

try {
    $result = $apiInstance->createFulfillmentCenter($createFulfillmentCenterRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->createFulfillmentCenter: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createFulfillmentCenterRequest** | [**\Walmart\Model\MP\US\Settings\CreateFulfillmentCenterRequest**](../Model/CreateFulfillmentCenterRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Settings\CreateFulfillmentCenter200ResponseInner[]**](../Model/CreateFulfillmentCenter200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createShippingTemplates()`

```php
createShippingTemplates($createShippingTemplatesRequest): \Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200Response
```
Create Shipping Templates

Create a new shipping template

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createShippingTemplatesRequest = {"name":"Next Day servc","type":"CUSTOM","rateModelType":"TIERED_PRICING","status":"ACTIVE","shippingMethods":[{"shipMethod":"VALUE","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State"}],"addressTypes":["STREET"],"transitTime":6,"tieredShippingCharges":[{"minLimit":0,"maxLimit":-1,"shipCharge":{"amount":0,"currency":"USD"}}]}]},{"shipMethod":"STANDARD","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State","subRegions":[{"subRegionCode":"MW","subRegionName":"MW","states":[{"stateCode":"SD","stateName":"South Dakota","stateSubregions":[{"stateSubregionCode":"SD2","stateSubregionName":"SD_WEST"},{"stateSubregionCode":"SD1","stateSubregionName":"SD_EAST"}]}]}]}],"addressTypes":["STREET"],"transitTime":3,"tieredShippingCharges":[{"minLimit":10.06,"maxLimit":-1,"shipCharge":{"amount":2,"currency":"USD"}},{"minLimit":0,"maxLimit":10.05,"shipCharge":{"amount":1,"currency":"USD"}}]}]}]}; // \Walmart\Model\MP\US\Settings\CreateShippingTemplatesRequest | Request fields

try {
    $result = $apiInstance->createShippingTemplates($createShippingTemplatesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->createShippingTemplates: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createShippingTemplatesRequest** | [**\Walmart\Model\MP\US\Settings\CreateShippingTemplatesRequest**](../Model/CreateShippingTemplatesRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200Response**](../Model/GetShippingTemplateDetails200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteShippingTemplateDetails()`

```php
deleteShippingTemplateDetails($templateId): \Walmart\Model\MP\US\Settings\DeleteShippingTemplateDetails200Response
```
Delete Shipping Template

Delete Existing Shipping Template. DEFAULT templates cannot be deleted. 3PL partners cannot delete templates created by Sellers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$templateId = 'templateId_example'; // string | Shipping Template ID of the template to be deleted

try {
    $result = $apiInstance->deleteShippingTemplateDetails($templateId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->deleteShippingTemplateDetails: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templateId** | **string**| Shipping Template ID of the template to be deleted | |


### Return type

[**\Walmart\Model\MP\US\Settings\DeleteShippingTemplateDetails200Response**](../Model/DeleteShippingTemplateDetails200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `get3PFulfillmentProviders()`

```php
get3PFulfillmentProviders(): \Walmart\Model\MP\US\Settings\Get3PFulfillmentProviders200ResponseInner[]
```
Get all third party fulfillment providers

Get a list of all third party fulfillment providers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->get3PFulfillmentProviders();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->get3PFulfillmentProviders: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\Get3PFulfillmentProviders200ResponseInner[]**](../Model/Get3PFulfillmentProviders200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllFulfillmentCenters()`

```php
getAllFulfillmentCenters($includeCalendarDayConfiguration): \Walmart\Model\MP\US\Settings\GetAllFulfillmentCenters200ResponseInner[]
```
Get all fulfillment centers

This API provides a list of all the fulfillment centers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$includeCalendarDayConfiguration = false; // bool | Flag to specify if calendarDayConfiguration block will be included in the response. Allowed values are true or false.

try {
    $result = $apiInstance->getAllFulfillmentCenters($includeCalendarDayConfiguration);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getAllFulfillmentCenters: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **includeCalendarDayConfiguration** | **bool**| Flag to specify if calendarDayConfiguration block will be included in the response. Allowed values are true or false. | [optional] [default to false] |


### Return type

[**\Walmart\Model\MP\US\Settings\GetAllFulfillmentCenters200ResponseInner[]**](../Model/GetAllFulfillmentCenters200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllShippingTemplates()`

```php
getAllShippingTemplates(): \Walmart\Model\MP\US\Settings\GetAllShippingTemplates200Response
```
Get All Shipping Templates

Get all the shipping templates for a Seller. All template types viz. CUSTOM, DEFAULT and 3PL-specific (eg. DELIVERR) can be retrieved through this API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAllShippingTemplates();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getAllShippingTemplates: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\GetAllShippingTemplates200Response**](../Model/GetAllShippingTemplates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCarrierMethods()`

```php
getCarrierMethods(): \Walmart\Model\MP\US\Settings\GetCarrierMethods200ResponseInner[]
```
Get carrier methods

Gets the available carrier methods

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getCarrierMethods();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getCarrierMethods: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\GetCarrierMethods200ResponseInner[]**](../Model/GetCarrierMethods200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCoverageForFulfillmentCenters()`

```php
getCoverageForFulfillmentCenters(): \Walmart\Model\MP\US\Settings\GetCoverageForFulfillmentCenters200ResponseInner[]
```
Get coverage for fulfillment centers

This API provides the list of all fullfillment centers for the seller and their coverage areas defined by Walmart based on the address

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getCoverageForFulfillmentCenters();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getCoverageForFulfillmentCenters: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\GetCoverageForFulfillmentCenters200ResponseInner[]**](../Model/GetCoverageForFulfillmentCenters200ResponseInner.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPartnerConfigurations()`

```php
getPartnerConfigurations(): \Walmart\Model\MP\US\Settings\GetPartnerConfigurations200Response
```
Get Partner Configurations

<p>This API can be used to retrieve partner configurations like Seller Account & feed throttling values configured for seller.</p><p>The Feed Configuration block in the response shows the seller specific throttling configuration based on the tier of seller. If a new Seller is not assigned any tier, the block will be empty.</p><p>Please note that the default throttling configuration across Walmart and the API Throttling Response Headers can be found <a href=\"/doc/us/mp/us-mp-throttling/\">here</a></p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getPartnerConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getPartnerConfigurations: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\GetPartnerConfigurations200Response**](../Model/GetPartnerConfigurations200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShippingConfigurations()`

```php
getShippingConfigurations(): \Walmart\Model\MP\US\Settings\GetShippingConfigurations200Response
```
Get Shipping Configurations

<p>This API can be used to retrieve shipping configurations like Lag Time configured for seller.It returns lag time for exception categories that were configured for the Seller through <a href=\"https://sellerhelp.walmart.com/s/guide?article=000005986\">Request Lag Time Exceptions</a> process.</p>

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getShippingConfigurations();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getShippingConfigurations: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\GetShippingConfigurations200Response**](../Model/GetShippingConfigurations200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShippingTemplateActivationStatus()`

```php
getShippingTemplateActivationStatus(): \Walmart\Model\MP\US\Settings\GetShippingTemplateActivationStatus200Response
```
Get Shipping Template Activation Status

This api can be used to get the Activation Status of the Shipping Templates, which can be set through Walmart Seller Center. This activation status is not the same as the \"status:ACTIVE/INACTIVE\" of each shipping template.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getShippingTemplateActivationStatus();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getShippingTemplateActivationStatus: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Settings\GetShippingTemplateActivationStatus200Response**](../Model/GetShippingTemplateActivationStatus200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShippingTemplateDetails()`

```php
getShippingTemplateDetails($templateId): \Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200Response
```
Get Shipping Template Details

Get Shipping Template Details. Details of CUSTOM, DEFAULT and 3PL-specific (eg. DELIVERR) templates can be retrieved through this API. 3PL will be able to see details of only 3PL-specific templates.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$templateId = 'templateId_example'; // string | templateId

try {
    $result = $apiInstance->getShippingTemplateDetails($templateId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->getShippingTemplateDetails: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templateId** | **string**| templateId | |


### Return type

[**\Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200Response**](../Model/GetShippingTemplateDetails200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateFulfillmentCenter()`

```php
updateFulfillmentCenter($updateFulfillmentCenterRequest): \Walmart\Model\MP\US\Settings\UpdateFulfillmentCenter200Response
```
Update fulfillment center

This API enables or disables a fulfillment center.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$updateFulfillmentCenterRequest = {"shipNodeHeader":{"version":"1.2"},"shipNode":{"shipNode":"84955660770217985","shipNodeName":"Seller test-distributor","status":"ACTIVE","timeZone":"PST","distributorSupportedServices":["TWO_DAY_DELIVERY"],"customNodeId":"91ab1234","postalAddress":{"addressLine1":"111 CALIFORNIA SA","city":"SC GABRIEL","state":"CA","country":"USA","postalCode":"90706"},"shippingDetails":[{"twoDayShipping":[{"carrierMethodName":"FEDEX","carrierMethodType":"GROUND"}]}]}}; // \Walmart\Model\MP\US\Settings\UpdateFulfillmentCenterRequest | Request fields

try {
    $result = $apiInstance->updateFulfillmentCenter($updateFulfillmentCenterRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->updateFulfillmentCenter: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateFulfillmentCenterRequest** | [**\Walmart\Model\MP\US\Settings\UpdateFulfillmentCenterRequest**](../Model/UpdateFulfillmentCenterRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Settings\UpdateFulfillmentCenter200Response**](../Model/UpdateFulfillmentCenter200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateShippingTemplates()`

```php
updateShippingTemplates($templateId, $updateShippingTemplatesRequest): \Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200Response
```
Update Shipping Templates

Update existing Shipping Template.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\SettingsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$templateId = 'templateId_example'; // string | templateId
$updateShippingTemplatesRequest = {"name":"Next Day servc test","type":"CUSTOM","rateModelType":"TIERED_PRICING","status":"ACTIVE","shippingMethods":[{"shipMethod":"VALUE","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State"}],"addressTypes":["STREET"],"transitTime":6,"tieredShippingCharges":[{"minLimit":0,"maxLimit":-1,"shipCharge":{"amount":0,"currency":"USD"}}]}]},{"shipMethod":"STANDARD","status":"ACTIVE","configurations":[{"regions":[{"regionCode":"C","regionName":"48 State","subRegions":[{"subRegionCode":"MW","subRegionName":"MW","states":[{"stateCode":"SD","stateName":"South Dakota","stateSubregions":[{"stateSubregionCode":"SD2","stateSubregionName":"SD_WEST"},{"stateSubregionCode":"SD1","stateSubregionName":"SD_EAST"}]}]}]}],"addressTypes":["STREET"],"transitTime":3,"tieredShippingCharges":[{"minLimit":10.06,"maxLimit":-1,"shipCharge":{"amount":2,"currency":"USD"}},{"minLimit":0,"maxLimit":10.05,"shipCharge":{"amount":1,"currency":"USD"}}]}]}]}; // \Walmart\Model\MP\US\Settings\UpdateShippingTemplatesRequest | Request fields

try {
    $result = $apiInstance->updateShippingTemplates($templateId, $updateShippingTemplatesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling SettingsApi->updateShippingTemplates: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **templateId** | **string**| templateId | |
| **updateShippingTemplatesRequest** | [**\Walmart\Model\MP\US\Settings\UpdateShippingTemplatesRequest**](../Model/UpdateShippingTemplatesRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200Response**](../Model/GetShippingTemplateDetails200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
