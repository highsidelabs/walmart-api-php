# Walmart\Apis\MP\US\ReportsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAvailableReconReportDates()**](#getAvailableReconReportDates) | **GET** /v3/report/reconreport/availableReconFiles | Available recon report dates(Legacy) |
| [**getAvailableV1ReconReportDates()**](#getAvailableV1ReconReportDates) | **GET** /v3/report/reconreport/availableReconFiles?reportVersion&#x3D;v1 | Available recon report dates |
| [**getPartnerPerformance()**](#getPartnerPerformance) | **GET** /v3/report/payment/performance | Performance Report |
| [**getPartnerStatement()**](#getPartnerStatement) | **GET** /v3/report/payment/statement | Payment Statement Report |
| [**getReconReport()**](#getReconReport) | **GET** /v3/report/reconreport/reconFile | Recon report(Legacy) |
| [**getReconReportV1()**](#getReconReportV1) | **GET** /v3/report/reconreport/reconFile?reportVersion&#x3D;v1 | Recon report |


## `getAvailableReconReportDates()`

```php
getAvailableReconReportDates(): \Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response
```
Available recon report dates(Legacy)

This API will list all the available Marketplace reconciliation report dates for the Seller.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();


try {
    $result = $api->getAvailableReconReportDates();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getAvailableReconReportDates: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response**](../Model/GetAvailableReconReportDates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAvailableV1ReconReportDates()`

```php
getAvailableV1ReconReportDates(): \Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response
```
Available recon report dates

This API will list all the available Marketplace reconciliation report dates for the Seller.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();


try {
    $result = $api->getAvailableV1ReconReportDates();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getAvailableV1ReconReportDates: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response**](../Model/GetAvailableReconReportDates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getPartnerPerformance()`

```php
getPartnerPerformance(): \Walmart\Models\MP\US\Reports\GetPartnerPerformance200Response
```
Performance Report

This API will get a partner's current cycle performance

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();


try {
    $result = $api->getPartnerPerformance();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getPartnerPerformance: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetPartnerPerformance200Response**](../Model/GetPartnerPerformance200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getPartnerStatement()`

```php
getPartnerStatement(): \Walmart\Models\MP\US\Reports\GetPartnerStatement200Response
```
Payment Statement Report

This API will get a partner's current cycle statement

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();


try {
    $result = $api->getPartnerStatement();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getPartnerStatement: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetPartnerStatement200Response**](../Model/GetPartnerStatement200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getReconReport()`

```php
getReconReport($reportDate): string
```
Recon report(Legacy)

Seller can download the reconciliation report for a specific date using this API. Dates available to be downloaded can be found by using the Get available reconciliation report dates API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();

$reportDate = 'reportDate_example'; // string | The date for which the reconcilation file is available

try {
    $result = $api->getReconReport($reportDate);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getReconReport: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **reportDate** | **string**| The date for which the reconcilation file is available | |


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getReconReportV1()`

```php
getReconReportV1($reportDate, $reportVersion): string
```
Recon report

Seller can download the reconciliation report for a specific date using this API. Dates available to be downloaded can be found by using the Get available reconciliation report dates API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->reports();

$reportDate = 'reportDate_example'; // string | The date for which the reconcilation file is available
$reportVersion = 'reportVersion_example'; // string | Report Version

try {
    $result = $api->getReconReportV1($reportDate, $reportVersion);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getReconReportV1: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **reportDate** | **string**| The date for which the reconcilation file is available | |
| **reportVersion** | **string**| Report Version | |


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
