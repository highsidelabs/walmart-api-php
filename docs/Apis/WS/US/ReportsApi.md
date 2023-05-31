# Walmart\Apis\WS\US\ReportsApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getItemReport()**](#getItemReport) | **GET** /v3/getReport | Item Report |


## `getItemReport()`

```php
getItemReport($type, $version): \Walmart\Models\WS\US\Reports\GetItemReport200Response
```
Item Report

This API is used to generate the Item Report for Warehouse Suppliers. It returns all the information associated with supplier items that are set up on Walmart’s platform.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::warehouseSupplier($config)->reports();

$type = 'vendor_item'; // string | Use this to mention the type of report. Use type=vendor_item for fetching Item Report for Warehouse Suppliers.
$version = '2'; // string | Use this query parameter (version=2) to access the latest version of the Item report.

try {
    $result = $api->getItemReport($type, $version);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getItemReport: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **string**| Use this to mention the type of report. Use type=vendor_item for fetching Item Report for Warehouse Suppliers. | [default to 'vendor_item'] |
| **version** | **string**| Use this query parameter (version=2) to access the latest version of the Item report. | [default to '2'] |


### Return type

[**\Walmart\Models\WS\US\Reports\GetItemReport200Response**](../Model/GetItemReport200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)
