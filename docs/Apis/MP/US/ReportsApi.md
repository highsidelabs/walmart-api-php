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
getAvailableReconReportDates(): \Walmart\Models\MP\US\Reports\ReconReportDateResponse
```
Available recon report dates(Legacy)

This API will list all the available Marketplace reconciliation report dates for the Seller.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
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

[**\Walmart\Models\MP\US\Reports\ReconReportDateResponse**](../../../Models/MP/US/Reports/ReconReportDateResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getAvailableV1ReconReportDates()`

```php
getAvailableV1ReconReportDates(): \Walmart\Models\MP\US\Reports\ReconReportDateResponse
```
Available recon report dates

This API will list all the available Marketplace reconciliation report dates for the Seller.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
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

[**\Walmart\Models\MP\US\Reports\ReconReportDateResponse**](../../../Models/MP/US/Reports/ReconReportDateResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getPartnerPerformance()`

```php
getPartnerPerformance(): \Walmart\Models\MP\US\Reports\PartnerProgramPerformanceRes
```
Performance Report

This API will get a partner's current cycle performance

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
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

[**\Walmart\Models\MP\US\Reports\PartnerProgramPerformanceRes**](../../../Models/MP/US/Reports/PartnerProgramPerformanceRes.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getPartnerStatement()`

```php
getPartnerStatement(): \Walmart\Models\MP\US\Reports\PartnerProgramStatementRes
```
Payment Statement Report

This API will get a partner's current cycle statement

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
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

[**\Walmart\Models\MP\US\Reports\PartnerProgramStatementRes**](../../../Models/MP/US/Reports/PartnerProgramStatementRes.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


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
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
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

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


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
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::US,           // Default Country::US if not set
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

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
