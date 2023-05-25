# Walmart\Api\US\DSVCostApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**updateBulkCost()**](CostApi.md#updateBulkCost) | **POST** /v3/feeds | This API allows DSV to update cost for items in bulk. |


## `updateBulkCost()`

```php
updateBulkCost($feedType, $updateBulkCostRequest): \Walmart\Model\DSV\US\Cost\UpdateBulkCost200Response
```
This API allows DSV to update cost for items in bulk.

This API allows DSV to update cost for items in bulk.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\CostApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'cost'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$updateBulkCostRequest = new \Walmart\Model\DSV\US\Cost\UpdateBulkCostRequest(); // \Walmart\Model\DSV\US\Cost\UpdateBulkCostRequest | File fields

try {
    $result = $apiInstance->updateBulkCost($feedType, $updateBulkCostRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling CostApi->updateBulkCost: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [default to 'cost'] |
| **updateBulkCostRequest** | [**\Walmart\Model\DSV\US\Cost\UpdateBulkCostRequest**](../Model/UpdateBulkCostRequest.md)| File fields | |


### Return type

[**\Walmart\Model\DSV\US\Cost\UpdateBulkCost200Response**](../Model/UpdateBulkCost200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
