# Walmart\Apis\WS\US\FeedsApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllFeedStatuses()**](#getAllFeedStatuses) | **GET** /v3/feeds | Feed status |
| [**getFeedItemStatus()**](#getFeedItemStatus) | **GET** /v3/feeds/{feedId} | Feed item status |


## `getAllFeedStatuses()`

```php
getAllFeedStatuses($feedId, $offset, $limit): \Walmart\Models\WS\US\Feeds\FeedRecordResponse
```
Feed status

Displays an item status for a specific Feed ID. Use the Feed ID returned from the DSV Bulk Upload API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::warehouseSupplier($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$offset = '0'; // string | The object response to the starting number, where 0 is the first entity that can be requested. Only use when includeDetails is set to true.
$limit = '20'; // string | The number of items to be returned. Maximum 20 items. Use this parameter only when includeDetails is set to true.

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
| **offset** | **string**| The object response to the starting number, where 0 is the first entity that can be requested. Only use when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of items to be returned. Maximum 20 items. Use this parameter only when includeDetails is set to true. | [optional] [default to '20'] |


### Return type

[**\Walmart\Models\WS\US\Feeds\FeedRecordResponse**](../../../Models/WS/US/feeds/FeedRecordResponse.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)

## `getFeedItemStatus()`

```php
getFeedItemStatus($feedId, $includeDetails, $offset, $limit): \Walmart\Models\WS\US\Feeds\PartnerFeedResponse
```
Feed item status

Returns the status of all items for a specific feedId.  We do not recommend using this call when includeDetails is set to true because discrepancies may occur between the header and the item details (i.e., the item details may be incorrect).

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', [
    'country' => 'US',  // Default US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::warehouseSupplier($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789)
$includeDetails = 'false'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$offset = '0'; // string | The object response to the starting number, where 0 is the first entity that can be requested. Only use when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. Maximum 50 entities. Use only if includeDetails is set to true.

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
| **includeDetails** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [optional] [default to 'false'] |
| **offset** | **string**| The object response to the starting number, where 0 is the first entity that can be requested. Only use when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. Maximum 50 entities. Use only if includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Models\WS\US\Feeds\PartnerFeedResponse**](../../../Models/WS/US/feeds/PartnerFeedResponse.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)
