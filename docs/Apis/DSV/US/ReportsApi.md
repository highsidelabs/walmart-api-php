# Walmart\Apis\DSV\US\ReportsApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getItemReport()**](#getItemReport) | **GET** /v3/getReport | Item Report |


## `getItemReport()`

```php
getItemReport($type, $version): \Walmart\Models\DSV\US\Reports\ReportDTO
```
Item Report

This API is used to generate the Item Report for DSVs. It returns all the information associated with vendor items that are set up on Walmart’s platform.

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

$api = Walmart::dropShipVendor($config)->reports();

$type = 'vendor_item'; // string | Use this to mention the type of report. Use type=vendor_item for fetching Item Report for DSVs
$version = '2'; // string | Use this parameter(version = 2) to access the latest version of the DSV report.

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
| **type** | **string**| Use this to mention the type of report. Use type=vendor_item for fetching Item Report for DSVs | [default to 'vendor_item'] |
| **version** | **string**| Use this parameter(version = 2) to access the latest version of the DSV report. | [default to '2'] |


### Return type

[**\Walmart\Models\DSV\US\Reports\ReportDTO**](../../../Models/DSV/US/Reports/ReportDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/DSV/US)
[[Back to README]](../../../../README.md)
