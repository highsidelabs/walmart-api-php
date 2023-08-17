# Walmart\Apis\MP\CA\EventsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**autoUploadPromoSpec()**](#autoUploadPromoSpec) | **POST** /v3/ca/promotion/autoUploadPromoSpec | Auto Upload Promo Spec |
| [**bulkAddItem()**](#bulkAddItem) | **POST** /v3/ca/promotion/bulkAddItems | Bulk Add Item |
| [**downloadTemplate()**](#downloadTemplate) | **GET** /v3/ca/promotion/template | Download Template |
| [**getAPromoItem()**](#getAPromoItem) | **GET** /v3/ca/promotion/getpromoitems | Get Selected Promo Item |
| [**getAllPromoItems()**](#getAllPromoItems) | **GET** /v3/ca/promotion/allPromoItems | Get All Promo Items |
| [**getEvent()**](#getEvent) | **GET** /v3/ca/promotion/events | Get Event by Partner ID |
| [**getPromoSpec()**](#getPromoSpec) | **GET** /v3/ca/promotion/getPromoSpec | Download Promo Spec |
| [**getTotalItemCount()**](#getTotalItemCount) | **GET** /v3/ca/promotion/items/count | Get Total Item Count |


## `autoUploadPromoSpec()`

```php
autoUploadPromoSpec($eventId): \Walmart\Models\MP\CA\Events\UploadResponse
```
Auto Upload Promo Spec

This will be an automated procedure, which needs to be triggered from the seller end to confirm their participation. Once they trigger this API, all their selected SKUs will be taken up for the promotional events. If a seller misses out on this step, then despite the above procedure, their items won't be hosted under the promotional event.

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

$api = Walmart::marketplace($config)->events();

$eventId = 'eventId_example'; // string | The Event Id

try {
    $result = $api->autoUploadPromoSpec($eventId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->autoUploadPromoSpec: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventId** | **string**| The Event Id | |


### Return type

[**\Walmart\Models\MP\CA\Events\UploadResponse**](../../../Models/MP/CA/Events/UploadResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `bulkAddItem()`

```php
bulkAddItem($file, $eventId, $eventName): \Walmart\Models\MP\CA\Events\UploadResponse
```
Bulk Add Item

Once the seller has filled the template file downloaded with Download Template API, they can upload it for any event using this API.Any repeated upload will overwrite the previous details, hence in order to make any modifications sellers will have to provide the complete file along with the necessary amendments. This API will require the details of the event the seller wishes to participate in, sellers can fetch this information with Get Event API.

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

$api = Walmart::marketplace($config)->events();

$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload
$eventId = 'eventId_example'; // string
$eventName = 'eventName_example'; // string

try {
    $result = $api->bulkAddItem($file, $eventId, $eventName);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->bulkAddItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |
| **eventId** | **string**|  | |
| **eventName** | **string**|  | |


### Return type

[**\Walmart\Models\MP\CA\Events\UploadResponse**](../../../Models/MP/CA/Events/UploadResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `downloadTemplate()`

```php
downloadTemplate()
```
Download Template

Once the seller has visibility into the upcoming events, they can submit their items for promotion via this template file. This API will return an Excel file, where in the sellers can fill in the required details.

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

$api = Walmart::marketplace($config)->events();


try {
    $api->downloadTemplate();
} catch (Exception $e) {
    echo "Exception when calling EventsApi->downloadTemplate: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

void (empty response body)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAPromoItem()`

```php
getAPromoItem($eventID): \Walmart\Models\MP\CA\Events\PromoItemResponse
```
Get Selected Promo Item

Once the Item upload is complete, the sellers can view only selective uploaded items using this API

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

$api = Walmart::marketplace($config)->events();

$eventID = 'eventID_example'; // string | The Event Id

try {
    $result = $api->getAPromoItem($eventID);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getAPromoItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventID** | **string**| The Event Id | |


### Return type

[**\Walmart\Models\MP\CA\Events\PromoItemResponse**](../../../Models/MP/CA/Events/PromoItemResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getAllPromoItems()`

```php
getAllPromoItems($eventID, $type): \Walmart\Models\MP\CA\Events\PromoItemResponse
```
Get All Promo Items

Once the Item upload is complete, the sellers can view their uploaded items using this API.  On the backend, the business will be reviewing each seller's submissions and approving/rejecting the items based on certain criteria (mentioned as the feedback in the API response).This activity will change the state of a particular item uploaded for promotion.

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

$api = Walmart::marketplace($config)->events();

$eventID = 'eventID_example'; // string | The Event Id
$type = 'json'; // string | The API returns json response.

try {
    $result = $api->getAllPromoItems($eventID, $type);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getAllPromoItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventID** | **string**| The Event Id | |
| **type** | **string**| The API returns json response. | [optional] [default to 'json'] |


### Return type

[**\Walmart\Models\MP\CA\Events\PromoItemResponse**](../../../Models/MP/CA/Events/PromoItemResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getEvent()`

```php
getEvent(): \Walmart\Models\MP\CA\Events\EventResponse
```
Get Event by Partner ID

This API is the primary source of information for all the current active events in which the seller is eligible to participate along with their details.

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

$api = Walmart::marketplace($config)->events();


try {
    $result = $api->getEvent();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getEvent: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\CA\Events\EventResponse**](../../../Models/MP/CA/Events/EventResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getPromoSpec()`

```php
getPromoSpec($eventId, $type)
```
Download Promo Spec

This API lets sellers download a file constituting all the items they upload for a particular promotional event, along with their status and business feedback.

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

$api = Walmart::marketplace($config)->events();

$eventId = 'eventId_example'; // string | The Event Id
$type = 'file'; // string | The API returns file response.

try {
    $api->getPromoSpec($eventId, $type);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getPromoSpec: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventId** | **string**| The Event Id | |
| **type** | **string**| The API returns file response. | [optional] [default to 'file'] |


### Return type

void (empty response body)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)

## `getTotalItemCount()`

```php
getTotalItemCount($eventId): \Walmart\Models\MP\CA\Events\ItemCountResponse
```
Get Total Item Count

A summary of the total item count under various subcategories can be viewed using this API.

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

$api = Walmart::marketplace($config)->events();

$eventId = 'eventId_example'; // string | The Event Id

try {
    $result = $api->getTotalItemCount($eventId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling EventsApi->getTotalItemCount: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eventId** | **string**| The Event Id | |


### Return type

[**\Walmart\Models\MP\CA\Events\ItemCountResponse**](../../../Models/MP/CA/Events/ItemCountResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signature`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerId`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `channelType`: Header authentication with your Walmart channel type, which is passed in the WM_CONSUMER.CHANNEL.TYPE header. When using endpoints that require channel type authentication, you must pass the `channelType` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/CA)
[[Back to README]](../../../../README.md)
