# Walmart\Apis\MP\US\LagTimeApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getLagTime()**](#getLagTime) | **GET** /v3/lagtime | Lag Time |
| [**updateLagTimeBulk()**](#updateLagTimeBulk) | **POST** /v3/feeds | Update lag time |


## `getLagTime()`

```php
getLagTime($sku): \Walmart\Models\MP\US\LagTime\LagTimeResponse
```
Lag Time

This API allows the retrieval of Lag Time for an item with a given SKU.  Lag Time is the number of days between when an item is ordered and when it is shipped. Lag time of two days or more requires approval at the item setup category level. Please refer to the Request Lag Time Exceptions article for more details on this process.  Download the Lag Time Exception XSDs from the below directory:  xsd/LagTimeException.zip.  Download the Lag Time JSON schema from the below directory:  xsd/LagTimeException.zip.

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

[**\Walmart\Models\MP\US\LagTime\LagTimeResponse**](../../../Models/MP/US/LagTime/LagTimeResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateLagTimeBulk()`

```php
updateLagTimeBulk($feedType, $lagTimeFeed): \Walmart\Models\MP\US\LagTime\FeedId
```
Update lag time

This API allows the update of lag time for items in bulk.  Lag Time is the number of days between when an item is ordered and when it is shipped. Lag time of two days or more requires approval at the item setup category level. Please refer to the Request Lag Time Exceptions article for more details on this process.  Download the Lag Time Exception XSDs from the below directory:  xsd/LagTimeException.zip.

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

$api = Walmart::marketplace($config)->lagTime();

$feedType = 'feedType_example'; // string | Use 'lagtime'
$lagTimeFeed = {"LagTimeHeader":{"version":"1.0"},"lagTime":[{"sku":"30348_KFTest","fulfillmentLagTime":"1"}]}; // \Walmart\Models\MP\US\LagTime\LagTimeFeed | File fields

try {
    $result = $api->updateLagTimeBulk($feedType, $lagTimeFeed);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling LagTimeApi->updateLagTimeBulk: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Use 'lagtime' | |
| **lagTimeFeed** | [**\Walmart\Models\MP\US\LagTime\LagTimeFeed**](../../../Models/MP/US/LagTime/LagTimeFeed.md)| File fields | |


### Return type

[**\Walmart\Models\MP\US\LagTime\FeedId**](../../../Models/MP/US/LagTime/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
