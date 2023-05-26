# Walmart\Api\MX\MPReportsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getItemReport()**](ReportsApi.md#getItemReport) | **GET** /v3/getReport | Get item report |


## `getItemReport()`

```php
getItemReport($type): string
```
Get item report

Returns all the information associated with Seller's items that are set up on Walmart’s platform.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$type = 'type_example'; // string | Type of report to be requested

try {
    $result = $apiInstance->getItemReport($type);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getItemReport: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| Type of report to be requested | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
