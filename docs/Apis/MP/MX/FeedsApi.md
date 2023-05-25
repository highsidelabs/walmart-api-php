# Walmart\Api\MX\MPFeedsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllFeedStatuses()**](FeedsApi.md#getAllFeedStatuses) | **GET** /v3/feeds | All feed statuses |
| [**getFeedItemStatus()**](FeedsApi.md#getFeedItemStatus) | **GET** /v3/feeds/{feedId} | Feed item status |


## `getAllFeedStatuses()`

```php
getAllFeedStatuses($feedId, $offset, $limit): \Walmart\Model\MP\MX\Feeds\GetAllFeedStatuses200Response
```
All feed statuses

Returns the feed statuses for all the specified Feed IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FeedsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $apiInstance->getAllFeedStatuses($feedId, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getAllFeedStatuses: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789). | [optional] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Model\MP\MX\Feeds\GetAllFeedStatuses200Response**](../Model/GetAllFeedStatuses200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFeedItemStatus()`

```php
getFeedItemStatus($feedId, $includeDetails, $offset, $limit): \Walmart\Model\MP\MX\Feeds\GetFeedItemStatus200Response
```
Feed item status

Returns the feed and item status for a specified Feed ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: basicScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET');
// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FeedsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedId = 'feedId_example'; // string | The feed ID.
$includeDetails = 'false'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $apiInstance->getFeedItemStatus($feedId, $includeDetails, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getFeedItemStatus: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedId** | **string**| The feed ID. | |
| **includeDetails** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [optional] [default to 'false'] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Model\MP\MX\Feeds\GetFeedItemStatus200Response**](../Model/GetFeedItemStatus200Response.md)

### Authorization

[basicScheme](../../README.md#basicScheme), [accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
