# Walmart\Apis\MP\US\RulesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**activateRule()**](#activateRule) | **PUT** /v3/rules/activate | Activate rule |
| [**changeAssortmentType()**](#changeAssortmentType) | **PUT** /v3/rules/assortment | Change assortment type |
| [**createItemRule()**](#createItemRule) | **POST** /v3/rules/create | Create a new Rule |
| [**createOverrideExceptions()**](#createOverrideExceptions) | **POST** /v3/rules/exceptions | Create override exceptions |
| [**deleteExceptions()**](#deleteExceptions) | **PUT** /v3/rules/exceptions | Delete exceptions |
| [**deleteRule()**](#deleteRule) | **DELETE** /v3/rules/{ruleId}/status/{ruleStatus}/ | Delete rule |
| [**downloadExceptions()**](#downloadExceptions) | **GET** /v3/rules/downloadexceptions | Download exceptions |
| [**downloadSimulationResult()**](#downloadSimulationResult) | **GET** /v3/rules/{ruleId}/status/{ruleStatus}/simulation | Download simulation result |
| [**getARule()**](#getARule) | **GET** /v3/rules/{ruleId}/status/{ruleStatus} | Get a rule |
| [**getAllAreas()**](#getAllAreas) | **GET** /v3/rules/areas | Get all areas |
| [**getAllExceptions()**](#getAllExceptions) | **GET** /v3/rules/exceptions | Gets all exceptions |
| [**getAllRules()**](#getAllRules) | **GET** /v3/rules/ | Get all rules |
| [**getAllSubCategories()**](#getAllSubCategories) | **GET** /v3/rules/subcategories | Get all sub-categories |
| [**getSimulationResult()**](#getSimulationResult) | **GET** /v3/rules/{ruleId}/status/{ruleStatus}/simulationcount | Get simulation result |
| [**inactivateRule()**](#inactivateRule) | **PUT** /v3/rules/inactivate | Inactivate rule |
| [**updateRule()**](#updateRule) | **PUT** /v3/rules/ | Update rule |
| [**updateShippingAreaToRule()**](#updateShippingAreaToRule) | **PUT** /v3/rules/actions | Update shipping area to rules |


## `activateRule()`

```php
activateRule($inactivateRuleRequest): \Walmart\Models\MP\US\Rules\InactivateRuleResponse
```
Activate rule

This API is used to activate a rule for a specific ruleId and ruleStatus. Only Rules which are in submitted and inactive state can be activated.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$inactivateRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":[{"ruleId":"39","ruleStatus":"Submitted"},{"ruleId":"44","ruleStatus":"Inactive"}]}; // \Walmart\Models\MP\US\Rules\InactivateRuleRequest | Request fields

try {
    $result = $api->activateRule($inactivateRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->activateRule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inactivateRuleRequest** | [**\Walmart\Models\MP\US\Rules\InactivateRuleRequest**](../../../Models/MP/US/Rules/InactivateRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\InactivateRuleResponse**](../../../Models/MP/US/Rules/InactivateRuleResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `changeAssortmentType()`

```php
changeAssortmentType($enable, $body): \Walmart\Models\MP\US\Rules\ChangeAssortmentResponse
```
Change assortment type

This API helps you enable or disable the two-day assortment type.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$enable = true; // bool
$body = array('key' => new \stdClass); // object

try {
    $result = $api->changeAssortmentType($enable, $body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->changeAssortmentType: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **enable** | **bool**|  | |
| **body** | **object**|  | |


### Return type

[**\Walmart\Models\MP\US\Rules\ChangeAssortmentResponse**](../../../Models/MP/US/Rules/ChangeAssortmentResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createItemRule()`

```php
createItemRule($createOverrideExceptionRequest): \Walmart\Models\MP\US\Rules\CreateRuleResponse
```
Create a new Rule

This API is used to create a rule by selecting any combination of conditions for Sub-category, Price and Weight.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$createOverrideExceptionRequest = {"ruleHeader":{"version":"1.2"},"rules":{"name":"testing-new-501","description":"testing-new-501","priority":"832","conditions":[{"name":"price","operator":"EQUALS","value":"20"},{"name":"subCategories","operator":"IN","value":"571fdff7208f9a0cdb760a7f,56f2eb65208f9a0612c3adbd"}]}}; // \Walmart\Models\MP\US\Rules\CreateOverrideExceptionRequest | Request fields

try {
    $result = $api->createItemRule($createOverrideExceptionRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->createItemRule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createOverrideExceptionRequest** | [**\Walmart\Models\MP\US\Rules\CreateOverrideExceptionRequest**](../../../Models/MP/US/Rules/CreateOverrideExceptionRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\CreateRuleResponse**](../../../Models/MP/US/Rules/CreateRuleResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createOverrideExceptions()`

```php
createOverrideExceptions($createOverrideExceptionRequest): \Walmart\Models\MP\US\Rules\CreateOverrideExceptionResponse
```
Create override exceptions

This API is used if any SKU is required to be removed from Two-day delivery settings

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$createOverrideExceptionRequest = {"ruleHeader":{"version":"1.2"},"rules":{"skus":[{"sku":"sku-1234"},{"sku":"sku-2323"}]}}; // \Walmart\Models\MP\US\Rules\CreateOverrideExceptionRequest | Request fields

try {
    $result = $api->createOverrideExceptions($createOverrideExceptionRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->createOverrideExceptions: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createOverrideExceptionRequest** | [**\Walmart\Models\MP\US\Rules\CreateOverrideExceptionRequest**](../../../Models/MP/US/Rules/CreateOverrideExceptionRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\CreateOverrideExceptionResponse**](../../../Models/MP/US/Rules/CreateOverrideExceptionResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `deleteExceptions()`

```php
deleteExceptions($deleteExceptionRequest): \Walmart\Models\MP\US\Rules\DeleteExceptionResponse
```
Delete exceptions

This API is used to bring back any SKU to Two-day Delivery settings.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$deleteExceptionRequest = {"ruleHeader":{"version":"1.2"},"rules":{"skus":[{"sku":"sku-1234"},{"sku":"sku-2323"}]}}; // \Walmart\Models\MP\US\Rules\DeleteExceptionRequest | Request fields

try {
    $result = $api->deleteExceptions($deleteExceptionRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->deleteExceptions: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deleteExceptionRequest** | [**\Walmart\Models\MP\US\Rules\DeleteExceptionRequest**](../../../Models/MP/US/Rules/DeleteExceptionRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\DeleteExceptionResponse**](../../../Models/MP/US/Rules/DeleteExceptionResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `deleteRule()`

```php
deleteRule($ruleId, $ruleStatus): \Walmart\Models\MP\US\Rules\DeleteRuleResponse
```
Delete rule

This API is used to delete a rule for a specific ruleId and ruleStatus

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $api->deleteRule($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->deleteRule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

[**\Walmart\Models\MP\US\Rules\DeleteRuleResponse**](../../../Models/MP/US/Rules/DeleteRuleResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `downloadExceptions()`

```php
downloadExceptions(): string
```
Download exceptions

You can use this API to get list of the items defined using \"Create Override Exceptions\".

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();


try {
    $result = $api->downloadExceptions();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->downloadExceptions: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

**string**

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `downloadSimulationResult()`

```php
downloadSimulationResult($ruleId, $ruleStatus): mixed
```
Download simulation result

You can use this API to download the count of items shortlisted for two-day shipping for a specific rule defined by ruleId and ruleStatus

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $api->downloadSimulationResult($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->downloadSimulationResult: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

**mixed**

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getARule()`

```php
getARule($ruleId, $ruleStatus): \Walmart\Models\MP\US\Rules\GetAllRulesResponse
```
Get a rule

Retrieves a rule detail for a specific ruleId and ruleStatus.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $api->getARule($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getARule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllRulesResponse**](../../../Models/MP/US/Rules/GetAllRulesResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllAreas()`

```php
getAllAreas(): \Walmart\Models\MP\US\Rules\GetAllAreasResponse
```
Get all areas

This API provides you the list of states on which you can provide two-day shipping of an item.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();


try {
    $result = $api->getAllAreas();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllAreas: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllAreasResponse**](../../../Models/MP/US/Rules/GetAllAreasResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllExceptions()`

```php
getAllExceptions(): \Walmart\Models\MP\US\Rules\GetAllExceptionsResponse
```
Gets all exceptions

This API retrieves all the items which has been defined as exceptions using \"Create Override Exception\" API.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();


try {
    $result = $api->getAllExceptions();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllExceptions: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllExceptionsResponse**](../../../Models/MP/US/Rules/GetAllExceptionsResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllRules()`

```php
getAllRules(): \Walmart\Models\MP\US\Rules\GetAllRulesResponse
```
Get all rules

This API retrieves the details of all the rules defined using \"create an Item rule\" API.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();


try {
    $result = $api->getAllRules();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllRules: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllRulesResponse**](../../../Models/MP/US/Rules/GetAllRulesResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAllSubCategories()`

```php
getAllSubCategories(): \Walmart\Models\MP\US\Rules\GetAllSubCategoriesResponse
```
Get all sub-categories

This API provides the complete list of sub-categories which can be used while defining the rule.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();


try {
    $result = $api->getAllSubCategories();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getAllSubCategories: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Rules\GetAllSubCategoriesResponse**](../../../Models/MP/US/Rules/GetAllSubCategoriesResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getSimulationResult()`

```php
getSimulationResult($ruleId, $ruleStatus): \Walmart\Models\MP\US\Rules\GetSimulationCountResponse
```
Get simulation result

You can use this API to get the count of items shortlisted for two-day shipping for a specific rule defined by ruleId and ruleStatus

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$ruleId = 'ruleId_example'; // string | Unique identifier of the rule created for custom rule assortment.
$ruleStatus = 'ruleStatus_example'; // string | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted.

try {
    $result = $api->getSimulationResult($ruleId, $ruleStatus);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->getSimulationResult: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **ruleId** | **string**| Unique identifier of the rule created for custom rule assortment. | |
| **ruleStatus** | **string**| Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | |


### Return type

[**\Walmart\Models\MP\US\Rules\GetSimulationCountResponse**](../../../Models/MP/US/Rules/GetSimulationCountResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `inactivateRule()`

```php
inactivateRule($inactivateRuleRequest): \Walmart\Models\MP\US\Rules\InactivateRuleResponse
```
Inactivate rule

You can use this API to inactivate one or more rules for a specific ruleId and ruleStatus.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$inactivateRuleRequest = {"ruleHeader":{"version":"1.2"},"rules":[{"ruleId":"39","ruleStatus":"Submitted"},{"ruleId":"44","ruleStatus":"Active"}]}; // \Walmart\Models\MP\US\Rules\InactivateRuleRequest | Request fields

try {
    $result = $api->inactivateRule($inactivateRuleRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->inactivateRule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inactivateRuleRequest** | [**\Walmart\Models\MP\US\Rules\InactivateRuleRequest**](../../../Models/MP/US/Rules/InactivateRuleRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\InactivateRuleResponse**](../../../Models/MP/US/Rules/InactivateRuleResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateRule()`

```php
updateRule($updateShippingAreaToRulesRequest): \Walmart\Models\MP\US\Rules\CreateRuleResponse
```
Update rule

This API updates a rule defined using \"create an Item rule\". You can update priority, Description, conditions and name of a rule.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$updateShippingAreaToRulesRequest = {"ruleHeader":{"version":"1.2"},"rules":[{"ruleId":"511","ruleStatus":"Submitted","name":"testing-new-501","description":"testing-new-501","priority":"832","conditions":[{"name":"subCategories","operator":"IN","value":"571fdff7208f9a0cdb760a7f,56f2eb65208f9a0612c3adbd"}]}]}; // \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRulesRequest | Request fields

try {
    $result = $api->updateRule($updateShippingAreaToRulesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->updateRule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateShippingAreaToRulesRequest** | [**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRulesRequest**](../../../Models/MP/US/Rules/UpdateShippingAreaToRulesRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\CreateRuleResponse**](../../../Models/MP/US/Rules/CreateRuleResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateShippingAreaToRule()`

```php
updateShippingAreaToRule($updateShippingAreaToRulesRequest): \Walmart\Models\MP\US\Rules\CreateRuleResponse
```
Update shipping area to rules

This API helps you define coverage areas for your items that are held outside of the fulfillment centers defined by your shipNode management API's.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->rules();

$updateShippingAreaToRulesRequest = {"ruleHeader":{"version":"1.2"},"rules":{"ruleId":"612","ruleStatus":"Submitted","actions":[{"twoDayShippingRegions":[{"regionCode":"NE","subRegions":[{"subRegionCode":"NY1"},{"subRegionCode":"NY2"}]}]}]}}; // \Walmart\Models\MP\US\Rules\UpdateShippingAreaToRulesRequest | Request fields

try {
    $result = $api->updateShippingAreaToRule($updateShippingAreaToRulesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling RulesApi->updateShippingAreaToRule: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateShippingAreaToRulesRequest** | [**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRulesRequest**](../../../Models/MP/US/Rules/UpdateShippingAreaToRulesRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Rules\CreateRuleResponse**](../../../Models/MP/US/Rules/CreateRuleResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
