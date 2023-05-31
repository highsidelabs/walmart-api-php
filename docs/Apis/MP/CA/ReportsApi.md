# Walmart\Apis\MP\CA\ReportsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getItemReport()**](#getItemReport) | **GET** /v3/getReport | Get item report |


## `getItemReport()`

```php
getItemReport($type, $version): mixed
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
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->reports();

$type = 'item_ca'; // string | report type
$version = 'version_example'; // string | Use this query parameter (version=3) to access the latest version of the Item report that includes Competitor price data, Product tax code, MSRP, Shipping weight, Lag time, Fulfilment type, etc.

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
| **type** | **string**| report type | [default to 'item_ca'] |
| **version** | **string**| Use this query parameter (version=3) to access the latest version of the Item report that includes Competitor price data, Product tax code, MSRP, Shipping weight, Lag time, Fulfilment type, etc. | [optional] |


### Return type

**mixed**

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
