# Walmart\Apis\DSV\US\CostApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**updateBulkCost()**](#updateBulkCost) | **POST** /v3/feeds | This API allows DSV to update cost for items in bulk. |


## `updateBulkCost()`

```php
updateBulkCost($feedType, $dsvCostUpdateRequest): \Walmart\Models\DSV\US\Cost\DsvCostUpdateResponse
```
This API allows DSV to update cost for items in bulk.

This API allows DSV to update cost for items in bulk.

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

$api = Walmart::dropShipVendor($config)->cost();

$feedType = 'cost'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$dsvCostUpdateRequest = new \Walmart\Models\DSV\US\Cost\DsvCostUpdateRequest(); // \Walmart\Models\DSV\US\Cost\DsvCostUpdateRequest | File fields

try {
    $result = $api->updateBulkCost($feedType, $dsvCostUpdateRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling CostApi->updateBulkCost: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [default to 'cost'] |
| **dsvCostUpdateRequest** | [**\Walmart\Models\DSV\US\Cost\DsvCostUpdateRequest**](../../../Models/DSV/US/Cost/DsvCostUpdateRequest.md)| File fields | |


### Return type

[**\Walmart\Models\DSV\US\Cost\DsvCostUpdateResponse**](../../../Models/DSV/US/Cost/DsvCostUpdateResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/DSV/US)
[[Back to README]](../../../../README.md)
