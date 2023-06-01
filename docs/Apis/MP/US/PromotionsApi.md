# Walmart\Apis\MP\US\PromotionsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPromotionalPrices()**](#getPromotionalPrices) | **GET** /v3/promo/sku/{sku} | Promotional prices |
| [**updateBulkPromotionalPrice()**](#updateBulkPromotionalPrice) | **POST** /v3/feeds | Updates bulk promotional prices |
| [**updatePromotionalPrices()**](#updatePromotionalPrices) | **PUT** /v3/price | Update a promotional price |


## `getPromotionalPrices()`

```php
getPromotionalPrices($sku): \Walmart\Models\MP\US\Promotions\PromotionalPriceResponse
```
Promotional prices

Retrieves a list of promotional prices for a single SKU.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->promotions();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $api->getPromotionalPrices($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->getPromotionalPrices: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | |


### Return type

[**\Walmart\Models\MP\US\Promotions\PromotionalPriceResponse**](../../../Models/MP/US/Promotions/PromotionalPriceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateBulkPromotionalPrice()`

```php
updateBulkPromotionalPrice($feedType, $file): \Walmart\Models\MP\US\Promotions\FeedId
```
Updates bulk promotional prices

Updates or creates promotional prices for multiple specified SKUs

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->promotions();

$feedType = 'promo'; // string | Feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->updateBulkPromotionalPrice($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->updateBulkPromotionalPrice: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Feed Type | [default to 'promo'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\US\Promotions\FeedId**](../../../Models/MP/US/Promotions/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updatePromotionalPrices()`

```php
updatePromotionalPrices($promo, $price): \Walmart\Models\MP\US\Promotions\ItemPriceResponse
```
Update a promotional price

Updates the promotional price.  Sellers can update or delete an existing promotional price as well as set up a new promotional price.  To set a new promotional price or update an existing one, set the XML pricing attribute processMode to UPSERT. To delete a promotional price, set the XML pricing attribute processMode to DELETE. To delete all promotions for a SKU, set replaceAll to an empty payload.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->promotions();

$promo = true; // bool | The promotional price. Set to 'true' in order to retrieve promotional prices
$price = {"sku":"97964_KFTest","pricing":[{"currentPrice":{"currency":"USD","amount":4},"currentPriceType":"REDUCED","comparisonPriceType":"BASE","comparisonPrice":{"currency":"USD","amount":4},"priceDisplayCodes":"CART","effectiveDate":"2019-11-03T09:49:57.943Z","expirationDate":"2019-12-03T09:49:57.943Z","processMode":"UPSERT"}]}; // \Walmart\Models\MP\US\Promotions\Price | The request body consists of a Feed file attached to the request.

try {
    $result = $api->updatePromotionalPrices($promo, $price);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->updatePromotionalPrices: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **promo** | **bool**| The promotional price. Set to 'true' in order to retrieve promotional prices | [default to true] |
| **price** | [**\Walmart\Models\MP\US\Promotions\Price**](../../../Models/MP/US/Promotions/Price.md)| The request body consists of a Feed file attached to the request. | |


### Return type

[**\Walmart\Models\MP\US\Promotions\ItemPriceResponse**](../../../Models/MP/US/Promotions/ItemPriceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
