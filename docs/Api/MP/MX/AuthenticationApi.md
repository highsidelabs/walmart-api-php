# Walmart\Api\MX\MPAuthenticationApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTokenDetail()**](AuthenticationApi.md#getTokenDetail) | **GET** /v3/token/detail | Get Token Detail |
| [**tokenAPI()**](AuthenticationApi.md#tokenAPI) | **POST** /v3/token | Get Access token |


## `getTokenDetail()`

```php
getTokenDetail(): mixed
```
Get Token Detail

Retrieves information on the access levels delegated by Sellers for their Solution Providers. The scope includes a range of API categories and their corresponding access levels, for example Reports: View Only, Item: Full Access, etc.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');

$apiInstance = new Walmart\Api\AuthenticationApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getTokenDetail();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->getTokenDetail: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

**mixed**

### Authorization

[basicScheme](../../README.md#basicScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `tokenAPI()`

```php
tokenAPI($grantType): \Walmart\Model\MP\MX\Authentication\TokenAPI200Response
```
Get Access token

Get access token by providing Client ID and Client Secret.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');

$apiInstance = new Walmart\Api\AuthenticationApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$grantType = 'grantType_example'; // string

try {
    $result = $apiInstance->tokenAPI($grantType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->tokenAPI: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantType** | **string**|  | [optional] |


### Return type

[**\Walmart\Model\MP\MX\Authentication\TokenAPI200Response**](../Model/TokenAPI200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
