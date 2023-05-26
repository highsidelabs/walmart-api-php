# Walmart\Api\CA\MPPricesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**priceBulkUploads()**](PricesApi.md#priceBulkUploads) | **POST** /v3/ca/feeds | Update bulk prices |
| [**updatePriceCA()**](PricesApi.md#updatePriceCA) | **PUT** /v3/ca/price | Update a price |


## `priceBulkUploads()`

```php
priceBulkUploads($feedType, $file): \Walmart\Models\MP\CA\Prices\PriceBulkUploads200Response
```
Update bulk prices

Updates prices in bulk.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\PricesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $apiInstance->priceBulkUploads($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->priceBulkUploads: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\CA\Prices\PriceBulkUploads200Response**](../Model/PriceBulkUploads200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePriceCA()`

```php
updatePriceCA($body): \Walmart\Models\MP\CA\Prices\UpdatePriceCA200Response
```
Update a price

Updates the regular price for a given item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\PricesApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$body = <Price xmlns="http://walmart.com/">
    <itemIdentifier>
        <sku>sku-656666666</sku>
    </itemIdentifier>
    <pricingList>
        <pricing>
            <currentPrice>
                <value currency="USD" amount="4.00" />
            </currentPrice>
        </pricing>
    </pricingList>
</Price>; // string

try {
    $result = $apiInstance->updatePriceCA($body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updatePriceCA: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | **string**|  | |


### Return type

[**\Walmart\Models\MP\CA\Prices\UpdatePriceCA200Response**](../Model/UpdatePriceCA200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
