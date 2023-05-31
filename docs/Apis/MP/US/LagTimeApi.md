# Walmart\Apis\MP\US\LagTimeApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getLagTime()**](#getLagTime) | **GET** /v3/lagtime | Lag Time |
| [**updateLagTimeBulk()**](#updateLagTimeBulk) | **POST** /v3/feeds | Update lag time |


## `getLagTime()`

```php
getLagTime($sku): \Walmart\Models\MP\US\LagTime\GetLagTime200Response
```
Lag Time

This API allows the retrieval of Lag Time for an item with a given SKU.  Lag Time is the number of days between when an item is ordered and when it is shipped. Lag time of two days or more requires approval at the item setup category level. Please refer to the Request Lag Time Exceptions article for more details on this process.  Download the Lag Time Exception XSDs from the below directory:  xsd/LagTimeException.zip.  Download the Lag Time JSON schema from the below directory:  xsd/LagTimeException.zip.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->lagTime();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded.

try {
    $result = $api->getLagTime($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling LagTimeApi->getLagTime: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', ‘ ’, '{', '}' as well as '%' itself if it's a part of sku. Make sure to encode space with %20. Other characters don't need to be encoded. | |


### Return type

[**\Walmart\Models\MP\US\LagTime\GetLagTime200Response**](../Model/GetLagTime200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateLagTimeBulk()`

```php
updateLagTimeBulk($feedType, $updateLagTimeBulkRequest): \Walmart\Models\MP\US\LagTime\FeedId
```
Update lag time

This API allows the update of lag time for items in bulk.  Lag Time is the number of days between when an item is ordered and when it is shipped. Lag time of two days or more requires approval at the item setup category level. Please refer to the Request Lag Time Exceptions article for more details on this process.  Download the Lag Time Exception XSDs from the below directory:  xsd/LagTimeException.zip.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->lagTime();

$feedType = 'feedType_example'; // string | Use 'lagtime'
$updateLagTimeBulkRequest = {"LagTimeHeader":{"version":"1.0"},"lagTime":[{"sku":"30348_KFTest","fulfillmentLagTime":"1"}]}; // \Walmart\Models\MP\US\LagTime\UpdateLagTimeBulkRequest | File fields

try {
    $result = $api->updateLagTimeBulk($feedType, $updateLagTimeBulkRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling LagTimeApi->updateLagTimeBulk: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Use 'lagtime' | |
| **updateLagTimeBulkRequest** | [**\Walmart\Models\MP\US\LagTime\UpdateLagTimeBulkRequest**](../Model/UpdateLagTimeBulkRequest.md)| File fields | |


### Return type

[**\Walmart\Models\MP\US\LagTime\FeedId**](../Model/FeedId.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
