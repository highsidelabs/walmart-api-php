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
| **dsvCostUpdateRequest** | [**\Walmart\Models\DSV\US\Cost\DsvCostUpdateRequest**](../../../Models/DSV/US/cost/DsvCostUpdateRequest.md)| File fields | |


### Return type

[**\Walmart\Models\DSV\US\Cost\DsvCostUpdateResponse**](../../../Models/DSV/US/cost/DsvCostUpdateResponse.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/DSV/US)
[[Back to README]](../../../../README.md)
