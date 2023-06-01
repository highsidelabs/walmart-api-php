# Walmart\Apis\MP\MX\AuthenticationApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTokenDetail()**](#getTokenDetail) | **GET** /v3/token/detail | Get Token Detail |
| [**tokenAPI()**](#tokenAPI) | **POST** /v3/token | Get Access token |


## `getTokenDetail()`

```php
getTokenDetail(): mixed
```
Get Token Detail

Retrieves information on the access levels delegated by Sellers for their Solution Providers. The scope includes a range of API categories and their corresponding access levels, for example Reports: View Only, Item: Full Access, etc.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
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

**mixed**

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `tokenAPI()`

```php
tokenAPI($grantType): \Walmart\Models\MP\MX\Authentication\OAuthTokenDTO
```
Get Access token

Get access token by providing Client ID and Client Secret.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->authentication();

$grantType = 'grantType_example'; // string

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
| **grantType** | **string**|  | [optional] |


### Return type

[**\Walmart\Models\MP\MX\Authentication\OAuthTokenDTO**](../../../Models/MP/MX/Authentication/OAuthTokenDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
