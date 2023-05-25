# Walmart\Apis\US\MPReportsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAvailableReconReportDates()**](ReportsApi.md#getAvailableReconReportDates) | **GET** /v3/report/reconreport/availableReconFiles | Available recon report dates(Legacy) |
| [**getAvailableV1ReconReportDates()**](ReportsApi.md#getAvailableV1ReconReportDates) | **GET** /v3/report/reconreport/availableReconFiles?reportVersion&#x3D;v1 | Available recon report dates |
| [**getPartnerPerformance()**](ReportsApi.md#getPartnerPerformance) | **GET** /v3/report/payment/performance | Performance Report |
| [**getPartnerStatement()**](ReportsApi.md#getPartnerStatement) | **GET** /v3/report/payment/statement | Payment Statement Report |
| [**getReconReport()**](ReportsApi.md#getReconReport) | **GET** /v3/report/reconreport/reconFile | Recon report(Legacy) |
| [**getReconReportV1()**](ReportsApi.md#getReconReportV1) | **GET** /v3/report/reconreport/reconFile?reportVersion&#x3D;v1 | Recon report |


## `getAvailableReconReportDates()`

```php
getAvailableReconReportDates(): \Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response
```
Available recon report dates(Legacy)

This API will list all the available Marketplace reconciliation report dates for the Seller.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAvailableReconReportDates();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getAvailableReconReportDates: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response**](../Model/GetAvailableReconReportDates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAvailableV1ReconReportDates()`

```php
getAvailableV1ReconReportDates(): \Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response
```
Available recon report dates

This API will list all the available Marketplace reconciliation report dates for the Seller.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getAvailableV1ReconReportDates();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getAvailableV1ReconReportDates: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetAvailableReconReportDates200Response**](../Model/GetAvailableReconReportDates200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPartnerPerformance()`

```php
getPartnerPerformance(): \Walmart\Models\MP\US\Reports\GetPartnerPerformance200Response
```
Performance Report

This API will get a partner's current cycle performance

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getPartnerPerformance();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getPartnerPerformance: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetPartnerPerformance200Response**](../Model/GetPartnerPerformance200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPartnerStatement()`

```php
getPartnerStatement(): \Walmart\Models\MP\US\Reports\GetPartnerStatement200Response
```
Payment Statement Report

This API will get a partner's current cycle statement

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getPartnerStatement();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getPartnerStatement: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Reports\GetPartnerStatement200Response**](../Model/GetPartnerStatement200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReconReport()`

```php
getReconReport($reportDate): string
```
Recon report(Legacy)

Seller can download the reconciliation report for a specific date using this API. Dates available to be downloaded can be found by using the Get available reconciliation report dates API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$reportDate = 'reportDate_example'; // string | The date for which the reconcilation file is available

try {
    $result = $apiInstance->getReconReport($reportDate);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getReconReport: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **reportDate** | **string**| The date for which the reconcilation file is available | |


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getReconReportV1()`

```php
getReconReportV1($reportDate, $reportVersion): string
```
Recon report

Seller can download the reconciliation report for a specific date using this API. Dates available to be downloaded can be found by using the Get available reconciliation report dates API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\ReportsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$reportDate = 'reportDate_example'; // string | The date for which the reconcilation file is available
$reportVersion = 'reportVersion_example'; // string | Report Version

try {
    $result = $apiInstance->getReconReportV1($reportDate, $reportVersion);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ReportsApi->getReconReportV1: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
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

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
