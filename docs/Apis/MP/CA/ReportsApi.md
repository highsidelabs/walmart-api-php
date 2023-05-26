# Walmart\Api\CA\MPReportsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getItemReport()**](ReportsApi.md#getItemReport) | **GET** /v3/getReport | Get item report |


## `getItemReport()`

```php
getItemReport($type, $version): mixed
```
Get item report

Returns all the information associated with Seller's items that are set up on Walmart’s platform.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$type = 'item_ca'; // string | report type
$version = 'version_example'; // string | Use this query parameter (version=3) to access the latest version of the Item report that includes Competitor price data, Product tax code, MSRP, Shipping weight, Lag time, Fulfilment type, etc.

try {
    $result = $apiInstance->getItemReport($type, $version);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getItemReport: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| report type | [default to 'item_ca'] |
| **version** | **string**| Use this query parameter (version=3) to access the latest version of the Item report that includes Competitor price data, Product tax code, MSRP, Shipping weight, Lag time, Fulfilment type, etc. | [optional] |


### Return type

**mixed**

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
