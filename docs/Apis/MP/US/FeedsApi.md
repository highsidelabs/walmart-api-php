# Walmart\Apis\MP\US\FeedsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllFeedStatuses()**](#getAllFeedStatuses) | **GET** /v3/feeds | All feed statuses |
| [**getFeedErrorReport()**](#getFeedErrorReport) | **GET** /v3/feeds/{feedId}/errorReport | Get Feed Error Report |
| [**getFeedItemStatus()**](#getFeedItemStatus) | **GET** /v3/feeds/{feedId} | Feed item status |


## `getAllFeedStatuses()`

```php
getAllFeedStatuses($feedId, $offset, $limit): \Walmart\Models\MP\US\Feeds\GetAllFeedStatuses200Response
```
All feed statuses

Returns the feed statuses for all the specified Feed IDs.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $api->getAllFeedStatuses($feedId, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getAllFeedStatuses: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789). | [optional] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Models\MP\US\Feeds\GetAllFeedStatuses200Response**](../../../Models/MP/US/feeds/GetAllFeedStatuses200Response.md)

### Authorization

[accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getFeedErrorReport()`

```php
getFeedErrorReport($feedId, $feedType): mixed
```
Get Feed Error Report

Get Feed Error Report API allows you to download a detailed error report for a submitted feed.   Currently the API supports error report download for the following feeds:  *   FITMENT_ACES  *   FITMENT_PIES    This API returns a zipped .csv file, which contains line item level detailed error messages. For details and a sample, please refer to the guide section link below.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->feeds();

$feedId = 'feedId_example'; // string | Feed Id of the feed
$feedType = 'feedType_example'; // string | Feed type for which Error Report needs to be downloaded

try {
    $result = $api->getFeedErrorReport($feedId, $feedType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getFeedErrorReport: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedId** | **string**| Feed Id of the feed | |
| **feedType** | **string**| Feed type for which Error Report needs to be downloaded | |


### Return type

**mixed**

### Authorization

[accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getFeedItemStatus()`

```php
getFeedItemStatus($feedId, $includeDetails, $offset, $limit): \Walmart\Models\MP\US\Feeds\GetFeedItemStatus200Response
```
Feed item status

Returns the feed and item status for a specified Feed ID.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
]);

$api = Walmart::marketplace($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789)
$includeDetails = 'false'; // string | Includes details of each entity in the feed.
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $api->getFeedItemStatus($feedId, $includeDetails, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getFeedItemStatus: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789) | |
| **includeDetails** | **string**| Includes details of each entity in the feed. | [optional] [default to 'false'] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Models\MP\US\Feeds\GetFeedItemStatus200Response**](../../../Models/MP/US/feeds/GetFeedItemStatus200Response.md)

### Authorization

[accessTokenScheme](../../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
