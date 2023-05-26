# Walmart\Api\MX\MPPricesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**updateBulkPrices()**](PricesApi.md#updateBulkPrices) | **POST** /v3/feeds | Updates price in bulk |
| [**updatePrice()**](PricesApi.md#updatePrice) | **PUT** /v3/price | Update a price |


## `updateBulkPrices()`

```php
updateBulkPrices($feedType, $file): \Walmart\Models\MP\MX\Prices\UpdateBulkPrices200Response
```
Updates price in bulk

In one Feed you can update items in bulk when the feedtype is price. Helps Sellers to set up their SKU for an individual item’s competitive price adjustment with feedtype = CPT_SELLER_ELIGIBILITY

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\PricesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'price'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $apiInstance->updateBulkPrices($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updateBulkPrices: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | [default to 'price'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\MX\Prices\UpdateBulkPrices200Response**](../Model/UpdateBulkPrices200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePrice()`

```php
updatePrice($body): \Walmart\Models\MP\MX\Prices\UpdatePrice200Response
```
Update a price

Updates the regular price for a given item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\PricesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

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
    $result = $apiInstance->updatePrice($body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updatePrice: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | **string**|  | |


### Return type

[**\Walmart\Models\MP\MX\Prices\UpdatePrice200Response**](../Model/UpdatePrice200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
