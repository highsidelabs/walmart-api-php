# Walmart\Apis\MP\US\PricesApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createStrategy()**](#createStrategy) | **POST** /v3/repricer/strategy | Create Repricer Strategy |
| [**deleteStrategy()**](#deleteStrategy) | **DELETE** /v3/repricer/strategy/{strategyCollectionId} | Delete Repricer Strategy |
| [**getRepricerFeed()**](#getRepricerFeed) | **POST** /v3/repricerFeeds | Assign/Unassign items to/from Repricer Strategy |
| [**getRepricerIncentive()**](#getRepricerIncentive) | **GET** /v3/repricer/incentive | List of Incentive Items |
| [**getStrategies()**](#getStrategies) | **GET** /v3/repricer/strategies | List of Repricer Strategies |
| [**optCapProgramInPrice()**](#optCapProgramInPrice) | **POST** /v3/cppreference | Set up CAP SKU All |
| [**priceBulkUploads()**](#priceBulkUploads) | **POST** /v3/feeds | Update bulk prices (Multiple) |
| [**updatePrice()**](#updatePrice) | **PUT** /v3/price | Update a price |
| [**updateRepricerIncentive()**](#updateRepricerIncentive) | **PUT** /v3/repricer/incentive | Assign Incentive items to Repricer |
| [**updateStrategy()**](#updateStrategy) | **PUT** /v3/repricer/strategy/{strategyCollectionId} | Update Repricer Strategy |


## `createStrategy()`

```php
createStrategy($repricerEntityRequest): \Walmart\Models\MP\US\Prices\RepricerEntityResponse
```
Create Repricer Strategy

Creates a new strategy for the seller

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$repricerEntityRequest = new \Walmart\Models\MP\US\Prices\RepricerEntityRequest(); // \Walmart\Models\MP\US\Prices\RepricerEntityRequest | The request body will have the strategy related information

try {
    $result = $api->createStrategy($repricerEntityRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->createStrategy: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **repricerEntityRequest** | [**\Walmart\Models\MP\US\Prices\RepricerEntityRequest**](../../../Models/MP/US/Prices/RepricerEntityRequest.md)| The request body will have the strategy related information | |


### Return type

[**\Walmart\Models\MP\US\Prices\RepricerEntityResponse**](../../../Models/MP/US/Prices/RepricerEntityResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `deleteStrategy()`

```php
deleteStrategy($strategyCollectionId): \Walmart\Models\MP\US\Prices\RepricerEntityDeleteResponse
```
Delete Repricer Strategy

Deletes the strategy

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$strategyCollectionId = 'strategyCollectionId_example'; // string

try {
    $result = $api->deleteStrategy($strategyCollectionId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->deleteStrategy: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **strategyCollectionId** | **string**|  | |


### Return type

[**\Walmart\Models\MP\US\Prices\RepricerEntityDeleteResponse**](../../../Models/MP/US/Prices/RepricerEntityDeleteResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getRepricerFeed()`

```php
getRepricerFeed($feedUploadRequestDTO): \Walmart\Models\MP\US\Prices\FeedUploadResponseDTO
```
Assign/Unassign items to/from Repricer Strategy

Add/Remove one or more items from a strategy

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$feedUploadRequestDTO = new \Walmart\Models\MP\US\Prices\FeedUploadRequestDTO(); // \Walmart\Models\MP\US\Prices\FeedUploadRequestDTO

try {
    $result = $api->getRepricerFeed($feedUploadRequestDTO);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->getRepricerFeed: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedUploadRequestDTO** | [**\Walmart\Models\MP\US\Prices\FeedUploadRequestDTO**](../../../Models/MP/US/Prices/FeedUploadRequestDTO.md)|  | |


### Return type

[**\Walmart\Models\MP\US\Prices\FeedUploadResponseDTO**](../../../Models/MP/US/Prices/FeedUploadResponseDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getRepricerIncentive()`

```php
getRepricerIncentive($limit, $offset, $sortBy, $sortOrder): \Walmart\Models\MP\US\Prices\RepricerIncentiveCollectionResponse
```
List of Incentive Items

Get the list of incentive items

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$limit = 25; // int | Specify number of items to return.
$offset = 0; // int | Specify the offset of item list to be returned.
$sortBy = 'INCENTIVE_LIMIT'; // string | Specify the sort criteria for items. Examples of the allowed values are INCENTIVE_END_DATE or INCENTIVE_LIMIT
$sortOrder = 'DESC'; // string | Specify the sort order for given sort criteria. Examples of the allowed values are ASC or DESC

try {
    $result = $api->getRepricerIncentive($limit, $offset, $sortBy, $sortOrder);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->getRepricerIncentive: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Specify number of items to return. | [optional] [default to 25] |
| **offset** | **int**| Specify the offset of item list to be returned. | [optional] [default to 0] |
| **sortBy** | **string**| Specify the sort criteria for items. Examples of the allowed values are INCENTIVE_END_DATE or INCENTIVE_LIMIT | [optional] [default to 'INCENTIVE_LIMIT'] |
| **sortOrder** | **string**| Specify the sort order for given sort criteria. Examples of the allowed values are ASC or DESC | [optional] [default to 'DESC'] |


### Return type

[**\Walmart\Models\MP\US\Prices\RepricerIncentiveCollectionResponse**](../../../Models/MP/US/Prices/RepricerIncentiveCollectionResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getStrategies()`

```php
getStrategies(): \Walmart\Models\MP\US\Prices\RepricerEntityCollectionResponse
```
List of Repricer Strategies

Get the list of strategies

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();


try {
    $result = $api->getStrategies();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->getStrategies: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Prices\RepricerEntityCollectionResponse**](../../../Models/MP/US/Prices/RepricerEntityCollectionResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `optCapProgramInPrice()`

```php
optCapProgramInPrice($statusInfo): \Walmart\Models\MP\US\Prices\CapProgramResponse
```
Set up CAP SKU All

This API helps Sellers to completely opt-in or opt-out from CAP program.  If the subsidyEnrolled value = \"true\", the Seller enrolls in the CAP program. All eligible SKUs (current and future) are by default opt-in. Seller should use the SKU opt-in/opt-out API to opt-out individual items.  If the subsidyEnrolled value = \"false\", the Seller stops participating in the CAP program and all eligible SKUs (current and future) are opt-out of the CAP program.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$statusInfo = new \Walmart\Models\MP\US\Prices\StatusInfo(); // \Walmart\Models\MP\US\Prices\StatusInfo | Request fields

try {
    $result = $api->optCapProgramInPrice($statusInfo);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->optCapProgramInPrice: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **statusInfo** | [**\Walmart\Models\MP\US\Prices\StatusInfo**](../../../Models/MP/US/Prices/StatusInfo.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Prices\CapProgramResponse**](../../../Models/MP/US/Prices/CapProgramResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `priceBulkUploads()`

```php
priceBulkUploads($feedType, $file): \Walmart\Models\MP\US\Prices\FeedId
```
Update bulk prices (Multiple)

Updates prices in bulk.  In one Feed you can update up to 10,000 items in bulk. To ensure optimal Feed processing time, we recommend sending no more than 1000 items in one Feed and keeping the Feed sizes below 10 MB.  The price sequence guarantee is observed by the bulk price update functionality, subject to the following rules:  The timestamp used to determine precedence is passed in the request headers. All price updates in the feed are considered to have the same timestamp. The timestamp in the XML file is used only for auditing. You can send a single SKU multiple times in one Feed. If a SKU is repeated in a Feed, the price will be set for that SKU on Walmart.com, but there is no guarantee as to which SKU's price within that feed will be used. This API should be used in preference to the update a price. It should be called no sooner than 24 hours after a new item is set up and a wpid (Walmart Part ID) is available. Thereafter, the bulk price update has an service level agreement (SLA) of 15 minutes.  After the update is submitted, wait for at least five minutes before verifying whether the bulk price update was successful. Individual SKU price update success or failure is only available after the entire feed is processed.  If a SKU's price update fails (for example, multiple price updates were sent for the same SKU in a single feed), an error will be returned.

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
    'country' => Country::US,           // Default Country::US if not set
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

[**\Walmart\Models\MP\US\Prices\FeedId**](../../../Models/MP/US/Prices/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updatePrice()`

```php
updatePrice($price): \Walmart\Models\MP\US\Prices\ItemPriceResponse
```
Update a price

Updates the regular price for a given item.

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$price = {"sku":"97964_KFTest","pricing":[{"currentPriceType":"BASE","currentPrice":{"currency":"USD","amount":10}}]}; // \Walmart\Models\MP\US\Prices\Price | The request body consists of a Feed file attached to the request.

try {
    $result = $api->updatePrice($price);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updatePrice: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **price** | [**\Walmart\Models\MP\US\Prices\Price**](../../../Models/MP/US/Prices/Price.md)| The request body consists of a Feed file attached to the request. | |


### Return type

[**\Walmart\Models\MP\US\Prices\ItemPriceResponse**](../../../Models/MP/US/Prices/ItemPriceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateRepricerIncentive()`

```php
updateRepricerIncentive($updateRepricerIncentiveRequest): \Walmart\Models\MP\US\Prices\UpdateRepricerIncentiveResponse
```
Assign Incentive items to Repricer

Assigns incentive items to the default price incentives strategy, ‘Match Competitive Price’

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$updateRepricerIncentiveRequest = new \Walmart\Models\MP\US\Prices\UpdateRepricerIncentiveRequest(); // \Walmart\Models\MP\US\Prices\UpdateRepricerIncentiveRequest

try {
    $result = $api->updateRepricerIncentive($updateRepricerIncentiveRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updateRepricerIncentive: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateRepricerIncentiveRequest** | [**\Walmart\Models\MP\US\Prices\UpdateRepricerIncentiveRequest**](../../../Models/MP/US/Prices/UpdateRepricerIncentiveRequest.md)|  | |


### Return type

[**\Walmart\Models\MP\US\Prices\UpdateRepricerIncentiveResponse**](../../../Models/MP/US/Prices/UpdateRepricerIncentiveResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateStrategy()`

```php
updateStrategy($strategyCollectionId, $repricerEntityRequest): \Walmart\Models\MP\US\Prices\RepricerEntityResponse
```
Update Repricer Strategy

Updates the existing strategy

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
    'country' => Country::US,           // Default Country::US if not set
]);

$api = Walmart::marketplace($config)->prices();

$strategyCollectionId = 'strategyCollectionId_example'; // string
$repricerEntityRequest = new \Walmart\Models\MP\US\Prices\RepricerEntityRequest(); // \Walmart\Models\MP\US\Prices\RepricerEntityRequest | The request body will have the strategy related information

try {
    $result = $api->updateStrategy($strategyCollectionId, $repricerEntityRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling PricesApi->updateStrategy: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **strategyCollectionId** | **string**|  | |
| **repricerEntityRequest** | [**\Walmart\Models\MP\US\Prices\RepricerEntityRequest**](../../../Models/MP/US/Prices/RepricerEntityRequest.md)| The request body will have the strategy related information | |


### Return type

[**\Walmart\Models\MP\US\Prices\RepricerEntityResponse**](../../../Models/MP/US/Prices/RepricerEntityResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessToken`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
