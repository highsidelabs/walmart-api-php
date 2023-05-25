# Walmart\Apis\US\MPPromotionsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPromotionalPrices()**](PromotionsApi.md#getPromotionalPrices) | **GET** /v3/promo/sku/{sku} | Promotional prices |
| [**updateBulkPromotionalPrice()**](PromotionsApi.md#updateBulkPromotionalPrice) | **POST** /v3/feeds | Updates bulk promotional prices |
| [**updatePromotionalPrices()**](PromotionsApi.md#updatePromotionalPrices) | **PUT** /v3/price | Update a promotional price |


## `getPromotionalPrices()`

```php
getPromotionalPrices($sku): \Walmart\Models\MP\US\Promotions\GetPromotionalPrices200Response
```
Promotional prices

Retrieves a list of promotional prices for a single SKU.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\PromotionsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $apiInstance->getPromotionalPrices($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->getPromotionalPrices: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | |


### Return type

[**\Walmart\Models\MP\US\Promotions\GetPromotionalPrices200Response**](../Model/GetPromotionalPrices200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateBulkPromotionalPrice()`

```php
updateBulkPromotionalPrice($feedType, $file): \Walmart\Models\MP\US\Promotions\UpdateBulkPromotionalPrice200Response
```
Updates bulk promotional prices

Updates or creates promotional prices for multiple specified SKUs

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\PromotionsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'promo'; // string | Feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $apiInstance->updateBulkPromotionalPrice($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->updateBulkPromotionalPrice: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Feed Type | [default to 'promo'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\US\Promotions\UpdateBulkPromotionalPrice200Response**](../Model/UpdateBulkPromotionalPrice200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePromotionalPrices()`

```php
updatePromotionalPrices($promo, $updatePromotionalPricesRequest): \Walmart\Models\MP\US\Promotions\UpdatePromotionalPrices200Response
```
Update a promotional price

Updates the promotional price.  Sellers can update or delete an existing promotional price as well as set up a new promotional price.  To set a new promotional price or update an existing one, set the XML pricing attribute processMode to UPSERT. To delete a promotional price, set the XML pricing attribute processMode to DELETE. To delete all promotions for a SKU, set replaceAll to an empty payload.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Apis\PromotionsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$promo = true; // bool | The promotional price. Set to 'true' in order to retrieve promotional prices
$updatePromotionalPricesRequest = {"sku":"97964_KFTest","pricing":[{"currentPrice":{"currency":"USD","amount":4},"currentPriceType":"REDUCED","comparisonPriceType":"BASE","comparisonPrice":{"currency":"USD","amount":4},"priceDisplayCodes":"CART","effectiveDate":"2019-11-03T09:49:57.943Z","expirationDate":"2019-12-03T09:49:57.943Z","processMode":"UPSERT"}]}; // \Walmart\Models\MP\US\Promotions\UpdatePromotionalPricesRequest | The request body consists of a Feed file attached to the request.

try {
    $result = $apiInstance->updatePromotionalPrices($promo, $updatePromotionalPricesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->updatePromotionalPrices: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **promo** | **bool**| The promotional price. Set to 'true' in order to retrieve promotional prices | [default to true] |
| **updatePromotionalPricesRequest** | [**\Walmart\Models\MP\US\Promotions\UpdatePromotionalPricesRequest**](../Model/UpdatePromotionalPricesRequest.md)| The request body consists of a Feed file attached to the request. | |


### Return type

[**\Walmart\Models\MP\US\Promotions\UpdatePromotionalPrices200Response**](../Model/UpdatePromotionalPrices200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
