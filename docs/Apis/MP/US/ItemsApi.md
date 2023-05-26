# Walmart\Api\US\MPItemsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAllItems()**](ItemsApi.md#getAllItems) | **GET** /v3/items | All items |
| [**getAnItem()**](ItemsApi.md#getAnItem) | **GET** /v3/items/{id} | An item |
| [**getCatalogSearch()**](ItemsApi.md#getCatalogSearch) | **POST** /v3/items/catalog/search | Catalog Search |
| [**getCountByStatus()**](ItemsApi.md#getCountByStatus) | **GET** /v3/items/count | Get items count by status |
| [**getItemAssociations()**](ItemsApi.md#getItemAssociations) | **POST** /v3/items/associations | Get Item Associations |
| [**getSearchResult()**](ItemsApi.md#getSearchResult) | **GET** /v3/items/walmart/search | Item Search |
| [**getTaxonomyResponse()**](ItemsApi.md#getTaxonomyResponse) | **GET** /v3/items/taxonomy | Taxonomy |
| [**getVariantCount()**](ItemsApi.md#getVariantCount) | **GET** /v3/items/groups/count | Get item count by groups |
| [**itemBulkUploads()**](ItemsApi.md#itemBulkUploads) | **POST** /v3/feeds | Bulk Item Setup (Multiple) |
| [**retireAnItem()**](ItemsApi.md#retireAnItem) | **DELETE** /v3/items/{SKU} | Retire an item |


## `getAllItems()`

```php
getAllItems($nextCursor, $sku, $offset, $limit, $lifecycleStatus, $publishedStatus, $variantGroupId): \Walmart\Models\MP\US\Items\GetAllItems200Response
```
All items

Displays a list of all items by using either nextCursor or offset and limit query parameters

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$nextCursor = '*'; // string | Used for pagination when more than 200 items are retrieved.nextCursor value received in response will be same for all subsequent page requests.
$sku = 'sku_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item.
$offset = '0'; // string | The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true.
$limit = '20'; // string | The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true.
$lifecycleStatus = 'lifecycleStatus_example'; // string | The lifecycle status of an item describes where the item listing is in the overall lifecycle. Examples of allowed values are ACTIVE , ARCHIVED, RETIRED.
$publishedStatus = 'publishedStatus_example'; // string | The published status of an item describes where the item is in the submission process. Examples of allowed values are PUBLISHED, UNPUBLISHED.
$variantGroupId = 'variantGroupId_example'; // string | Variant Id to retrieve all items with the same variant id

try {
    $result = $apiInstance->getAllItems($nextCursor, $sku, $offset, $limit, $lifecycleStatus, $publishedStatus, $variantGroupId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAllItems: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **nextCursor** | **string**| Used for pagination when more than 200 items are retrieved.nextCursor value received in response will be same for all subsequent page requests. | [optional] [default to '*'] |
| **sku** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. | [optional] |
| **offset** | **string**| The object response to start with, where 0 is the first entity that can be requested. It can only be used when includeDetails is set to true. | [optional] [default to '0'] |
| **limit** | **string**| The number of entities to be returned. It cannot be more than 50 entities. Use it only when the includeDetails is set to true. | [optional] [default to '20'] |
| **lifecycleStatus** | **string**| The lifecycle status of an item describes where the item listing is in the overall lifecycle. Examples of allowed values are ACTIVE , ARCHIVED, RETIRED. | [optional] |
| **publishedStatus** | **string**| The published status of an item describes where the item is in the submission process. Examples of allowed values are PUBLISHED, UNPUBLISHED. | [optional] |
| **variantGroupId** | **string**| Variant Id to retrieve all items with the same variant id | [optional] |


### Return type

[**\Walmart\Models\MP\US\Items\GetAllItems200Response**](../Model/GetAllItems200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAnItem()`

```php
getAnItem($id, $productIdType): \Walmart\Models\MP\US\Items\GetAnItem200Response
```
An item

Retrieves an item and displays the item details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$id = 'id_example'; // string | Represents the seller-specified unique ID for each item. Takes SKU code by default. If you require more specific item codes, such as GTIN, UPC, ISBN, EAN, or ITEM_ID, you need to use the productIdType query parameter and specify the desired code e.g. productIdType=GTIN.
$productIdType = 'productIdType_example'; // string | Item code type specifier allows to filter by specific code type, (e.g. GTIN).

try {
    $result = $apiInstance->getAnItem($id, $productIdType);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getAnItem: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| Represents the seller-specified unique ID for each item. Takes SKU code by default. If you require more specific item codes, such as GTIN, UPC, ISBN, EAN, or ITEM_ID, you need to use the productIdType query parameter and specify the desired code e.g. productIdType=GTIN. | |
| **productIdType** | **string**| Item code type specifier allows to filter by specific code type, (e.g. GTIN). | |


### Return type

[**\Walmart\Models\MP\US\Items\GetAnItem200Response**](../Model/GetAnItem200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCatalogSearch()`

```php
getCatalogSearch($getCatalogSearchRequest, $page, $limit, $nextCursor): \Walmart\Models\MP\US\Items\GetCatalogSearch200Response
```
Catalog Search

Get Catalog Search Result

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$getCatalogSearchRequest = new \Walmart\Models\MP\US\Items\GetCatalogSearchRequest(); // \Walmart\Models\MP\US\Items\GetCatalogSearchRequest | Request fields
$page = 0; // int | number of page
$limit = 100; // int | number of items
$nextCursor = 'nextCursor_example'; // string | nextCursor

try {
    $result = $apiInstance->getCatalogSearch($getCatalogSearchRequest, $page, $limit, $nextCursor);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getCatalogSearch: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **getCatalogSearchRequest** | [**\Walmart\Models\MP\US\Items\GetCatalogSearchRequest**](../Model/GetCatalogSearchRequest.md)| Request fields | |
| **page** | **int**| number of page | [optional] [default to 0] |
| **limit** | **int**| number of items | [optional] [default to 100] |
| **nextCursor** | **string**| nextCursor | [optional] |


### Return type

[**\Walmart\Models\MP\US\Items\GetCatalogSearch200Response**](../Model/GetCatalogSearch200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCountByStatus()`

```php
getCountByStatus($status): string
```
Get items count by status

Get total count of items based on status

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$status = 'status_example'; // string | Status of Item

try {
    $result = $apiInstance->getCountByStatus($status);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getCountByStatus: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **status** | **string**| Status of Item | [optional] |


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getItemAssociations()`

```php
getItemAssociations($getItemAssociationsRequest): \Walmart\Models\MP\US\Items\GetItemAssociations200Response
```
Get Item Associations

Get Item Associations API allows you to retrieve shippingTemplate and shipNode associated with the provided items.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$getItemAssociationsRequest = {"items":[{"sku":"RG-IRAE-79VD"},{"sku":"AC73891"}]}; // \Walmart\Models\MP\US\Items\GetItemAssociationsRequest | Request fields

try {
    $result = $apiInstance->getItemAssociations($getItemAssociationsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getItemAssociations: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **getItemAssociationsRequest** | [**\Walmart\Models\MP\US\Items\GetItemAssociationsRequest**](../Model/GetItemAssociationsRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Items\GetItemAssociations200Response**](../Model/GetItemAssociations200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSearchResult()`

```php
getSearchResult($query, $upc, $gtin): \Walmart\Models\MP\US\Items\GetSearchResult200Response
```
Item Search

The Item Search API allows you to query the Walmart.com global product catalog by item keyword, UPC or GTIN. You can review all item information provided in the response, so you can decide whether or not you want to sell this item.  You must specify at least one query parameter, either: 'query', 'gtin', or 'upc'. If there are more than one item in the catalog, the search returns the first 20 items in the response.  Additionally, you can use the information provided in the 'relatedQueries' response parameter to run a new search for similar items.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$query = ''; // string | Specifies a keyword search as a String.
$upc = ''; // string | Specifies a Universal Product Code (UPC) search. UPC must be 12 digits.
$gtin = ''; // string | Specifies a Global Trade Item Number (GTIN) search. GTIN must be 14 digits.

try {
    $result = $apiInstance->getSearchResult($query, $upc, $gtin);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getSearchResult: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **query** | **string**| Specifies a keyword search as a String. | [optional] [default to ''] |
| **upc** | **string**| Specifies a Universal Product Code (UPC) search. UPC must be 12 digits. | [optional] [default to ''] |
| **gtin** | **string**| Specifies a Global Trade Item Number (GTIN) search. GTIN must be 14 digits. | [optional] [default to ''] |


### Return type

[**\Walmart\Models\MP\US\Items\GetSearchResult200Response**](../Model/GetSearchResult200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTaxonomyResponse()`

```php
getTaxonomyResponse(): \Walmart\Models\MP\US\Items\GetTaxonomyResponse200Response
```
Taxonomy

The Taxonomy API exposes the category taxonomy that Walmart.com uses to categorize items. It describes the Departments, Categories, and Subcategories levels available on Walmart.com. You can specify the exact category as a parameter when using any of the following APIs:  -   Search-   Data feeds-   Special feeds, to includePre-order, Best Sellers, Rollbacks, Clearance, and Special Buys  For example, you can restrict the Search API to search within a category by supplying the ID through the taxonomy. Similarly, you can use the Feed API to download category-specific feeds by specifying a category ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getTaxonomyResponse();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getTaxonomyResponse: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Models\MP\US\Items\GetTaxonomyResponse200Response**](../Model/GetTaxonomyResponse200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVariantCount()`

```php
getVariantCount($variantGroupId): \Walmart\Models\MP\US\Items\GetVariantCount200Response
```
Get item count by groups

Get total count of items based on variant group information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$variantGroupId = 'variantGroupId_example'; // string | Variant Id to retrieve

try {
    $result = $apiInstance->getVariantCount($variantGroupId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->getVariantCount: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **variantGroupId** | **string**| Variant Id to retrieve | [optional] |


### Return type

[**\Walmart\Models\MP\US\Items\GetVariantCount200Response**](../Model/GetVariantCount200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `itemBulkUploads()`

```php
itemBulkUploads($feedType, $file): \Walmart\Models\MP\US\Items\ItemBulkUploads200Response
```
Bulk Item Setup (Multiple)

Use this API for initial item setup and maintenance.  This API updates items in bulk. You can update 10,000 items at once; updates with more than 10,000 items are not supported. Keep feed sizes below 10 MB, except for FITMENT_ACES and FITMENT_PIES, to ensure optimal feed processing time. For FITMENT_PIES and FITMENT_ACES feeds, files upto 25 MB are supported.  You can use the Bulk Item Setup API for any of the following item spec versions, just specify the corresponding feed type as a query parameter.  *   Item spec version 4.7 feed type: MP_ITEM *   WFS Item spec version 4.3 feed type: MP_WFS_ITEM  *   WFS Maintenance spec version 4.7 feed type: MP_MAINTENANCE *   Set up item by match 4.1 feed type: MP_ITEM_MATCH  *   Convert an existing item to WFS 4.5 feed type : OMNI_WFS  *   For Fitment feed type FITMENT_ACES and FITMENT_PIES, zip file needs to be added in the request body. While uploading the fitment feeds, it is mandatory to add boundary parameter in Content-Type header. For example, Content-Type: multipart/form-data;boundary=\"----custom boundary\". Without a boundary parameter, fitment feeds will fail to process. For details refer to the guide link below

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'feedType_example'; // string | The feed Type
$file = "/path/to/file.txt"; // \SplFileObject

try {
    $result = $apiInstance->itemBulkUploads($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->itemBulkUploads: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| The feed Type | |
| **file** | **\SplFileObject****\SplFileObject**|  | |


### Return type

[**\Walmart\Models\MP\US\Items\ItemBulkUploads200Response**](../Model/ItemBulkUploads200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `retireAnItem()`

```php
retireAnItem($sKU): \Walmart\Models\MP\US\Items\RetireAnItem200Response
```
Retire an item

Completely deactivates and un-publishes an item from the site.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\ItemsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$sKU = 'sKU_example'; // string | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded.

try {
    $result = $apiInstance->retireAnItem($sKU);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling ItemsApi->retireAnItem: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sKU** | **string**| An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. This will be used by the seller in the XSD file to refer to each item. Special characters in the sku needing encoding are: ':', '/', '?', '#', '[', ']', '@', '!', '$', '&', \"'\", '(', ')', '*', '+', ',', ';', '=', as well as '%' itself. Other characters don't need to be encoded. | |


### Return type

[**\Walmart\Models\MP\US\Items\RetireAnItem200Response**](../Model/RetireAnItem200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
