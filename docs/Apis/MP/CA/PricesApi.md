# Walmart\Apis\MP\CA\PricesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**priceBulkUploads()**](#priceBulkUploads) | **POST** /v3/ca/feeds | Update bulk prices |
| [**updatePriceCA()**](#updatePriceCA) | **PUT** /v3/ca/price | Update a price |


## `priceBulkUploads()`

```php
priceBulkUploads($feedType, $file): \Walmart\Models\MP\CA\Prices\PriceBulkUploads200Response
```
Update bulk prices

Updates prices in bulk.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->prices();

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->priceBulkUploads($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->priceBulkUploads: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\CA\Prices\PriceBulkUploads200Response**](../../../Models/MP/CA/prices/PriceBulkUploads200Response.md)

### Authorization



This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `updatePriceCA()`

```php
updatePriceCA($body): \Walmart\Models\MP\CA\Prices\MPItemPriceResponseV2
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
    'country' => 'CA',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->prices();

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
    $result = $api->updatePriceCA($body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updatePriceCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | **string**|  | |


### Return type

[**\Walmart\Models\MP\CA\Prices\MPItemPriceResponseV2**](../../../Models/MP/CA/prices/MPItemPriceResponseV2.md)

### Authorization



This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
