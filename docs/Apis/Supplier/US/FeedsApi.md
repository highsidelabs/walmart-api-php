# Walmart\Apis\Supplier\US\FeedsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllFeedStatuses()**](#getAllFeedStatuses) | **GET** /v3/feeds | Feed status |
| [**getFeedItemStatus()**](#getFeedItemStatus) | **GET** /v3/feeds/{feedId} | Feed item status |


## `getAllFeedStatuses()`

```php
getAllFeedStatuses($accept, $wMPARTNERID, $feedId, $offset, $limit): \Walmart\Models\Supplier\US\Feeds\FeedRecordResponse
```
Feed status

Displays an item status for a specific Feed ID. Use the Feed ID returned from the DSV Bulk Upload API.

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
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::supplier($config)->feeds();

$accept = application/xml; // string | Specifies the returned data format in the response.  Valid values are:  application/xml  application/json
$wMPARTNERID = 10001126675; // string | Specifies an account identifier for the supplier.  This identifier is provided during Walmart account creation. If this is an API submission made by a third-party service provider, then the identifier is required to correctly associate the submission with the supplier.
$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $api->getAllFeedStatuses($accept, $wMPARTNERID, $feedId, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getAllFeedStatuses: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Specifies the returned data format in the response.  Valid values are:  application/xml  application/json | |
| **wMPARTNERID** | **string**| Specifies an account identifier for the supplier.  This identifier is provided during Walmart account creation. If this is an API submission made by a third-party service provider, then the identifier is required to correctly associate the submission with the supplier. | |
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789). | [optional] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Models\Supplier\US\Feeds\FeedRecordResponse**](../../../Models/Supplier/US/Feeds/FeedRecordResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/Supplier/US)
[[Back to README]](../../../../README.md)

## `getFeedItemStatus()`

```php
getFeedItemStatus($feedId, $accept, $wMPARTNERID, $includeDetails, $offset, $limit): \Walmart\Models\Supplier\US\Feeds\PartnerFeedResponse
```
Feed item status

Returns the status of all items for a specific feedId.  We do not recommend using this call when includeDetails is set to true because discrepancies may occur between the header and the item details (i.e., the item details may be incorrect).

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
    'privateKey' => 'PRIVATE_KEY',
    'consumerId' => 'CONSUMER_ID',
]);

$api = Walmart::supplier($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$accept = application/xml; // string | Specifies the returned data format in the response.  Valid values are:  application/xml  application/json
$wMPARTNERID = 10001126675; // string | Specifies an account identifier for the supplier.  This identifier is provided during Walmart account creation. If this is an API submission made by a third-party service provider, then the identifier is required to correctly associate the submission with the supplier.
$includeDetails = 'false'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '50'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.

try {
    $result = $api->getFeedItemStatus($feedId, $accept, $wMPARTNERID, $includeDetails, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->getFeedItemStatus: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped. (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789). | |
| **accept** | **string**| Specifies the returned data format in the response.  Valid values are:  application/xml  application/json | |
| **wMPARTNERID** | **string**| Specifies an account identifier for the supplier.  This identifier is provided during Walmart account creation. If this is an API submission made by a third-party service provider, then the identifier is required to correctly associate the submission with the supplier. | |
| **includeDetails** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [optional] [default to 'false'] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '50'] |


### Return type

[**\Walmart\Models\Supplier\US\Feeds\PartnerFeedResponse**](../../../Models/Supplier/US/Feeds/PartnerFeedResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.
* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/Supplier/US)
[[Back to README]](../../../../README.md)
