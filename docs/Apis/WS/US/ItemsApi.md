# Walmart\Apis\WS\US\ItemsApi  
All URIs are relative to https://api-gateway.walmart.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllItems()**](#getAllItems) | **GET** /v3/items | All items |
| [**getAnItem()**](#getAnItem) | **GET** /v3/items/{sku} | An item |
| [**itemBulkUploads()**](#itemBulkUploads) | **POST** /v3/feeds | Bulk Item Setup |
| [**updateRichMediaOfItem()**](#updateRichMediaOfItem) | **POST** /v2/feeds | Rich Media |


## `getAllItems()`

```php
getAllItems($nextCursor, $sku): \Walmart\Models\WS\US\Items\ItemResponse
```
All items

Displays a list of all items. If no SKU is included in this request, all items are retrieved from all pages. The full list can be retrieved by subsequent requests to the same API with successively larger values of offset. If a SKU is included, this request is semantically identical to the Get an Item request.

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

$api = Walmart::warehouseSupplier($config)->items();

$nextCursor = '*'; // string | Used for paginated results - use the nextCursor response element from the prior API call
$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the warehouse, which identifies each item. This will be used by the warehouse in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $api->getAllItems($nextCursor, $sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAllItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **nextCursor** | **string**| Used for paginated results - use the nextCursor response element from the prior API call | [optional] [default to '*'] |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the warehouse, which identifies each item. This will be used by the warehouse in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | [optional] |


### Return type

[**\Walmart\Models\WS\US\Items\ItemResponse**](../../../Models/WS/US/Items/ItemResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)

## `getAnItem()`

```php
getAnItem($sku): \Walmart\Models\WS\US\Items\ItemResponse
```
An item

Retrieves an item and displays the item details.

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

$api = Walmart::warehouseSupplier($config)->items();

$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the warehouse, which identifies each item. This will be used by the warehouse in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $api->getAnItem($sku);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAnItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the warehouse, which identifies each item. This will be used by the warehouse in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | |


### Return type

[**\Walmart\Models\WS\US\Items\ItemResponse**](../../../Models/WS/US/Items/ItemResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)

## `itemBulkUploads()`

```php
itemBulkUploads($feedType, $file): \Walmart\Models\WS\US\Items\FeedId
```
Bulk Item Setup

Updates items in bulk.  You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB to ensure optimal feed processing time.  Once the XML request is built using the Warehouse Supplier Feeds XSD, you can pass the payload using the Warehouse Supplier Feed API.  You must use the relevant category XSD to build the XML payload. The Warehouse Supplier Feed XSD must use a category-specific XSD for each ingested item. For example, if you need to sell a TV on Walmart.com, first you must use the Electronic Category XSD to define all of the TV’s elements, and then you should add it to the Warehouse Supplier Product XSD.  To get the Feed Status for a specific Product ID, use the Feed Item Status API.

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

$api = Walmart::warehouseSupplier($config)->items();

$feedType = 'SUPPLIER_FULL_ITEM'; // string | The Drop Ship Vendor Feed type. Must be SUPPLIER_FULL_ITEM
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->itemBulkUploads($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->itemBulkUploads: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The Drop Ship Vendor Feed type. Must be SUPPLIER_FULL_ITEM | [default to 'SUPPLIER_FULL_ITEM'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\WS\US\Items\FeedId**](../../../Models/WS/US/Items/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)

## `updateRichMediaOfItem()`

```php
updateRichMediaOfItem($feedType, $body): mixed
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

$api = Walmart::warehouseSupplier($config)->items();

$feedType = 'item'; // string | The Drop Ship Vendor Feed type. Must be SUPPLIER_FULL_ITEM
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
    $result = $api->updateRichMediaOfItem($feedType, $body);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->updateRichMediaOfItem: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The Drop Ship Vendor Feed type. Must be SUPPLIER_FULL_ITEM | [default to 'item'] |
| **body** | **string**|  | |


### Return type

**mixed**

### Authorization

This endpoint requires the following authorization methods:

* `signatureScheme`: Request signature authentication. Request signatures are generated using a combination of request info, a timestamp, and your Walmart consumer ID and private key. The signature is passed in the WM_SEC.AUTH_SIGNATURE header. This is always used in tandem with consumer ID authentication (above). When using endpoints that require signature authentication, you must pass the `privateKey` and `consumerId` options to the `Configuration` constructor.
* `consumerIdScheme`: Header authentication with your Walmart consumer ID, which is passed in the WM_CONSUMER.ID header. This is always used in tandem with signature authentication (below). When using endpoints that require consumer ID authentication, you must pass the `consumerId` option to the `Configuration` constructor.

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/WS/US)
[[Back to README]](../../../../README.md)
