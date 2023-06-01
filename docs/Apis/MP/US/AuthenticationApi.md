# Walmart\Apis\MP\US\AuthenticationApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTokenDetail()**](#getTokenDetail) | **GET** /v3/token/detail | Token Detail |
| [**tokenAPI()**](#tokenAPI) | **POST** /v3/token | Token API |


## `getTokenDetail()`

```php
getTokenDetail(): \Walmart\Models\MP\US\Authentication\TokenDetailResponse
```
Token Detail

Retrieves information on the access levels delegated by Sellers for their Solution Providers. The scope includes a range of API categories and their corresponding access levels, for example Reports: View Only, Item: Full Access, etc.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->authentication();


try {
    $result = $api->getTokenDetail();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->getTokenDetail: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Authentication\TokenDetailResponse**](../../../Models/MP/US/authentication/TokenDetailResponse.md)

### Authorization



This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `tokenAPI()`

```php
tokenAPI($grantType): \Walmart\Models\MP\US\Authentication\OAuthToken
```
Token API

Get access token by providing Client ID and Client Secret.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->authentication();

$grantType = 'client_credentials'; // string | The type of access token to be issued

try {
    $result = $api->tokenAPI($grantType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->tokenAPI: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grantType** | **string**| The type of access token to be issued | [default to 'client_credentials'] |


### Return type

[**\Walmart\Models\MP\US\Authentication\OAuthToken**](../../../Models/MP/US/authentication/OAuthToken.md)

### Authorization



This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
