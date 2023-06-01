# Walmart\Apis\MP\US\UtilitiesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getApiPlatformStatus()**](#getApiPlatformStatus) | **GET** /v3/utilities/apiStatus | API Platform Status |
| [**getCategories()**](#getCategories) | **GET** /v3/utilities/taxonomy/departments/{departmentId} | All Categories |
| [**getDepartmentList()**](#getDepartmentList) | **GET** /v3/utilities/taxonomy/departments | All Departments |
| [**getTaxonomyResponse()**](#getTaxonomyResponse) | **GET** /v3/utilities/taxonomy | Taxonomy by spec |


## `getApiPlatformStatus()`

```php
getApiPlatformStatus(): \Walmart\Models\MP\US\Utilities\StatusAPIResponse
```
API Platform Status

Get all marketplace Apis status

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->utilities();


try {
    $result = $api->getApiPlatformStatus();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getApiPlatformStatus: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Utilities\StatusAPIResponse**](../../../Models/MP/US/utilities/StatusAPIResponse.md)

### Authorization



This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getCategories()`

```php
getCategories($departmentId): \Walmart\Models\MP\US\Utilities\GetCategories
```
All Categories

Get list of categories for a specific department

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->utilities();

$departmentId = 'departmentId_example'; // string | departmentId

try {
    $result = $api->getCategories($departmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getCategories: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **departmentId** | **string**| departmentId | |


### Return type

[**\Walmart\Models\MP\US\Utilities\GetCategories**](../../../Models/MP/US/utilities/GetCategories.md)

### Authorization



This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getDepartmentList()`

```php
getDepartmentList(): \Walmart\Models\MP\US\Utilities\TaxonomyResponseDTO
```
All Departments

Get list of departments

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->utilities();


try {
    $result = $api->getDepartmentList();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getDepartmentList: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Utilities\TaxonomyResponseDTO**](../../../Models/MP/US/utilities/TaxonomyResponseDTO.md)

### Authorization



This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getTaxonomyResponse()`

```php
getTaxonomyResponse($feedType, $version): \Walmart\Models\MP\US\Utilities\TaxonomyResponseDTO
```
Taxonomy by spec

The Taxonomy by Item spec API exposes the category taxonomy that Walmart.com uses to categorize items for each Item spec version. It returns a list of all Categories and Sub-categories that are available on Walmart.com for the Item spec version you specify. You can specify the feedType and version for these available Item specs. Make sure to specify the corresponding version that is available for that feed type: *   Item spec 3.2 feed type: item *   Item spec 4.0 feed types: MP_ITEM, MP_WFS_ITEM, or MP_MAINTENANCE *   Item spec 4.1 feed types: MP_WFS_ITEM, or MP_MAINTENANCE *   Item spec 4.2 feed type: MP_ITEM or MP_WFS_ITEM *   Item spec 4.3 feed type: MP_ITEM or MP_MAINTENANCE

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->utilities();

$feedType = 'feedType_example'; // string | Specifies the Feed Type
$version = 'version_example'; // string | Specifies the version for the Feed Type

try {
    $result = $api->getTaxonomyResponse($feedType, $version);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getTaxonomyResponse: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Specifies the Feed Type | [optional] |
| **version** | **string**| Specifies the version for the Feed Type | [optional] |


### Return type

[**\Walmart\Models\MP\US\Utilities\TaxonomyResponseDTO**](../../../Models/MP/US/utilities/TaxonomyResponseDTO.md)

### Authorization



This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
