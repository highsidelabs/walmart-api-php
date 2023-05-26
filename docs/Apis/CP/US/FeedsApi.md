# Walmart\Api\US\CPFeedsApi  
All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**contentProductFeed()**](FeedsApi.md#contentProductFeed) | **POST** /v3/feeds | Content feeds |


## `contentProductFeed()`

```php
contentProductFeed($feedType, $file): \Walmart\Models\CP\US\Feeds\ContentProductFeed200Response
```
Content feeds

You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB to ensure optimal feed processing time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\FeedsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'CONTENT_PRODUCT'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $apiInstance->contentProductFeed($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->contentProductFeed: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | [default to 'CONTENT_PRODUCT'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\CP\US\Feeds\ContentProductFeed200Response**](../Model/ContentProductFeed200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/xml`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
