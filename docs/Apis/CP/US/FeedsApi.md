# Walmart\Apis\CP\US\FeedsApi  
All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**contentProductFeed()**](#contentProductFeed) | **POST** /v3/feeds | Content feeds |


## `contentProductFeed()`

```php
contentProductFeed($feedType, $file): \Walmart\Models\CP\US\Feeds\ContentProductFeed200Response
```
Content feeds

You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB to ensure optimal feed processing time.

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

$api = Walmart::contentProvider($config)->feeds();

$feedType = 'CONTENT_PRODUCT'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->contentProductFeed($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->contentProductFeed: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | [default to 'CONTENT_PRODUCT'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\CP\US\Feeds\ContentProductFeed200Response**](../../../Models/CP/US/feeds/ContentProductFeed200Response.md)

### Authorization

[signatureScheme](../../../README.md#signatureScheme), [consumerIdScheme](../../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/CP/US)
[[Back to README]](../../../../README.md)
