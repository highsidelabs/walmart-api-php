# Walmart\Apis\MP\MX\AuthenticationApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTokenDetail()**](#getTokenDetail) | **GET** /v3/token/detail | Token Detail |
| [**tokenAPI()**](#tokenAPI) | **POST** /v3/token | Token API |


## `getTokenDetail()`

```php
getTokenDetail($contentType): \Walmart\Models\MP\MX\Authentication\TokenDetailResponse
```
Token Detail

This process retrieves the access permissions granted by sellers to applications in the context of OAuth 2.0. The scope encompasses various API categories, each with its respective access levels, for example Reports: View Only, Item: Full Access, etc.

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->authentication();

$contentType = application/x-www-form-urlencoded; // string | Content type of the request body.

try {
    $result = $api->getTokenDetail($contentType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->getTokenDetail: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentType** | **string**| Content type of the request body. | |


### Return type

[**\Walmart\Models\MP\MX\Authentication\TokenDetailResponse**](../../../Models/MP/MX/Authentication/TokenDetailResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `tokenAPI()`

```php
tokenAPI($contentType, $grantType, $code, $redirectUri, $refreshToken): \Walmart\Models\MP\MX\Authentication\OAuthToken
```
Token API

Get access token by providing Client ID and Client Secret.<br />An access token expires after a certain interval, so you will have to refresh a user's access token. You could use refresh token, obtained from the token API call using authorization code grant type, to get a new access token. Refresh tokens remain valid for a year.<br /><br /> [Guide reference - authorization_code](/doc/us/mp/us-mp-auth2/#606)<br /><br /> [Guide reference - refresh_token](/doc/us/mp/us-mp-auth2/#606)<br /><br /> [Guide reference - client_credentials](/doc/us/mp/us-mp-auth/#606)

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
    'country' => Country::MX,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->authentication();

$contentType = application/x-www-form-urlencoded; // string | Content type of the request body.
$grantType = 'client_credentials'; // string | Type of grant requested. <br /> **Available grant types:** authorization_code, refresh_token and client_credentials
$code = '65CA5DA313A549D49D15D3119D9AD85D'; // string | Authorization code obtained by your client app when the seller authorizes your app to access the seller resource. <br /> This field is required when **grant_type: authorization_code**
$redirectUri = 'https://example-client-app.com'; // string | This should be same as one of your client app URIs provided while registering the app. <br /> This field is required when **grant_type: authorization_code**
$refreshToken = 'APXcIoTpKMH9OQN.....'; // string | Refresh token received as response of Authentication API with authorization_code grant type, to be used to refresh the access token. <br /> This field is required when **grant_type: refresh_token**

try {
    $result = $api->tokenAPI($contentType, $grantType, $code, $redirectUri, $refreshToken);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling AuthenticationApi->tokenAPI: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contentType** | **string**| Content type of the request body. | |
| **grantType** | **string**| Type of grant requested. <br /> **Available grant types:** authorization_code, refresh_token and client_credentials | [default to 'client_credentials'] |
| **code** | **string**| Authorization code obtained by your client app when the seller authorizes your app to access the seller resource. <br /> This field is required when **grant_type: authorization_code** | [optional] [default to '65CA5DA313A549D49D15D3119D9AD85D'] |
| **redirectUri** | **string**| This should be same as one of your client app URIs provided while registering the app. <br /> This field is required when **grant_type: authorization_code** | [optional] [default to 'https://example-client-app.com'] |
| **refreshToken** | **string**| Refresh token received as response of Authentication API with authorization_code grant type, to be used to refresh the access token. <br /> This field is required when **grant_type: refresh_token** | [optional] [default to 'APXcIoTpKMH9OQN.....'] |


### Return type

[**\Walmart\Models\MP\MX\Authentication\OAuthToken**](../../../Models/MP/MX/Authentication/OAuthToken.md)

### Authorization

This endpoint requires the following authorization methods:

* `basic`: Basic authentication with a Walmart Client ID and Client Secret

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
