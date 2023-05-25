# Walmart\Apis\US\MPRulesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**activateRule()**](RulesApi.md#activateRule) | **PUT** /v3/rules/activate | Activate rule |
| [**changeAssortmentType()**](RulesApi.md#changeAssortmentType) | **PUT** /v3/rules/assortment | Change assortment type |
| [**createItemRule()**](RulesApi.md#createItemRule) | **POST** /v3/rules/create | Create a new Rule |
| [**createOverrideExceptions()**](RulesApi.md#createOverrideExceptions) | **POST** /v3/rules/exceptions | Create override exceptions |
| [**deleteExceptions()**](RulesApi.md#deleteExceptions) | **PUT** /v3/rules/exceptions | Delete exceptions |
| [**deleteRule()**](RulesApi.md#deleteRule) | **DELETE** /v3/rules/{ruleId}/status/{ruleStatus}/ | Delete rule |
| [**downloadExceptions()**](RulesApi.md#downloadExceptions) | **GET** /v3/rules/downloadexceptions | Download exceptions |
| [**downloadSimulationResult()**](RulesApi.md#downloadSimulationResult) | **GET** /v3/rules/{ruleId}/status/{ruleStatus}/simulation | Download simulation result |
| [**getARule()**](RulesApi.md#getARule) | **GET** /v3/rules/{ruleId}/status/{ruleStatus} | Get a rule |
| [**getAllAreas()**](RulesApi.md#getAllAreas) | **GET** /v3/rules/areas | Get all areas |
| [**getAllExceptions()**](RulesApi.md#getAllExceptions) | **GET** /v3/rules/exceptions | Gets all exceptions |
| [**getAllRules()**](RulesApi.md#getAllRules) | **GET** /v3/rules/ | Get all rules |
| [**getAllSubCategories()**](RulesApi.md#getAllSubCategories) | **GET** /v3/rules/subcategories | Get all sub-categories |
| [**getSimulationResult()**](RulesApi.md#getSimulationResult) | **GET** /v3/rules/{ruleId}/status/{ruleStatus}/simulationcount | Get simulation result |
| [**inactivateRule()**](RulesApi.md#inactivateRule) | **PUT** /v3/rules/inactivate | Inactivate rule |
| [**updateRule()**](RulesApi.md#updateRule) | **PUT** /v3/rules/ | Update rule |
| [**updateShippingAreaToRule()**](RulesApi.md#updateShippingAreaToRule) | **PUT** /v3/rules/actions | Update shipping area to rules |


## `activateRule()`

```php
activateRule($inactivateRuleRequest): \Walmart\Models\MP\US\Rules\ActivateRule200Response
```
Activate rule

This API is used to activate a rule for a specific ruleId and ruleStatus. Only Rules which are in submitted and inactive state can be activated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$inactivateRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":[{"ruleId":"39","ruleStatus":"Submitted"},{"ruleId":"44","ruleStatus":"Inactive"}]}; // \Walmart\Models\MP\US\Rules\InactivateRuleRequest | Request fields

try {
    $result = $apiInstance->activateRule($inactivateRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->activateRule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inactivateRuleRequest** | [**\Walmart\Models\MP\US\Rules\InactivateRuleRequest**](../Model/InactivateRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\ActivateRule200Response**](../Model/ActivateRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `changeAssortmentType()`

```php
changeAssortmentType($enable, $body): \Walmart\Models\MP\US\Rules\ChangeAssortmentType200Response
```
Change assortment type

This API helps you enable or disable the two-day assortment type.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$enable = true; // bool
$body = array('key' => new \stdClass); // object

try {
    $result = $apiInstance->changeAssortmentType($enable, $body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->changeAssortmentType: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **enable** | **bool**|  | |
| **body** | **object**|  | |


### Return type

[**\Walmart\Models\MP\US\Rules\ChangeAssortmentType200Response**](../Model/ChangeAssortmentType200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createItemRule()`

```php
createItemRule($createItemRuleRequest): \Walmart\Models\MP\US\Rules\CreateItemRule200Response
```
Create a new Rule

This API is used to create a rule by selecting any combination of conditions for Sub-category, Price and Weight.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createItemRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":{"name":"testing-new-501","description":"testing-new-501","priority":"832","conditions":[{"name":"price","operator":"EQUALS","value":"20"},{"name":"subCategories","operator":"IN","value":"571fdff7208f9a0cdb760a7f,56f2eb65208f9a0612c3adbd"}]}}; // \Walmart\Models\MP\US\Rules\CreateItemRuleRequest | Request fields

try {
    $result = $apiInstance->createItemRule($createItemRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->createItemRule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createItemRuleRequest** | [**\Walmart\Models\MP\US\Rules\CreateItemRuleRequest**](../Model/CreateItemRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\CreateItemRule200Response**](../Model/CreateItemRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createOverrideExceptions()`

```php
createOverrideExceptions($deleteExceptionsRequest): \Walmart\Models\MP\US\Rules\DeleteExceptions200Response
```
Create override exceptions

This API is used if any SKU is required to be removed from Two-day delivery settings

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$deleteExceptionsRequest = {"ruleHeader":{"version":"1.2"},"rules":{"skus":[{"sku":"sku-1234"},{"sku":"sku-2323"}]}}; // \Walmart\Models\MP\US\Rules\DeleteExceptionsRequest | Request fields

try {
    $result = $apiInstance->createOverrideExceptions($deleteExceptionsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->createOverrideExceptions: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deleteExceptionsRequest** | [**\Walmart\Models\MP\US\Rules\DeleteExceptionsRequest**](../Model/DeleteExceptionsRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\DeleteExceptions200Response**](../Model/DeleteExceptions200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteExceptions()`

```php
deleteExceptions($deleteExceptionsRequest): \Walmart\Models\MP\US\Rules\DeleteExceptions200Response
```
Delete exceptions

This API is used to bring back any SKU to Two-day Delivery settings.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$deleteExceptionsRequest = {"ruleHeader":{"version":"1.2"},"rules":{"skus":[{"sku":"sku-1234"},{"sku":"sku-2323"}]}}; // \Walmart\Models\MP\US\Rules\DeleteExceptionsRequest | Request fields

try {
    $result = $apiInstance->deleteExceptions($deleteExceptionsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->deleteExceptions: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deleteExceptionsRequest** | [**\Walmart\Models\MP\US\Rules\DeleteExceptionsRequest**](../Model/DeleteExceptionsRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\DeleteExceptions200Response**](../Model/DeleteExceptions200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRule()`

```php
deleteRule($ruleId, $ruleStatus): \Walmart\Models\MP\US\Rules\DeleteRule200Response
```
Delete rule

This API is used to delete a rule for a specific ruleId and ruleStatus

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $apiInstance->deleteRule($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->deleteRule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

[**\Walmart\Models\MP\US\Rules\DeleteRule200Response**](../Model/DeleteRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadExceptions()`

```php
downloadExceptions(): string
```
Download exceptions

You can use this API to get list of the items defined using \"Create Override Exceptions\".

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->downloadExceptions();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->downloadExceptions: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadSimulationResult()`

```php
downloadSimulationResult($ruleId, $ruleStatus): mixed
```
Download simulation result

You can use this API to download the count of items shortlisted for two-day shipping for a specific rule defined by ruleId and ruleStatus

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $apiInstance->downloadSimulationResult($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->downloadSimulationResult: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

**mixed**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getARule()`

```php
getARule($ruleId, $ruleStatus): \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response
```
Get a rule

Retrieves a rule detail for a specific ruleId and ruleStatus.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $apiInstance->getARule($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getARule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

[**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response**](../Model/UpdateShippingAreaToRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllAreas()`

```php
getAllAreas(): \Walmart\Models\MP\US\Rules\GetAllAreas200Response
```
Get all areas

This API provides you the list of states on which you can provide two-day shipping of an item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAllAreas();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllAreas: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllAreas200Response**](../Model/GetAllAreas200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllExceptions()`

```php
getAllExceptions(): \Walmart\Models\MP\US\Rules\GetAllExceptions200Response
```
Gets all exceptions

This API retrieves all the items which has been defined as exceptions using \"Create Override Exception\" API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAllExceptions();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllExceptions: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllExceptions200Response**](../Model/GetAllExceptions200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllRules()`

```php
getAllRules(): \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response
```
Get all rules

This API retrieves the details of all the rules defined using \"create an Item rule\" API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAllRules();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllRules: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response**](../Model/UpdateShippingAreaToRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllSubCategories()`

```php
getAllSubCategories(): \Walmart\Models\MP\US\Rules\GetAllSubCategories200Response
```
Get all sub-categories

This API provides the complete list of sub-categories which can be used while defining the rule.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAllSubCategories();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllSubCategories: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllSubCategories200Response**](../Model/GetAllSubCategories200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSimulationResult()`

```php
getSimulationResult($ruleId, $ruleStatus): \Walmart\Models\MP\US\Rules\GetSimulationResult200Response
```
Get simulation result

You can use this API to get the count of items shortlisted for two-day shipping for a specific rule defined by ruleId and ruleStatus

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $apiInstance->getSimulationResult($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getSimulationResult: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

[**\Walmart\Models\MP\US\Rules\GetSimulationResult200Response**](../Model/GetSimulationResult200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inactivateRule()`

```php
inactivateRule($inactivateRuleRequest): \Walmart\Models\MP\US\Rules\InactivateRule200Response
```
Inactivate rule

You can use this API to inactivate one or more rules for a specific ruleId and ruleStatus.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$inactivateRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":[{"ruleId":"39","ruleStatus":"Submitted"},{"ruleId":"44","ruleStatus":"Active"}]}; // \Walmart\Models\MP\US\Rules\InactivateRuleRequest | Request fields

try {
    $result = $apiInstance->inactivateRule($inactivateRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->inactivateRule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inactivateRuleRequest** | [**\Walmart\Models\MP\US\Rules\InactivateRuleRequest**](../Model/InactivateRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\InactivateRule200Response**](../Model/InactivateRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateRule()`

```php
updateRule($updateRuleRequest): \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response
```
Update rule

This API updates a rule defined using \"create an Item rule\". You can update priority, Description, conditions and name of a rule.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$updateRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":[{"ruleId":"511","ruleStatus":"Submitted","name":"testing-new-501","description":"testing-new-501","priority":"832","conditions":[{"name":"subCategories","operator":"IN","value":"571fdff7208f9a0cdb760a7f,56f2eb65208f9a0612c3adbd"}]}]}; // \Walmart\Models\MP\US\Rules\UpdateRuleRequest | Request fields

try {
    $result = $apiInstance->updateRule($updateRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->updateRule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateRuleRequest** | [**\Walmart\Models\MP\US\Rules\UpdateRuleRequest**](../Model/UpdateRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response**](../Model/UpdateShippingAreaToRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateShippingAreaToRule()`

```php
updateShippingAreaToRule($updateShippingAreaToRuleRequest): \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response
```
Update shipping area to rules

This API helps you define coverage areas for your items that are held outside of the fulfillment centers defined by your shipNode management API's.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\RulesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$updateShippingAreaToRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":{"ruleId":"612","ruleStatus":"Submitted","actions":[{"twoDayShippingRegions":[{"regionCode":"NE","subRegions":[{"subRegionCode":"NY1"},{"subRegionCode":"NY2"}]}]}]}}; // \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRuleRequest | Request fields

try {
    $result = $apiInstance->updateShippingAreaToRule($updateShippingAreaToRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->updateShippingAreaToRule: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateShippingAreaToRuleRequest** | [**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRuleRequest**](../Model/UpdateShippingAreaToRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200Response**](../Model/UpdateShippingAreaToRule200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
