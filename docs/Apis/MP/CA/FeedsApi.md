# Walmart\Apis\MP\CA\FeedsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**bulkContentSetup()**](#bulkContentSetup) | **POST** /v3/ca/feeds | Content feeds |
| [**getAllFeedStatuses()**](#getAllFeedStatuses) | **GET** /v3/ca/feeds | All feed statuses |
| [**getFeedItemStatus()**](#getFeedItemStatus) | **GET** /v3/ca/feeds/{feedId} | Get feed and item status |


## `bulkContentSetup()`

```php
bulkContentSetup($feedType, $file): \Walmart\Models\MP\CA\Feeds\FeedId
```
Content feeds

Once the XML request is built using the Content Feeds XSDs, you can pass the payload using the Content Feed API.You must use the relevant category XSD to build the XML payload..

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->feeds();

$feedType = 'CONTENT_PRODUCT'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->bulkContentSetup($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->bulkContentSetup: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | [default to 'CONTENT_PRODUCT'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\CA\Feeds\FeedId**](../../../Models/MP/CA/Feeds/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAllFeedStatuses()`

```php
getAllFeedStatuses($feedId, $offset, $limit): \Walmart\Models\MP\CA\Feeds\FeedRecordResponseJson
```
All feed statuses

Returns the feed statuses for all the specified Feed IDs.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
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

[**\Walmart\Models\MP\CA\Feeds\FeedRecordResponseJson**](../../../Models/MP/CA/Feeds/FeedRecordResponseJson.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getFeedItemStatus()`

```php
getFeedItemStatus($feedId, $includeDetails, $offset, $limit): \Walmart\Models\MP\CA\Feeds\PartnerFeedResponse
```
Get feed and item status

You can display the status of an item within a feed. Use the feed ID returned from the upload an item API.

### Example

```php
<?php
use Walmart\Configuration;
use Walmart\Country;
use Walmart\Walmart;

require_once __DIR__ . '/vendor/autoload.php';

$config = new Walmart\Configuration([
    'clientId' => 'CLIENT_ID',          // May not be necessary for all endpoints, particularly outside the US
    'clientSecret' => 'CLIENT_SECRET',  // Ditto above
    'country' => Country::CA,           // Default Country::US if not set
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::marketplace($config)->feeds();

$feedId = 'feedId_example'; // string | The feed ID.
$includeDetails = 'false'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
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
| **feedId** | **string**| The feed ID. | |
| **includeDetails** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [optional] [default to 'false'] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Models\MP\CA\Feeds\PartnerFeedResponse**](../../../Models/MP/CA/Feeds/PartnerFeedResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
