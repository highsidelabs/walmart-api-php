# Walmart\Apis\MP\MX\PricesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**updateBulkPrices()**](#updateBulkPrices) | **POST** /v3/feeds | Updates price in bulk |
| [**updatePrice()**](#updatePrice) | **PUT** /v3/price | Update a price |


## `updateBulkPrices()`

```php
updateBulkPrices($feedType, $file): \Walmart\Models\MP\MX\Prices\FeedId
```
Updates price in bulk

In one Feed you can update items in bulk when the feedtype is price. Helps Sellers to set up their SKU for an individual item’s competitive price adjustment with feedtype = CPT_SELLER_ELIGIBILITY

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->prices();

$feedType = 'price'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->updateBulkPrices($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updateBulkPrices: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | [default to 'price'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\MX\Prices\FeedId**](../../../Models/MP/MX/Prices/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)

## `updatePrice()`

```php
updatePrice($body): \Walmart\Models\MP\MX\Prices\PartnerPriceResponse
```
Update a price

Updates the regular price for a given item.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'MX',  // Default US if not set
]);

$api = Walmart::marketplace($config)->prices();

$body = <Price xmlns="http://walmart.com/">
   <itemIdentifier>
       <sku>04743020220299</sku>
   </itemIdentifier>
   <pricingList>
       <pricing>
            <currentPrice>
              <value currency="MXN" amount="223.00"/>
            </currentPrice>
           <currentPriceType>BASE</currentPriceType>
       </pricing>
   </pricingList>
</Price>; // string

try {
    $result = $api->updatePrice($body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updatePrice: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | **string**|  | |


### Return type

[**\Walmart\Models\MP\MX\Prices\PartnerPriceResponse**](../../../Models/MP/MX/Prices/PartnerPriceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `basicScheme`: Basic authentication with a Walmart Client ID and Client Secret
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/MX)
[[Back to README]](../../../../README.md)
