# Walmart\Apis\MP\US\InsightsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCategoriesList()**](#getCategoriesList) | **GET** /v3/insights/items/listingQuality/count | Item count with listing quality issues |
| [**getListingQualityScore()**](#getListingQualityScore) | **GET** /v3/insights/items/listingQuality/score | Seller Listing Quality Score |
| [**getProSellerBadgeInfo()**](#getProSellerBadgeInfo) | **GET** /v3/insights/prosellerbadge | Pro Seller Badge Status |
| [**getTrendingResult()**](#getTrendingResult) | **GET** /v3/insights/items/trending | Top Trending Items |
| [**getUnpublishedItemCount()**](#getUnpublishedItemCount) | **GET** /v3/insights/items/unpublished/counts | Unpublished Item Counts |
| [**getUnpublishedItems()**](#getUnpublishedItems) | **GET** /v3/insights/items/unpublished/items | Unpublished Items |
| [**itemsDetailsForListing()**](#itemsDetailsForListing) | **POST** /v3/insights/items/listingQuality/items | Item Listing Quality Details |


## `getCategoriesList()`

```php
getCategoriesList($viewTrendingItems, $wfsFlag, $hasIssue, $type, $limit, $offset): \Walmart\Models\MP\US\Insights\GetUnpublishedItemsCount
```
Item count with listing quality issues

Get a list of all item categories that have items with listing quality issues or brands for a seller.

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

$api = Walmart::marketplace($config)->insights();

$viewTrendingItems = true; // bool | Specify whether or not to include seller's items that are trending in the Listing Quality Score.
$wfsFlag = True; // bool | Specify whether or not to include WFS-eligible items in the overall Listing Quality Score.
$hasIssue = 0; // int | Specify whether or not to include items that have issues in the Listing Quality Score.
$type = 'type_example'; // string | Specify whether to get item count by brand or category. Category is the default value when no type is specified.
$limit = 56; // int | Specify number of items to return. The value is defaulted to 100 and the maximum value is 1000.
$offset = 0; // int | Specify the offset of item list to be returned.

try {
    $result = $api->getCategoriesList($viewTrendingItems, $wfsFlag, $hasIssue, $type, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->getCategoriesList: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **viewTrendingItems** | **bool**| Specify whether or not to include seller's items that are trending in the Listing Quality Score. | [optional] [default to true] |
| **wfsFlag** | **bool**| Specify whether or not to include WFS-eligible items in the overall Listing Quality Score. | [optional] |
| **hasIssue** | **int**| Specify whether or not to include items that have issues in the Listing Quality Score. | [optional] [default to 0] |
| **type** | **string**| Specify whether to get item count by brand or category. Category is the default value when no type is specified. | [optional] |
| **limit** | **int**| Specify number of items to return. The value is defaulted to 100 and the maximum value is 1000. | [optional] |
| **offset** | **int**| Specify the offset of item list to be returned. | [optional] [default to 0] |


### Return type

[**\Walmart\Models\MP\US\Insights\GetUnpublishedItemsCount**](../../../Models/MP/US/Insights/GetUnpublishedItemsCount.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getListingQualityScore()`

```php
getListingQualityScore($viewTrendingItems, $wfsFlag): \Walmart\Models\MP\US\Insights\GetUnpublishedItemsCount
```
Seller Listing Quality Score

Get the total Listing Quality Score for a seller's entire item catalog.

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

$api = Walmart::marketplace($config)->insights();

$viewTrendingItems = True; // bool | Specify whether or not to include seller's items that are trending in the Listing Quality Score.
$wfsFlag = 'wfsFlag_example'; // string | Specify whether or not to include WFS-eligible items in the overall Listing Quality Score.

try {
    $result = $api->getListingQualityScore($viewTrendingItems, $wfsFlag);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->getListingQualityScore: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **viewTrendingItems** | **bool**| Specify whether or not to include seller's items that are trending in the Listing Quality Score. | [optional] |
| **wfsFlag** | **string**| Specify whether or not to include WFS-eligible items in the overall Listing Quality Score. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Insights\GetUnpublishedItemsCount**](../../../Models/MP/US/Insights/GetUnpublishedItemsCount.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getProSellerBadgeInfo()`

```php
getProSellerBadgeInfo(): \Walmart\Models\MP\US\Insights\ProSellerResponse
```
Pro Seller Badge Status

The Pro Seller badge status will provide you with information regarding your current badge status as well as the progress you've made in meeting the criteria.

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

$api = Walmart::marketplace($config)->insights();


try {
    $result = $api->getProSellerBadgeInfo();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->getProSellerBadgeInfo: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Insights\ProSellerResponse**](../../../Models/MP/US/Insights/ProSellerResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getTrendingResult()`

```php
getTrendingResult($departmentId, $categoryId, $limit, $offset, $timeFrame): \Walmart\Models\MP\US\Insights\GetTrendingResult
```
Top Trending Items

Get Trending Item List

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

$api = Walmart::marketplace($config)->insights();

$departmentId = 'departmentId_example'; // string | departmentId
$categoryId = 'null'; // string | categoryId
$limit = '20'; // string | The number of items to be returned.
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested.
$timeFrame = 10; // string | Returns all trending items for the given time frame in days

try {
    $result = $api->getTrendingResult($departmentId, $categoryId, $limit, $offset, $timeFrame);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->getTrendingResult: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **departmentId** | **string**| departmentId | |
| **categoryId** | **string**| categoryId | [optional] [default to 'null'] |
| **limit** | **string**| The number of items to be returned. | [optional] [default to '20'] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. | [optional] [default to '0'] |
| **timeFrame** | **string**| Returns all trending items for the given time frame in days | [optional] [default to '7'] |


### Return type

[**\Walmart\Models\MP\US\Insights\GetTrendingResult**](../../../Models/MP/US/Insights/GetTrendingResult.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getUnpublishedItemCount()`

```php
getUnpublishedItemCount($fromDate): \Walmart\Models\MP\US\Insights\GetUnpublishedItemsCount
```
Unpublished Item Counts

Get Count for Unpubished Item

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

$api = Walmart::marketplace($config)->insights();

$fromDate = 2020-09-23; // string | Returns all unpublished items count with reason codes since the given date

try {
    $result = $api->getUnpublishedItemCount($fromDate);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->getUnpublishedItemCount: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fromDate** | **string**| Returns all unpublished items count with reason codes since the given date | |


### Return type

[**\Walmart\Models\MP\US\Insights\GetUnpublishedItemsCount**](../../../Models/MP/US/Insights/GetUnpublishedItemsCount.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getUnpublishedItems()`

```php
getUnpublishedItems($fromDate, $unpublishedReasonCode, $limit, $offerLifecycleStatus, $marketTrending, $itemsWithInventory): \Walmart\Models\MP\US\Insights\GetUnpublishedItem
```
Unpublished Items

Get Unpublished Items

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

$api = Walmart::marketplace($config)->insights();

$fromDate = 2020-09-23; // string | Returns all unpublished items since the given date
$unpublishedReasonCode = 'all'; // string | Unpublished reason code
$limit = '20'; // string | The number of items to be returned.
$offerLifecycleStatus = 'all'; // string | The lifecycle status of an item describes where the item listing is in the overall lifecycle. Examples of allowed values are ACTIVE , ARCHIVED, RETIRED.
$marketTrending = 'true'; // string | Filter the item list to return only items that are trending on Walmart.com
$itemsWithInventory = 'true'; // string | Filter the item list to return only items that have inventory

try {
    $result = $api->getUnpublishedItems($fromDate, $unpublishedReasonCode, $limit, $offerLifecycleStatus, $marketTrending, $itemsWithInventory);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->getUnpublishedItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fromDate** | **string**| Returns all unpublished items since the given date | |
| **unpublishedReasonCode** | **string**| Unpublished reason code | [optional] [default to 'all'] |
| **limit** | **string**| The number of items to be returned. | [optional] [default to '20'] |
| **offerLifecycleStatus** | **string**| The lifecycle status of an item describes where the item listing is in the overall lifecycle. Examples of allowed values are ACTIVE , ARCHIVED, RETIRED. | [optional] [default to 'all'] |
| **marketTrending** | **string**| Filter the item list to return only items that are trending on Walmart.com | [optional] [default to 'true'] |
| **itemsWithInventory** | **string**| Filter the item list to return only items that have inventory | [optional] [default to 'true'] |


### Return type

[**\Walmart\Models\MP\US\Insights\GetUnpublishedItem**](../../../Models/MP/US/Insights/GetUnpublishedItem.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `itemsDetailsForListing()`

```php
itemsDetailsForListing($itemDetailsLQRequestPayload, $limit, $nextCursor): \Walmart\Models\MP\US\Insights\ItemDetailsLQResponsePayload
```
Item Listing Quality Details

Get each item's listing quality details including: item quality score, offer score, content score and issues, and item performance.

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

$api = Walmart::marketplace($config)->insights();

$itemDetailsLQRequestPayload = {"query":{"field":"sku","value":"WB 433KP412-12"}}; // \Walmart\Models\MP\US\Insights\ItemDetailsLQRequestPayload | Request payload
$limit = '200'; // string | Specify number of items to return. If no limit is specified, API returns 200 items by default.
$nextCursor = 'nextCursor_example'; // string | Specify pagination for long list of items.

try {
    $result = $api->itemsDetailsForListing($itemDetailsLQRequestPayload, $limit, $nextCursor);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling InsightsApi->itemsDetailsForListing: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **itemDetailsLQRequestPayload** | [**\Walmart\Models\MP\US\Insights\ItemDetailsLQRequestPayload**](../../../Models/MP/US/Insights/ItemDetailsLQRequestPayload.md)| Request payload | |
| **limit** | **string**| Specify number of items to return. If no limit is specified, API returns 200 items by default. | [optional] [default to '200'] |
| **nextCursor** | **string**| Specify pagination for long list of items. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Insights\ItemDetailsLQResponsePayload**](../../../Models/MP/US/Insights/ItemDetailsLQResponsePayload.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
