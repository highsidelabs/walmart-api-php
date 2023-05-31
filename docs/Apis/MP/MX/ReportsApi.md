# Walmart\Apis\MP\MX\ReportsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getItemReport()**](#getItemReport) | **GET** /v3/getReport | Get item report |


## `getItemReport()`

```php
getItemReport($type): string
```
Get item report

Returns all the information associated with Seller's items that are set up on Walmart’s platform.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();

$type = 'type_example'; // string | Type of report to be requested

try {
    $result = $api->getItemReport($type);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getItemReport: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| Type of report to be requested | |


### Return type

**string**

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
