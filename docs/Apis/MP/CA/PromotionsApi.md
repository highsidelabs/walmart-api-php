# Walmart\Apis\MP\CA\PromotionsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPromotionalPrices()**](#getPromotionalPrices) | **GET** /v3/ca/promo/sku/{sku} | Get list of promotional prices for a SKU |
| [**updateBulkPromotionalPrice()**](#updateBulkPromotionalPrice) | **POST** /v3/ca/feeds | Updates promotional prices in bulk |
| [**updatePromotionalPricesCA()**](#updatePromotionalPricesCA) | **PUT** /v3/ca/price | Updates the promotional price |


## `getPromotionalPrices()`

```php
getPromotionalPrices($sku): string
```
Get list of promotional prices for a SKU

Retrieves a list of promotional prices for a single SKU.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->promotions();

$sku = 'sku_example'; // string | sku

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
| **sku** | **string**| sku | |


### Return type

**string**

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `updateBulkPromotionalPrice()`

```php
updateBulkPromotionalPrice($feedType, $file): \Walmart\Models\MP\CA\Promotions\FeedId
```
Updates promotional prices in bulk

Updates or creates promotional prices for multiple specified SKUs

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
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

[**\Walmart\Models\MP\CA\Promotions\FeedId**](../../../Models/MP/CA/Promotions/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `updatePromotionalPricesCA()`

```php
updatePromotionalPricesCA($promo, $body): string
```
Updates the promotional price

Sellers can update or delete an existing promotion price as well as set up a new promotional price.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Enums\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->promotions();

$promo = true; // bool | The promotional price. Set to 'true' in order to retrieve promotional prices
$body = <?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Price xmlns="http://walmart.com/">
    <itemIdentifier>
        <sku>promoSync3</sku>
    </itemIdentifier>
    <pricingList>
        <pricing effectiveDate="2016-09-09T21:29:39.420Z" expirationDate="2016-09-10T21:29:39.420Z" processMode="UPSERT">
            <currentPrice>
                <value amount="35.00"/>
            </currentPrice>
            <currentPriceType>REDUCED</currentPriceType>
            <comparisonPrice>
                <value amount="97.00"/>
            </comparisonPrice>
        </pricing>
        <pricing effectiveDate="2016-09-11T21:29:39.420Z" expirationDate="2016-09-12T21:29:39.420Z" processMode="UPSERT">
            <currentPrice>
                <value amount="44.00"/>
            </currentPrice>
        </pricing>
    </pricingList>
</Price>; // string

try {
    $result = $api->updatePromotionalPricesCA($promo, $body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PromotionsApi->updatePromotionalPricesCA: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **promo** | **bool**| The promotional price. Set to 'true' in order to retrieve promotional prices | [default to true] |
| **body** | **string**|  | |


### Return type

**string**

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
