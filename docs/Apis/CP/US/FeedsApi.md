# Walmart\Apis\CP\US\FeedsApi  
All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**contentProductFeed()**](#contentProductFeed) | **POST** /v3/feeds | Content feeds |
| [**getAllFeedStatuses()**](#getAllFeedStatuses) | **GET** /feeds | Feed status |
| [**getFeedItemStatus()**](#getFeedItemStatus) | **GET** /feeds/{feedId} | Feed item status |
| [**updateRichMedia()**](#updateRichMedia) | **POST** /v2/feeds | Rich Media |


## `contentProductFeed()`

```php
contentProductFeed($feedType, $file): \Walmart\Models\CP\US\Feeds\FeedId
```
Content feeds

You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB to ensure optimal feed processing time.

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

[**\Walmart\Models\CP\US\Feeds\FeedId**](../../../Models/CP/US/Feeds/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/CP/US)
[[Back to README]](../../../../README.md)

## `getAllFeedStatuses()`

```php
getAllFeedStatuses($feedId, $offset, $limit): \Walmart\Models\CP\US\Feeds\FeedRecordResponse
```
Feed status

You can display an item status for a specific feed ID. Use the feed ID returned from the upload an item feed API.

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

$api = Walmart::contentProvider($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$offset = '0'; // string | The object response to the starting number, where 0 is the first entity that can be requested.
$limit = '20'; // string | The number of entities to be returned. Maximum 20 entities.

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
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789). | |
| **offset** | **string**| The object response to the starting number, where 0 is the first entity that can be requested. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. Maximum 20 entities. | [optional] [default to '20'] |


### Return type

[**\Walmart\Models\CP\US\Feeds\FeedRecordResponse**](../../../Models/CP/US/Feeds/FeedRecordResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/CP/US)
[[Back to README]](../../../../README.md)

## `getFeedItemStatus()`

```php
getFeedItemStatus($feedId, $includeDetails, $offset, $limit): \Walmart\Models\CP\US\Feeds\PartnerFeedResponse
```
Feed item status

You can display the status of all items for a specific feed ID. Use the feed ID returned from the upload an item feed API.

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

$api = Walmart::contentProvider($config)->feeds();

$feedId = 'feedId_example'; // string | A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789).
$includeDetails = 'false'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$offset = '0'; // string | The object response to the starting number, where 0 is the first entity that can be requested.
$limit = '20'; // string | The number of entities to be returned. Maximum 20 entities.

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
| **feedId** | **string**| A unique ID returned from the Bulk Upload API, used for tracking the Feed File. Special characters must be escaped (e.g., feedId: '...3456@789...' must be entered in the URL as '...3456%40789). | |
| **includeDetails** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [optional] [default to 'false'] |
| **offset** | **string**| The object response to the starting number, where 0 is the first entity that can be requested. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. Maximum 20 entities. | [optional] [default to '20'] |


### Return type

[**\Walmart\Models\CP\US\Feeds\PartnerFeedResponse**](../../../Models/CP/US/Feeds/PartnerFeedResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/CP/US)
[[Back to README]](../../../../README.md)

## `updateRichMedia()`

```php
updateRichMedia($feedType, $body): \Walmart\Models\CP\US\Feeds\FeedId
```
Rich Media

Rich Media includes material such as videos, comparison tables, and view360 media which is item-specific.

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

$api = Walmart::contentProvider($config)->feeds();

$feedType = 'item'; // string | The feed Type
$body = <?xml version="1.0" encoding="UTF-8"?>
<RichMediaFeed xmlns="http://walmart.com/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://walmart.com/ RichMediaFeed.xsd ">
    <RichMediaFeedHeader>
        <version>2.1.2</version>
        <requestId>requestId</requestId>
        <requestBatchId>requestBatchId</requestBatchId>
        <feedDate>2001-12-31T12:00:00</feedDate>
        <mart>WALMART_US</mart>
    </RichMediaFeedHeader>
    <RichMedia>
        <productIdentifiers>
            <productIdentifier>
                <productIdType>UPC</productIdType>
                <productId>815812013182</productId>
            </productIdentifier>
        </productIdentifiers>
        <Modules processMode="MERGE">
            <view360 provider="">
                <html-content>html-content</html-content>
            </view360>
            <marketing-content provider="">
                <html-content>html-content</html-content>
            </marketing-content>
            <product-tour provider="">
                <html-content>html-content</html-content>
            </product-tour>
            <videos provider="">
                <video provider="">
                    <title>title</title>
                    <description>description</description>
                    <language>en-US</language>
                    <closed-caption>
                        <url>url</url>
                        <format>webvtt</format>
                        <language>en-US</language>
                    </closed-caption>
                    <age-gate>0</age-gate>
                    <source-mobile>
                        <url>url</url>
                        <width>720</width>
                        <height>480</height>
                        <format>mp4</format>
                        <thumbnail>
                            <url>url</url>
                            <format>png</format>
                            <width>120</width>
                            <height>100</height>
                        </thumbnail>
                        <poster>
                            <url>url</url>
                            <format>jpg</format>
                            <width>720</width>
                            <height>480</height>
                        </poster>
                    </source-mobile>
                    <sources>
                        <source>
                            <url>url</url>
                            <width>720</width>
                            <height>480</height>
                            <format>mp4</format>
                            <screen>mobile</screen>
                            <thumbnail>
                                <url>url</url>
                                <format>png</format>
                                <width>120</width>
                                <height>100</height>
                            </thumbnail>
                            <poster>
                                <url>url</url>
                                <format>jpg</format>
                                <width>720</width>
                                <height>480</height>
                            </poster>
                        </source>
                    </sources>
                    <duration>0</duration>
                    <likes>0</likes>
                    <views>0</views>
                    <tags>tags</tags>
                </video>
            </videos>
            <documents provider="">
                <document>
                    <title>title</title>
                    <url>url</url>
                    <format>pdf</format>
                    <pages>0</pages>
                    <thumbnail>
                        <url>url</url>
                        <format>png</format>
                        <width>120</width>
                        <height>100</height>
                    </thumbnail>
                    <size>0</size>
                </document>
            </documents>
            <customer-review-videos provider="">
                <customer-review-video provider="">
                    <title>title</title>
                    <description>description</description>
                    <language>en-US</language>
                    <closed-caption>
                        <url>url</url>
                        <format>webvtt</format>
                        <language>en-US</language>
                    </closed-caption>
                    <age-gate>0</age-gate>
                    <source-computer>
                        <url>url</url>
                        <width>720</width>
                        <height>480</height>
                        <format>mp4</format>
                        <thumbnail>
                            <url>url</url>
                            <format>png</format>
                            <width>120</width>
                            <height>100</height>
                        </thumbnail>
                        <poster>
                            <url>url</url>
                            <format>jpg</format>
                            <width>720</width>
                            <height>480</height>
                        </poster>
                    </source-computer>
                    <sources>
                        <source>
                            <url>url</url>
                            <width>720</width>
                            <height>480</height>
                            <format>mp4</format>
                            <screen>mobile</screen>
                            <thumbnail>
                                <url>url</url>
                                <format>png</format>
                                <width>120</width>
                                <height>100</height>
                            </thumbnail>
                            <poster>
                                <url>url</url>
                                <format>jpg</format>
                                <width>720</width>
                                <height>480</height>
                            </poster>
                        </source>
                    </sources>
                    <duration>0</duration>
                    <likes>0</likes>
                    <views>0</views>
                    <tags>tags</tags>
                </customer-review-video>
            </customer-review-videos>
            <comparison-table provider="">
                <headline>
                    <image>
                        <title>title</title>
                        <url>url</url>
                        <height>0</height>
                        <width>0</width>
                        <format>png</format>
                    </image>
                </headline>
                <feature-column>
                    <sections>
                        <section>
                            <header>
                                <caption>caption</caption>
                            </header>
                            <feature>
                                <caption>caption</caption>
                            </feature>
                        </section>
                    </sections>
                </feature-column>
                <product-columns>
                    <product-column>
                        <products-info>
                            <product-info>
                                <title>title</title>
                                <thumbnail>
                                    <url>url</url>
                                    <format>png</format>
                                    <width>120</width>
                                    <height>120</height>
                                </thumbnail>
                                <productIdentifiers>
                                    <productIdentifier>
                                        <productIdType>UPC</productIdType>
                                        <productId>productId</productId>
                                    </productIdentifier>
                                </productIdentifiers>
                            </product-info>
                        </products-info>
                        <value>value</value>
                    </product-column>
                </product-columns>
            </comparison-table>
            <expert-reviews provider="">
                <expert-review provider="">
                    <html-content>html-content</html-content>
                </expert-review>
            </expert-reviews>
            <misc-modules provider="">
                <misc-module>
                    <attributeName>attributeName</attributeName>
                    <attributeValue>attributeValue</attributeValue>
                </misc-module>
            </misc-modules>
        </Modules>
        <additionalProductAttributes>
            <NameValueAttribute>
                <name>name</name>
                <type>LOCALIZABLE_TEXT</type>
                <value>
                    <value>value</value>
                    <group>group</group>
                    <rank>0</rank>
                </value>
            </NameValueAttribute>
        </additionalProductAttributes>
    </RichMedia>
</RichMediaFeed>
; // string

try {
    $result = $api->updateRichMedia($feedType, $body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FeedsApi->updateRichMedia: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | [default to 'item'] |
| **body** | **string**|  | |


### Return type

[**\Walmart\Models\CP\US\Feeds\FeedId**](../../../Models/CP/US/Feeds/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/CP/US)
[[Back to README]](../../../../README.md)
