# Walmart\Apis\US\MPUtilitiesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getApiPlatformStatus()**](UtilitiesApi.md#getApiPlatformStatus) | **GET** /v3/utilities/apiStatus | API Platform Status |
| [**getCategories()**](UtilitiesApi.md#getCategories) | **GET** /v3/utilities/taxonomy/departments/{departmentId} | All Categories |
| [**getDepartmentList()**](UtilitiesApi.md#getDepartmentList) | **GET** /v3/utilities/taxonomy/departments | All Departments |
| [**getTaxonomyResponse()**](UtilitiesApi.md#getTaxonomyResponse) | **GET** /v3/utilities/taxonomy | Taxonomy by spec |


## `getApiPlatformStatus()`

```php
getApiPlatformStatus(): \Walmart\Models\MP\US\Utilities\GetApiPlatformStatus200Response
```
API Platform Status

Get all marketplace Apis status

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\UtilitiesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getApiPlatformStatus();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getApiPlatformStatus: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Utilities\GetApiPlatformStatus200Response**](../Model/GetApiPlatformStatus200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCategories()`

```php
getCategories($departmentId): \Walmart\Models\MP\US\Utilities\GetCategories200Response
```
All Categories

Get list of categories for a specific department

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\UtilitiesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$departmentId = 'departmentId_example'; // string | departmentId

try {
    $result = $apiInstance->getCategories($departmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getCategories: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **departmentId** | **string**| departmentId | |


### Return type

[**\Walmart\Models\MP\US\Utilities\GetCategories200Response**](../Model/GetCategories200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDepartmentList()`

```php
getDepartmentList(): \Walmart\Models\MP\US\Utilities\GetDepartmentList200Response
```
All Departments

Get list of departments

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\UtilitiesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getDepartmentList();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getDepartmentList: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Utilities\GetDepartmentList200Response**](../Model/GetDepartmentList200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTaxonomyResponse()`

```php
getTaxonomyResponse($feedType, $version): \Walmart\Models\MP\US\Utilities\GetTaxonomyResponse200Response
```
Taxonomy by spec

The Taxonomy by Item spec API exposes the category taxonomy that Walmart.com uses to categorize items for each Item spec version. It returns a list of all Categories and Sub-categories that are available on Walmart.com for the Item spec version you specify. You can specify the feedType and version for these available Item specs. Make sure to specify the corresponding version that is available for that feed type: *   Item spec 3.2 feed type: item *   Item spec 4.0 feed types: MP_ITEM, MP_WFS_ITEM, or MP_MAINTENANCE *   Item spec 4.1 feed types: MP_WFS_ITEM, or MP_MAINTENANCE *   Item spec 4.2 feed type: MP_ITEM or MP_WFS_ITEM *   Item spec 4.3 feed type: MP_ITEM or MP_MAINTENANCE

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\UtilitiesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'feedType_example'; // string | Specifies the Feed Type
$version = 'version_example'; // string | Specifies the version for the Feed Type

try {
    $result = $apiInstance->getTaxonomyResponse($feedType, $version);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling UtilitiesApi->getTaxonomyResponse: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Specifies the Feed Type | [optional] |
| **version** | **string**| Specifies the version for the Feed Type | [optional] |


### Return type

[**\Walmart\Models\MP\US\Utilities\GetTaxonomyResponse200Response**](../Model/GetTaxonomyResponse200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
