# Walmart\Api\US\MPFulfillmentApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelFulfillment()**](FulfillmentApi.md#cancelFulfillment) | **POST** /v3/fulfillment/orders-fulfillments/cancel | Cancel Customer Order |
| [**cancelShipment()**](FulfillmentApi.md#cancelShipment) | **DELETE** /v3/fulfillment/inbound-shipments/{inboundOrderId} | Cancel Inbound Shipment |
| [**confirmCarrierRateQuote()**](FulfillmentApi.md#confirmCarrierRateQuote) | **POST** /v3/fulfillment/carrier-rate-quote/confirm | Confirm Carrier Rate Quote |
| [**convertItemForWfs()**](FulfillmentApi.md#convertItemForWfs) | **POST** /v3/feeds | Convert items for WFS |
| [**createCarrierRateQuotes()**](FulfillmentApi.md#createCarrierRateQuotes) | **POST** /v3/fulfillment/carrier-rate-quotes | Create Carrier Rate Quote |
| [**createFulfillment()**](FulfillmentApi.md#createFulfillment) | **POST** /v3/fulfillment/orders-fulfillments | Create Customer Order |
| [**createInboundShipmentLabel()**](FulfillmentApi.md#createInboundShipmentLabel) | **GET** /v3/fulfillment/label/{shipmentId} | Create Inbound Shipment label (deprecated) |
| [**createInboundShipmentLabelV2()**](FulfillmentApi.md#createInboundShipmentLabelV2) | **POST** /v3/fulfillment/shipment-label | Create Inbound Shipment label |
| [**createShipment()**](FulfillmentApi.md#createShipment) | **POST** /v3/fulfillment/inbound-shipments | Create Inbound Shipment |
| [**getCarrierRateQuote()**](FulfillmentApi.md#getCarrierRateQuote) | **GET** /v3/fulfillment/carrier-rate-quotes | Get Carrier Rate Quote |
| [**getFulfillmentOrdersStatus()**](FulfillmentApi.md#getFulfillmentOrdersStatus) | **GET** /v3/fulfillment/orders-fulfillments/status | Get fulfillment orders status |
| [**getInboundOrderErrors()**](FulfillmentApi.md#getInboundOrderErrors) | **GET** /v3/fulfillment/inbound-shipment-errors | Get Inbound Shipment errors |
| [**getInboundShipmentItems()**](FulfillmentApi.md#getInboundShipmentItems) | **GET** /v3/fulfillment/inbound-shipment-items | Get Inbound Shipment Items |
| [**getInboundShipments()**](FulfillmentApi.md#getInboundShipments) | **GET** /v3/fulfillment/inbound-shipments | Get Shipments |
| [**getInventoryHealthReport()**](FulfillmentApi.md#getInventoryHealthReport) | **GET** /v3/report/wfs/getInventoryHealthReport | Get WFS Inventory Health Report |
| [**getWFSInventoryLog()**](FulfillmentApi.md#getWFSInventoryLog) | **GET** /v3/fulfillment/inventory-log | Get Inventory Log for a WFS item |
| [**inboundPreview()**](FulfillmentApi.md#inboundPreview) | **POST** /v3/fulfillment/inbound-preview | Fetch Inbound Preview |
| [**printCarrierLabel()**](FulfillmentApi.md#printCarrierLabel) | **POST** /v3/fulfillment/carrier-label/{shipmentId} | Print Carrier Label |
| [**promiseFulfillments()**](FulfillmentApi.md#promiseFulfillments) | **POST** /v3/fulfillment/orders-fulfillments/fetchOrderPromiseOptions | Fetch Delivery Promise Details |
| [**updateShipmentQuantity()**](FulfillmentApi.md#updateShipmentQuantity) | **PUT** /v3/fulfillment/shipment-quantities | Update Shipment Quantities |
| [**updateShipmentTrackingDetails()**](FulfillmentApi.md#updateShipmentTrackingDetails) | **POST** /v3/fulfillment/shipment-tracking | Update Shipment Tracking |
| [**voidCarrierRateQuote()**](FulfillmentApi.md#voidCarrierRateQuote) | **DELETE** /v3/fulfillment/carrier-rate-quote/{shipmentId} | Cancel Carrier Rate Quote |
| [**wercsFeedback()**](FulfillmentApi.md#wercsFeedback) | **POST** /v3/items/onhold/search | Hazmat Items On hold |


## `cancelFulfillment()`

```php
cancelFulfillment($cancelFulfillmentRequest): \Walmart\Model\MP\US\Fulfillment\CreateFulfillment200Response
```
Cancel Customer Order

The API is used to cancel the customer fulfilment orders created in the previous flow.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$cancelFulfillmentRequest = {"header":{"headerAttributes":{"buId":"0","martId":"202"}},"payload":{"sellerOrderId":"301878911210253","orderItems":[{"sellerLineId":"1232456","qty":{"unitOfMeasure":"EACH","measurementValue":2}}]}}; // \Walmart\Model\MP\US\Fulfillment\CancelFulfillmentRequest | Request fields

try {
    $result = $apiInstance->cancelFulfillment($cancelFulfillmentRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->cancelFulfillment: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **cancelFulfillmentRequest** | [**\Walmart\Model\MP\US\Fulfillment\CancelFulfillmentRequest**](../Model/CancelFulfillmentRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\CreateFulfillment200Response**](../Model/CreateFulfillment200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelShipment()`

```php
cancelShipment($inboundOrderId): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Cancel Inbound Shipment

The purpose of this service is to cancel an inbound order. Seller can cancel an Inbound Order before any of its Shipment arrives at the WFS FCs. Seller cannot cancel an Inbound Order if any of its Shipment’s status = Receiving in Progress, Closed, or Cancelled  Seller can only cancel at the Inbound Order level, not the Shipment level: if an Inbound Order is cancelled, all Shipments on that order will be cancelled.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$inboundOrderId = 'inboundOrderId_example'; // string | Unique ID identifying inbound shipment request

try {
    $result = $apiInstance->cancelShipment($inboundOrderId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->cancelShipment: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inboundOrderId** | **string**| Unique ID identifying inbound shipment request | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `confirmCarrierRateQuote()`

```php
confirmCarrierRateQuote($confirmCarrierRateQuoteRequest): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Confirm Carrier Rate Quote

The purpose of this service is for seller to confirm and accept the estimated carrier shipping charges, when choosing to use WFS Preferred Carrier Program - FedEx parcel to inbound inventory to Walmart fulfillment centers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$confirmCarrierRateQuoteRequest = new \Walmart\Model\MP\US\Fulfillment\ConfirmCarrierRateQuoteRequest(); // \Walmart\Model\MP\US\Fulfillment\ConfirmCarrierRateQuoteRequest | Request fields

try {
    $result = $apiInstance->confirmCarrierRateQuote($confirmCarrierRateQuoteRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->confirmCarrierRateQuote: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **confirmCarrierRateQuoteRequest** | [**\Walmart\Model\MP\US\Fulfillment\ConfirmCarrierRateQuoteRequest**](../Model/ConfirmCarrierRateQuoteRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `convertItemForWfs()`

```php
convertItemForWfs($feedType, $convertItemForWfsRequest): \Walmart\Model\MP\US\Fulfillment\ConvertItemForWfs200Response
```
Convert items for WFS

This API is used for converting existing Marketplace items to be WFS eligible. Once you’ve created a Marketplace item, each item must be converted to WFS by providing additional details that are not required during the item setup process. This item conversion process can be completed by uploading the Convert Spec excel file via Seller Center, or can be completed using the API documented here.  Directions on how to convert your item to be eligible for Walmart Fulfillment Services can be found here: https://sellerhelp.walmart.com/s/guide?article=000009206  Additional details on hazmat item compliance requirements can be found here: https://sellerhelp.walmart.com/seller/s/guide?article=000009156  To download the schema, please refer to the Overview section

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$feedType = 'OMNI_WFS'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$convertItemForWfsRequest = {"SupplierItemFeedHeader":{"subCategory":"baby_clothing","sellingChannel":"fbw","processMode":"REPLACE","locale":"en","version":"1.4","subset":"EXTERNAL"},"SupplierItem":[{"Visible":{"Baby Clothing":{"clothingSize":"S","color":["Pink"],"countryOfOriginTextiles":"USA","smallPartsWarnings":["0 - No warning applicable"],"mainImageUrl":"https://i5-qa.walmartimages.com/asr/549ecbe9-c874-475b-87d8-5e4cb19934ec.8f5d70e62bd0bb8abc6772c9ef1694e0.jpeg","prop65WarningText":"Warning","seasonYear":2020,"manufacturer":"Generic"}},"Orderable":{"productIdentifiers":{"productId":"05923239836453","productIdType":"GTIN"},"batteryTechnologyType":"Does Not Contain a Battery","electronicsIndicator":"No","endDate":"2040-01-01T00:00:00.000Z","price":10,"chemicalAerosolPesticide":"No","sku":"05923239836453","stateRestrictions":[{"stateRestrictionsText":"None"}],"brand":"Goodlife","productName":"Goodlife Corona_merge_split_19","startDate":"2020-06-15T00:00:00.000Z"},"TradeItem":{"countryOfOriginAssembly":["US - United States"],"innerPack":{"innerPackWidth":2,"innerPackHeight":3,"qtySellableItemsInnerPack":1,"innerPackGTIN":"05923239836453","innerPackWeight":2,"innerPackDepth":1},"sku":"05923239836453","orderableGTIN":"05923239836453"}}]}; // \Walmart\Model\MP\US\Fulfillment\ConvertItemForWfsRequest

try {
    $result = $apiInstance->convertItemForWfs($feedType, $convertItemForWfsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->convertItemForWfs: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [default to 'OMNI_WFS'] |
| **convertItemForWfsRequest** | [**\Walmart\Model\MP\US\Fulfillment\ConvertItemForWfsRequest**](../Model/ConvertItemForWfsRequest.md)|  | [optional] |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\ConvertItemForWfs200Response**](../Model/ConvertItemForWfs200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`, `multipart/form-data`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCarrierRateQuotes()`

```php
createCarrierRateQuotes($createCarrierRateQuotesRequest): \Walmart\Model\MP\US\Fulfillment\CreateCarrierRateQuotes200Response
```
Create Carrier Rate Quote

The purpose of this service is to get the carrier rate quotes for WFS Preferred Carrier Program - FedEx parcel solution, when inbounding seller items from seller pickup point to Walmart fulfillment centers.  For the shipments sent by FedEx small parcel, you can ship packages up to 150 lb, up to 108\" in length, and 165\" in length plus girth. (Girth is 2x width + 2x height.). You can ship up to 200 packages per shipment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createCarrierRateQuotesRequest = new \Walmart\Model\MP\US\Fulfillment\CreateCarrierRateQuotesRequest(); // \Walmart\Model\MP\US\Fulfillment\CreateCarrierRateQuotesRequest | Request fields

try {
    $result = $apiInstance->createCarrierRateQuotes($createCarrierRateQuotesRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createCarrierRateQuotes: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createCarrierRateQuotesRequest** | [**\Walmart\Model\MP\US\Fulfillment\CreateCarrierRateQuotesRequest**](../Model/CreateCarrierRateQuotesRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\CreateCarrierRateQuotes200Response**](../Model/CreateCarrierRateQuotes200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createFulfillment()`

```php
createFulfillment($createFulfillmentRequest): \Walmart\Model\MP\US\Fulfillment\CreateFulfillment200Response
```
Create Customer Order

The API is used to create customer fulfilment orders by the seller for Walmart Multichannel Solutions flow.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createFulfillmentRequest = {"header":{"headerAttributes":{"buId":"0","martId":"202"}},"payload":{"orderChannelId":"1B66575C0D9411EBADC10242AC120002","sellerOrderId":"002","orderPlacedTime":"2022-03-25T21:58:30.143Z","needsConfirmation":false,"partialFulfillments":false,"customer":{"contact":{"name":{"firstName":"Jason","lastName":"Bourne"},"phone":"6462285574","email":"jason.bourne@gmail.com"}},"orderItems":[{"fulfillmentType":"S2H","sellerLineId":"1","itemDetail":{"itemId":"452139670","description":"Ipad white"},"qty":{"unitOfMeasure":"EACH","measurementValue":2},"shippingMethod":"RUSH","shippingTo":{"contact":{"name":{"firstName":"Oscar","lastName":"Merino"},"phone":"6462285574"},"address":{"line1":"56 east 41 st street","line2":"Food Trends Store","line3":"","city":"New york","state":"NY","country":"USA","zip":"10017","addressType":"RESIDENTIAL"}},"chargeDetails":[{"chargeCategory":"PRODUCT","chargeName":"Sale Price","chargePerUnit":{"currencyAmount":5,"currencyUnit":"USD"},"taxDetails":{"taxPerLine":{"currencyAmount":1.04,"currencyUnit":"USD"}}}]}]}}; // \Walmart\Model\MP\US\Fulfillment\CreateFulfillmentRequest | Request fields

try {
    $result = $apiInstance->createFulfillment($createFulfillmentRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createFulfillment: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createFulfillmentRequest** | [**\Walmart\Model\MP\US\Fulfillment\CreateFulfillmentRequest**](../Model/CreateFulfillmentRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\CreateFulfillment200Response**](../Model/CreateFulfillment200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createInboundShipmentLabel()`

```php
createInboundShipmentLabel($shipmentId): string
```
Create Inbound Shipment label (deprecated)

The purpose of this service is to generate WFS shipping labels in pdf format for receiving purpose. Please note this is not a carrier label; these labels are required for the FC to identify the Inbound Order and Shipment ID they are receiving against. After requesting the shipping label, sellers must work with warehouse/ supplier to follow these steps before sending any Shipments to WFS FCs:  1.  Print the WFS shipping label. 2.  Fill out the FILL OUT section based on seller’s packing situation. For example, if a seller plans to ship 3 boxes to the WFS fulfillment center, print out 3 labels and fill out BOX 1 of 3, 2 of 3, and 3 of 3 in the FILL OUT section. 3.  Circle one shipment type in the CIRCLE ONE section. For example, if there are different SKUs in the box, circle MIXED SKUS in the CIRCLE ONE section. 4.  Affix the WFS shipping labels to the boxes/ pallets.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying inbound shipment

try {
    $result = $apiInstance->createInboundShipmentLabel($shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createInboundShipmentLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying inbound shipment | |


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createInboundShipmentLabelV2()`

```php
createInboundShipmentLabelV2($createInboundShipmentLabelV2Request): string
```
Create Inbound Shipment label

The purpose of this service is to generate WFS Receiving Labels in various formats for receiving purposes. Please note this is not a carrier label; these labels are required for the FC to identify the Inbound Order and Shipment ID they are receiving against.Receiving labels are customizable:  1. 3 size and format options are available to choose from through the LabelSize and LabelFormat fields:   - 4 in. x 6 in. (PDF).   - 4 in. x 3 1/3 in. (PDF).   - 4 in. x 6 in. (ZPL). 2. Provide the type of the label (box or pallet) in the LoadType field and the number of the labels needed in the Count field. 3. Print the WFS receiving label. 4. Affix the WFS receiving labels to the boxes/ pallets.  If none of the above optional inputs are provided, a blank 4 in. x 6 in. PDF format label will be generated. Sellers must work with the warehouse/supplier to provide the required details before sending any Shipments to WFS FCs: 1. Print the WFS receiving label. 2. Fill out the FILL OUT section based on the seller’s packing situation. For example, if a seller plans to ship 3 boxes to the WFS fulfillment center, print out 3 labels and fill out BOX 1 of 3, 2 of 3, and 3 of 3 in the FILL OUT section. 3. Circle one shipment type in the CIRCLE ONE section. For example, if there are different SKUs in the box, circle MIXED SKUS in the CIRCLE ONE section. 4. Affix the WFS receiving labels to the boxes/ pallets.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createInboundShipmentLabelV2Request = new \Walmart\Model\MP\US\Fulfillment\CreateInboundShipmentLabelV2Request(); // \Walmart\Model\MP\US\Fulfillment\CreateInboundShipmentLabelV2Request | Request fields

try {
    $result = $apiInstance->createInboundShipmentLabelV2($createInboundShipmentLabelV2Request);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createInboundShipmentLabelV2: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createInboundShipmentLabelV2Request** | [**\Walmart\Model\MP\US\Fulfillment\CreateInboundShipmentLabelV2Request**](../Model/CreateInboundShipmentLabelV2Request.md)| Request fields | |


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/pdf`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createShipment()`

```php
createShipment($createShipmentRequest): \Walmart\Model\MP\US\Fulfillment\CreateShipment200Response
```
Create Inbound Shipment

Once you’ve converted items to WFS, you are ready to start shipping items inbound to Walmart. To do this, you will submit an Inbound shipment request. The Inbound shipment details when you expect to ship product, as well as the items and quantities which will be shipped.  Each shipment you send in to WFS should have a corresponding Inbound shipment . In this case, a shipment would be considered a direct truckload, LTL shipment, or set of items shipped via parcel on a given day.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createShipmentRequest = {"inboundOrderId":"8778881015027","inboundServices":{"inventoryTransferService":"Y"},"returnAddress":{"addressLine1":"860 W California Ave","addressLine2":"","city":"Sunnyvale","stateCode":"CA","countryCode":"USA","postalCode":"94086"},"orderItems":[{"productId":"00894147009695","productType":"GTIN","sku":"WILL-SL969","itemDesc":"Blue jeans","itemQty":10,"vendorPackQty":10,"innerPackQty":1,"expectedDeliveryDate":"2020-11-21T00:00:00.000Z"}]}; // \Walmart\Model\MP\US\Fulfillment\CreateShipmentRequest | Request fields

try {
    $result = $apiInstance->createShipment($createShipmentRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createShipment: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createShipmentRequest** | [**\Walmart\Model\MP\US\Fulfillment\CreateShipmentRequest**](../Model/CreateShipmentRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\CreateShipment200Response**](../Model/CreateShipment200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCarrierRateQuote()`

```php
getCarrierRateQuote($shipmentId, $mode): \Walmart\Model\MP\US\Fulfillment\GetCarrierRateQuote200Response
```
Get Carrier Rate Quote

The purpose of this service is for seller to void the carrier shipping charges, within 24 hours after the estimated carrier charges have been accepted by the seller.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.
$mode = 'mode_example'; // string | Shipment type.

try {
    $result = $apiInstance->getCarrierRateQuote($shipmentId, $mode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getCarrierRateQuote: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying each shipment. | |
| **mode** | **string**| Shipment type. | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\GetCarrierRateQuote200Response**](../Model/GetCarrierRateQuote200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFulfillmentOrdersStatus()`

```php
getFulfillmentOrdersStatus($orgId, $limit, $offset, $orderNumber, $trackingNumber, $shipmentNumber, $fromOrderDate, $toOrderDate, $sortOrder, $sortBy): \Walmart\Model\MP\US\Fulfillment\GetFulfillmentOrdersStatus200Response
```
Get fulfillment orders status

The API provides the list of customer fulfillment orders with corresponding details.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$orgId = 'orgId_example'; // string | Filtering the order based on an orgId.
$limit = 'limit_example'; // string | Limiting the number of records fetched. Valid range is from 1 to 50 inclusive.
$offset = 'offset_example'; // string | Setting an offset to skip records. Valid range is from 0 to 50000 inclusive.
$orderNumber = 'orderNumber_example'; // string | Search the order based on an order number.
$trackingNumber = 'trackingNumber_example'; // string | Search the order based on a tracking number.
$shipmentNumber = 'shipmentNumber_example'; // string | Search the order based on a shipment number.
$fromOrderDate = 'fromOrderDate_example'; // string | Search the order based on a start date (Date in YYYY-MM-DD format).
$toOrderDate = 'toOrderDate_example'; // string | Search the order based on an endDate date (Date in YYYY-MM-DD format).
$sortOrder = 'desc'; // string | Order of sorting (asc/desc).
$sortBy = 'sortBy_example'; // string | Key on which sorting is done (Supported Attributes: orderDate).

try {
    $result = $apiInstance->getFulfillmentOrdersStatus($orgId, $limit, $offset, $orderNumber, $trackingNumber, $shipmentNumber, $fromOrderDate, $toOrderDate, $sortOrder, $sortBy);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getFulfillmentOrdersStatus: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **orgId** | **string**| Filtering the order based on an orgId. | |
| **limit** | **string**| Limiting the number of records fetched. Valid range is from 1 to 50 inclusive. | |
| **offset** | **string**| Setting an offset to skip records. Valid range is from 0 to 50000 inclusive. | |
| **orderNumber** | **string**| Search the order based on an order number. | [optional] |
| **trackingNumber** | **string**| Search the order based on a tracking number. | [optional] |
| **shipmentNumber** | **string**| Search the order based on a shipment number. | [optional] |
| **fromOrderDate** | **string**| Search the order based on a start date (Date in YYYY-MM-DD format). | [optional] |
| **toOrderDate** | **string**| Search the order based on an endDate date (Date in YYYY-MM-DD format). | [optional] |
| **sortOrder** | **string**| Order of sorting (asc/desc). | [optional] [default to 'desc'] |
| **sortBy** | **string**| Key on which sorting is done (Supported Attributes: orderDate). | [optional] |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\GetFulfillmentOrdersStatus200Response**](../Model/GetFulfillmentOrdersStatus200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInboundOrderErrors()`

```php
getInboundOrderErrors($offset, $limit, $shipmentId): \Walmart\Model\MP\US\Fulfillment\GetInboundOrderErrors200Response
```
Get Inbound Shipment errors

After Sellers request to create an Inbound Order, WFS may return error responses with error codes. Type of errors:  -  SKUs not in WFS catalog: Sellers need to make sure all SKUs have already been converted and added to the WFS catalog -  Missing required information;  -  Invalid Product ID (incorrect number of digits);  -  Duplicated Inbound Order ID: Inbound Order ID has already been used before -  Duplicated Product IDs Most of these errors can be prevented with a robust API integration that does not allow the mistakes to be made. Seller should update the request based on the error message and re-submit the request. Please note, once the Inbound Order is created successfully after the re-submission, historical errors under the same Inbound Order ID will be removed and no longer accessible.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$offset = '0'; // string | offset is the number of records you wish to skip before selecting records.
$limit = '10'; // string | The number of Purchase Orders to be returned.
$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.

try {
    $result = $apiInstance->getInboundOrderErrors($offset, $limit, $shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInboundOrderErrors: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **string**| offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| The number of Purchase Orders to be returned. | [optional] [default to '10'] |
| **shipmentId** | **string**| Unique ID identifying each shipment. | [optional] |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\GetInboundOrderErrors200Response**](../Model/GetInboundOrderErrors200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInboundShipmentItems()`

```php
getInboundShipmentItems($offset, $limit, $shipmentId): \Walmart\Model\MP\US\Fulfillment\GetInboundShipmentItems200Response
```
Get Inbound Shipment Items

After Sellers create an Inbound Order successfully, the response from Create Inbound Shipments API will tell whether the order can be sent in a single shipment to one WFS fulfillment center or needs to be split into multiple shipments to different fulfillment centers.  To retrieve the Shipment level info, please call the Get Inbound Shipments API and to get what needs to be in a specific shipment and SKU level receipt situation, please call the Get Inbound Shipment Items API

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$offset = '0'; // string | offset is the number of records you wish to skip before selecting records.
$limit = '10'; // string | The number of Purchase Orders to be returned.
$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.

try {
    $result = $apiInstance->getInboundShipmentItems($offset, $limit, $shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInboundShipmentItems: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **string**| offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| The number of Purchase Orders to be returned. | [optional] [default to '10'] |
| **shipmentId** | **string**| Unique ID identifying each shipment. | [optional] |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\GetInboundShipmentItems200Response**](../Model/GetInboundShipmentItems200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInboundShipments()`

```php
getInboundShipments($offset, $limit, $inboundOrderId, $shipmentId, $status, $fromCreateDate, $toCreateDate): \Walmart\Model\MP\US\Fulfillment\GetInboundShipments200Response
```
Get Shipments

After Sellers create an Inbound Order successfully, the response from Create Inbound Shipments API will tell whether the order can be sent in a single shipment to one WFS fulfillment center or needs to be split into multiple shipments to different fulfillment centers. To retrieve the Shipment level info, please call the Get Inbound Shipments API

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$offset = '0'; // string | offset is the number of records you wish to skip before selecting records.
$limit = '10'; // string | The number of Purchase Orders to be returned.
$inboundOrderId = 'inboundOrderId_example'; // string | Unique ID identifying inbound shipment request.
$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.
$status = 'status_example'; // string | Current shipment status
$fromCreateDate = 'fromCreateDate_example'; // string | Shipment create date starting range
$toCreateDate = 'toCreateDate_example'; // string | Shipment create date starting  end range

try {
    $result = $apiInstance->getInboundShipments($offset, $limit, $inboundOrderId, $shipmentId, $status, $fromCreateDate, $toCreateDate);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInboundShipments: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **string**| offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| The number of Purchase Orders to be returned. | [optional] [default to '10'] |
| **inboundOrderId** | **string**| Unique ID identifying inbound shipment request. | [optional] |
| **shipmentId** | **string**| Unique ID identifying each shipment. | [optional] |
| **status** | **string**| Current shipment status | [optional] |
| **fromCreateDate** | **string**| Shipment create date starting range | [optional] |
| **toCreateDate** | **string**| Shipment create date starting  end range | [optional] |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\GetInboundShipments200Response**](../Model/GetInboundShipments200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInventoryHealthReport()`

```php
getInventoryHealthReport(): string
```
Get WFS Inventory Health Report

Returns all the information associated with Seller's items that are set up on Walmart Fulfillment Services (WFS) platform.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getInventoryHealthReport();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInventoryHealthReport: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

**string**

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/octet-stream`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWFSInventoryLog()`

```php
getWFSInventoryLog($gtin, $shipmentId, $transactionType, $transactionLocation, $startDate, $endDate, $sortBy, $sortOrder, $offset, $limit): \Walmart\Model\MP\US\Fulfillment\GetWFSInventoryLog200Response
```
Get Inventory Log for a WFS item

Returns activity log for any Seller's item that is stored in Walmart Fulfillment Centers (WFS) platform.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$gtin = 'gtin_example'; // string | GTIN.
$shipmentId = 'shipmentId_example'; // string | Shipment Id.
$transactionType = 'transactionType_example'; // string | Transaction Type.
$transactionLocation = 'transactionLocation_example'; // string | Transaction Location.
$startDate = 'startDate_example'; // string | Inventory log transaction time starting range (Date in YYYY-MM-DD format).
$endDate = 'endDate_example'; // string | Inventory log transaction time ending range (Date in YYYY-MM-DD format).
$sortBy = 'sortBy_example'; // string | Sort By Attribute (Supported Attributes: gtin, changedUnits, transactionReasonCode, transactionType, shipmentId).
$sortOrder = 'sortOrder_example'; // string | Sort Order (ASC or DESC).
$offset = '0'; // string | Offset is the number of records you wish to skip before selecting records.
$limit = '50'; // string | limit is the number of records to be returned.

try {
    $result = $apiInstance->getWFSInventoryLog($gtin, $shipmentId, $transactionType, $transactionLocation, $startDate, $endDate, $sortBy, $sortOrder, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getWFSInventoryLog: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **gtin** | **string**| GTIN. | |
| **shipmentId** | **string**| Shipment Id. | [optional] |
| **transactionType** | **string**| Transaction Type. | [optional] |
| **transactionLocation** | **string**| Transaction Location. | [optional] |
| **startDate** | **string**| Inventory log transaction time starting range (Date in YYYY-MM-DD format). | [optional] |
| **endDate** | **string**| Inventory log transaction time ending range (Date in YYYY-MM-DD format). | [optional] |
| **sortBy** | **string**| Sort By Attribute (Supported Attributes: gtin, changedUnits, transactionReasonCode, transactionType, shipmentId). | [optional] |
| **sortOrder** | **string**| Sort Order (ASC or DESC). | [optional] |
| **offset** | **string**| Offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| limit is the number of records to be returned. | [optional] [default to '50'] |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\GetWFSInventoryLog200Response**](../Model/GetWFSInventoryLog200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `inboundPreview()`

```php
inboundPreview($inboundPreviewRequest): \Walmart\Model\MP\US\Fulfillment\InboundPreview200Response
```
Fetch Inbound Preview

The purpose of this service is to give a preview of the estimated Inventory Transfer Service cost and shipment destinations between ITS and self-distribution.  Note: This API is only available to sellers eligible for the Inventory Transfer Service.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$inboundPreviewRequest = {"header":{"headerAttributes":{"buId":"0","martId":"0"}},"payload":{"inboundOrderId":"WFS_P132398111-ITS1011","returnAddress":{"addressLine1":"860 W California Ave","addressLine2":"","city":"Sunnyvale","stateCode":"CA","countryCode":"US","postalCode":"94086"},"orderItems":[{"productId":"06484856148873","productType":"GTIN","sku":"SKU-06476211912694","itemDesc":"tennis ball","itemQty":5,"vendorPackQty":5,"innerPackQty":1,"expectedDeliveryDate":"2023-05-25T15:33:33-07:00","addOnServices":[{"serviceType":"LABEL"}]}]}}; // \Walmart\Model\MP\US\Fulfillment\InboundPreviewRequest | Request fields

try {
    $result = $apiInstance->inboundPreview($inboundPreviewRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->inboundPreview: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inboundPreviewRequest** | [**\Walmart\Model\MP\US\Fulfillment\InboundPreviewRequest**](../Model/InboundPreviewRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\InboundPreview200Response**](../Model/InboundPreview200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `printCarrierLabel()`

```php
printCarrierLabel($shipmentId, $printCarrierLabelRequest): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Print Carrier Label

The purpose of this service is for sellers to print carrier shipping label.   To print carrier shipping label, please first specify a Ship Date. Note, carrier allows to select a ship date 10 days in advance.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.
$printCarrierLabelRequest = new \Walmart\Model\MP\US\Fulfillment\PrintCarrierLabelRequest(); // \Walmart\Model\MP\US\Fulfillment\PrintCarrierLabelRequest

try {
    $result = $apiInstance->printCarrierLabel($shipmentId, $printCarrierLabelRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->printCarrierLabel: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying each shipment. | |
| **printCarrierLabelRequest** | [**\Walmart\Model\MP\US\Fulfillment\PrintCarrierLabelRequest**](../Model/PrintCarrierLabelRequest.md)|  | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/pdf`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `promiseFulfillments()`

```php
promiseFulfillments($promiseFulfillmentsRequest): \Walmart\Model\MP\US\Fulfillment\PromiseFulfillments200Response
```
Fetch Delivery Promise Details

This request provides fulfillment and delivery promise information for all valid item/offer to seller.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$promiseFulfillmentsRequest = {"header":{"headerAttributes":{"martId":"202","buId":"0"}},"payload":{"requestId":"dcd127e2-c944-4a40-ac88-d1058c73e33e","destinations":[{"address":{"city":"Milpitas","addressType":"RESIDENTIAL","postalCode":"95035","addressLineOne":"261 Odyssey Ln","addressLineTwo":"222","isPOBox":false,"countryCode":"US","stateCode":"CA"},"fulfillmentType":"DELIVERY"}],"offerSelections":[{"offers":[{"sku":"OMP-B01-L","lineId":"249ac8e1-e6c2-4806-81a5-54215eb16b00","salesUnit":"Each","requestedQuantity":{"measurementValue":1,"unitOfMeasure":"EA"}}]}]}}; // \Walmart\Model\MP\US\Fulfillment\PromiseFulfillmentsRequest | Request fields

try {
    $result = $apiInstance->promiseFulfillments($promiseFulfillmentsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->promiseFulfillments: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **promiseFulfillmentsRequest** | [**\Walmart\Model\MP\US\Fulfillment\PromiseFulfillmentsRequest**](../Model/PromiseFulfillmentsRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\PromiseFulfillments200Response**](../Model/PromiseFulfillments200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateShipmentQuantity()`

```php
updateShipmentQuantity($updateShipmentQuantityRequest): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Update Shipment Quantities

Seller can modify the shipment quantity before the Shipment arrives at the WFS FCs. Seller cannot modify the shipment quantity when Shipment Status = Receiving in Progress, Closed, and Cancelled.   Seller will need to provide new quantities for each SKU to update. Seller will only be able to add up to 6 units per SKU but can reduce to 0 units to remove any SKU from a shipment. Seller cannot change all SKUs’ quantity to 0 – they must cancel the entire Inbound Order.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$updateShipmentQuantityRequest = {"inboundOrderId":"123543","shipmentId":"1234","orderItems":[{"sku":"WILL-SL969","updatedShipmentQty":11}]}; // \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantityRequest | Request fields

try {
    $result = $apiInstance->updateShipmentQuantity($updateShipmentQuantityRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->updateShipmentQuantity: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateShipmentQuantityRequest** | [**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantityRequest**](../Model/UpdateShipmentQuantityRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateShipmentTrackingDetails()`

```php
updateShipmentTrackingDetails($updateShipmentTrackingDetailsRequest): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Update Shipment Tracking

The purpose of this service is to capture tracking information from sellers. For small parcel shipments, sellers must provide the tracking info including carrier name and tracking numbers. WFS will use the data to capture updated expected delivery date to adjust the fulfillment inbound capacity to avoid any receiving delays.  Seller will also be able to view the updated expected delivery date through the Seller Center UI or calling the Get Inbound Shipment Items API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$updateShipmentTrackingDetailsRequest = {"shipmentId":"12345","carrierName":"UPS","trackingInfo":["123","456-1","789-2"]}; // \Walmart\Model\MP\US\Fulfillment\UpdateShipmentTrackingDetailsRequest | Request fields

try {
    $result = $apiInstance->updateShipmentTrackingDetails($updateShipmentTrackingDetailsRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->updateShipmentTrackingDetails: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **updateShipmentTrackingDetailsRequest** | [**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentTrackingDetailsRequest**](../Model/UpdateShipmentTrackingDetailsRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `voidCarrierRateQuote()`

```php
voidCarrierRateQuote($shipmentId): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Cancel Carrier Rate Quote

The purpose of this service is for seller to void the carrier shipping charges, within 24 hours after the estimated carrier charges have been accepted by the seller.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.

try {
    $result = $apiInstance->voidCarrierRateQuote($shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->voidCarrierRateQuote: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying each shipment. | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `wercsFeedback()`

```php
wercsFeedback($accept, $wercsFeedbackRequest): \Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response
```
Hazmat Items On hold

Use this API to see a list of items that are on hold for hazmat compliance review, including items with an In Review, Action Needed, and Prohibited status. Also use this API to review your Action Needed error descriptions and understand how to correct them for further assessment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\FulfillmentApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$accept = application/json; // string | Only supported Media Type : application/json
$wercsFeedbackRequest = {"query":{"field":"gtin","value":"06154035330299"},"filters":[{"field":"status","op":"equals","values":["PROHIBITED","IN_REVIEW","ACTION_NEEDED"]}],"sort":{"field":"updatedAt","order":"DESC"}}; // \Walmart\Model\MP\US\Fulfillment\WercsFeedbackRequest | Request fields

try {
    $result = $apiInstance->wercsFeedback($accept, $wercsFeedbackRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->wercsFeedback: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Only supported Media Type : application/json | |
| **wercsFeedbackRequest** | [**\Walmart\Model\MP\US\Fulfillment\WercsFeedbackRequest**](../Model/WercsFeedbackRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200Response**](../Model/UpdateShipmentQuantity200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
