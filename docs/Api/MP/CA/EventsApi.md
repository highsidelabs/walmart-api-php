# Walmart\Api\CA\MPEventsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**autoUploadPromoSpec()**](EventsApi.md#autoUploadPromoSpec) | **POST** /v3/ca/promotion/autoUploadPromoSpec | Auto Upload Promo Spec |
| [**bulkAddItem()**](EventsApi.md#bulkAddItem) | **POST** /v3/ca/promotion/bulkAddItems | Bulk Add Item |
| [**downloadTemplate()**](EventsApi.md#downloadTemplate) | **GET** /v3/ca/promotion/template | Download Template |
| [**getAPromoItem()**](EventsApi.md#getAPromoItem) | **GET** /v3/ca/promotion/getpromoitems | Get Selected Promo Item |
| [**getAllPromoItems()**](EventsApi.md#getAllPromoItems) | **GET** /v3/ca/promotion/allPromoItems | Get All Promo Items |
| [**getEvent()**](EventsApi.md#getEvent) | **GET** /v3/ca/promotion/events | Get Event by Partner ID |
| [**getPromoSpec()**](EventsApi.md#getPromoSpec) | **GET** /v3/ca/promotion/getPromoSpec | Download Promo Spec |
| [**getTotalItemCount()**](EventsApi.md#getTotalItemCount) | **GET** /v3/ca/promotion/items/count | Get Total Item Count |


## `autoUploadPromoSpec()`

```php
autoUploadPromoSpec($eventId): \Walmart\Model\MP\CA\Events\BulkAddItem200Response
```
Auto Upload Promo Spec

This will be an automated procedure, which needs to be triggered from the seller end to confirm their participation. Once they trigger this API, all their selected SKUs will be taken up for the promotional events. If a seller misses out on this step, then despite the above procedure, their items won't be hosted under the promotional event.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$eventId = 'eventId_example'; // string | The Event Id

try {
    $result = $apiInstance->autoUploadPromoSpec($eventId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->autoUploadPromoSpec: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventId** | **string**| The Event Id | |


### Return type

[**\Walmart\Model\MP\CA\Events\BulkAddItem200Response**](../Model/BulkAddItem200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `bulkAddItem()`

```php
bulkAddItem($file, $eventId, $eventName): \Walmart\Model\MP\CA\Events\BulkAddItem200Response
```
Bulk Add Item

Once the seller has filled the template file downloaded with Download Template API, they can upload it for any event using this API.Any repeated upload will overwrite the previous details, hence in order to make any modifications sellers will have to provide the complete file along with the necessary amendments. This API will require the details of the event the seller wishes to participate in, sellers can fetch this information with Get Event API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload
$eventId = 'eventId_example'; // string
$eventName = 'eventName_example'; // string

try {
    $result = $apiInstance->bulkAddItem($file, $eventId, $eventName);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->bulkAddItem: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |
| **eventId** | **string**|  | |
| **eventName** | **string**|  | |


### Return type

[**\Walmart\Model\MP\CA\Events\BulkAddItem200Response**](../Model/BulkAddItem200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadTemplate()`

```php
downloadTemplate()
```
Download Template

Once the seller has visibility into the upcoming events, they can submit their items for promotion via this template file. This API will return an Excel file, where in the sellers can fill in the required details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $apiInstance->downloadTemplate();
} catch (Exception $e) {
    echo "Exception when calling EventsApi->downloadTemplate: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

void (empty response body)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAPromoItem()`

```php
getAPromoItem($eventID): \Walmart\Model\MP\CA\Events\GetAPromoItem200Response
```
Get Selected Promo Item

Once the Item upload is complete, the sellers can view only selective uploaded items using this API

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$eventID = 'eventID_example'; // string | The Event Id

try {
    $result = $apiInstance->getAPromoItem($eventID);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getAPromoItem: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventID** | **string**| The Event Id | |


### Return type

[**\Walmart\Model\MP\CA\Events\GetAPromoItem200Response**](../Model/GetAPromoItem200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllPromoItems()`

```php
getAllPromoItems($eventID, $type): \Walmart\Model\MP\CA\Events\GetAPromoItem200Response
```
Get All Promo Items

Once the Item upload is complete, the sellers can view their uploaded items using this API.  On the backend, the business will be reviewing each seller's submissions and approving/rejecting the items based on certain criteria (mentioned as the feedback in the API response).This activity will change the state of a particular item uploaded for promotion.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$eventID = 'eventID_example'; // string | The Event Id
$type = 'json'; // string | The API returns json response.

try {
    $result = $apiInstance->getAllPromoItems($eventID, $type);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getAllPromoItems: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventID** | **string**| The Event Id | |
| **type** | **string**| The API returns json response. | [optional] [default to 'json'] |


### Return type

[**\Walmart\Model\MP\CA\Events\GetAPromoItem200Response**](../Model/GetAPromoItem200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEvent()`

```php
getEvent(): \Walmart\Model\MP\CA\Events\GetEvent200Response
```
Get Event by Partner ID

This API is the primary source of information for all the current active events in which the seller is eligible to participate along with their details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getEvent();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getEvent: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\CA\Events\GetEvent200Response**](../Model/GetEvent200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPromoSpec()`

```php
getPromoSpec($eventId, $type)
```
Download Promo Spec

This API lets sellers download a file constituting all the items they upload for a particular promotional event, along with their status and business feedback.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$eventId = 'eventId_example'; // string | The Event Id
$type = 'file'; // string | The API returns file response.

try {
    $apiInstance->getPromoSpec($eventId, $type);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getPromoSpec: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventId** | **string**| The Event Id | |
| **type** | **string**| The API returns file response. | [optional] [default to 'file'] |


### Return type

void (empty response body)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTotalItemCount()`

```php
getTotalItemCount($eventId): \Walmart\Model\MP\CA\Events\GetTotalItemCount200Response
```
Get Total Item Count

A summary of the total item count under various subcategories can be viewed using this API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure key-based authorization: signatureScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_SEC.AUTH_SIGNATURE', 'YOUR_KEY');
// Configure key-based authorization: consumerIdScheme
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET')->setApiKey('WM_CONSUMER.ID', 'YOUR_KEY');

$apiInstance = new Walmart\Api\EventsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$eventId = 'eventId_example'; // string | The Event Id

try {
    $result = $apiInstance->getTotalItemCount($eventId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getTotalItemCount: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventId** | **string**| The Event Id | |


### Return type

[**\Walmart\Model\MP\CA\Events\GetTotalItemCount200Response**](../Model/GetTotalItemCount200Response.md)

### Authorization

[signatureScheme](../../README.md#signatureScheme), [consumerIdScheme](../../README.md#consumerIdScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
