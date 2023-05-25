# Walmart\Api\US\MPAuthenticationApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTokenDetail()**](AuthenticationApi.md#getTokenDetail) | **GET** /v3/token/detail | Token Detail |
| [**tokenAPI()**](AuthenticationApi.md#tokenAPI) | **POST** /v3/token | Token API |


## `getTokenDetail()`

```php
getTokenDetail(): \Walmart\Model\MP\US\Authentication\GetTokenDetail200Response
```
Token Detail

Retrieves information on the access levels delegated by Sellers for their Solution Providers. The scope includes a range of API categories and their corresponding access levels, for example Reports: View Only, Item: Full Access, etc.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

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

[**\Walmart\Model\MP\US\Authentication\GetTokenDetail200Response**](../Model/GetTokenDetail200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `tokenAPI()`

```php
tokenAPI($grantType): \Walmart\Model\MP\US\Authentication\TokenAPI200Response
```
Token API

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

$grantType = 'client_credentials'; // string | The type of access token to be issued

try {
    $result = $apiInstance->tokenAPI($grantType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->tokenAPI: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantType** | **string**| The type of access token to be issued | [default to 'client_credentials'] |


### Return type

[**\Walmart\Model\MP\US\Authentication\TokenAPI200Response**](../Model/TokenAPI200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
