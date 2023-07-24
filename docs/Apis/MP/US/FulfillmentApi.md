# Walmart\Apis\MP\US\FulfillmentApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelFulfillment()**](#cancelFulfillment) | **POST** /v3/fulfillment/orders-fulfillments/cancel | Cancel Customer Order |
| [**cancelShipment()**](#cancelShipment) | **DELETE** /v3/fulfillment/inbound-shipments/{inboundOrderId} | Cancel Inbound Shipment |
| [**confirmCarrierRateQuote()**](#confirmCarrierRateQuote) | **POST** /v3/fulfillment/carrier-rate-quote/confirm | Confirm Carrier Rate Quote |
| [**convertItemForWfs()**](#convertItemForWfs) | **POST** /v3/feeds | Convert items for WFS |
| [**createCarrierRateQuotes()**](#createCarrierRateQuotes) | **POST** /v3/fulfillment/carrier-rate-quotes | Create Carrier Rate Quote |
| [**createFulfillment()**](#createFulfillment) | **POST** /v3/fulfillment/orders-fulfillments | Create Customer Order |
| [**createInboundShipmentLabel()**](#createInboundShipmentLabel) | **GET** /v3/fulfillment/label/{shipmentId} | Create Inbound Shipment label (deprecated) |
| [**createInboundShipmentLabelV2()**](#createInboundShipmentLabelV2) | **POST** /v3/fulfillment/shipment-label | Create Inbound Shipment label |
| [**createShipment()**](#createShipment) | **POST** /v3/fulfillment/inbound-shipments | Create Inbound Shipment |
| [**getCarrierRateQuote()**](#getCarrierRateQuote) | **GET** /v3/fulfillment/carrier-rate-quotes | Get Carrier Rate Quote |
| [**getFulfillmentOrdersStatus()**](#getFulfillmentOrdersStatus) | **GET** /v3/fulfillment/orders-fulfillments/status | Get fulfillment orders status |
| [**getInboundOrderErrors()**](#getInboundOrderErrors) | **GET** /v3/fulfillment/inbound-shipment-errors | Get Inbound Shipment errors |
| [**getInboundShipmentItems()**](#getInboundShipmentItems) | **GET** /v3/fulfillment/inbound-shipment-items | Get Inbound Shipment Items |
| [**getInboundShipments()**](#getInboundShipments) | **GET** /v3/fulfillment/inbound-shipments | Get Shipments |
| [**getInventoryHealthReport()**](#getInventoryHealthReport) | **GET** /v3/report/wfs/getInventoryHealthReport | Get WFS Inventory Health Report |
| [**getWFSInventoryLog()**](#getWFSInventoryLog) | **GET** /v3/fulfillment/inventory-log | Get Inventory Log for a WFS item |
| [**inboundPreview()**](#inboundPreview) | **POST** /v3/fulfillment/inbound-preview | Fetch Inbound Preview |
| [**printCarrierLabel()**](#printCarrierLabel) | **POST** /v3/fulfillment/carrier-label/{shipmentId} | Print Carrier Label |
| [**promiseFulfillments()**](#promiseFulfillments) | **POST** /v3/fulfillment/orders-fulfillments/fetchOrderPromiseOptions | Fetch Delivery Promise Details |
| [**updateShipmentQuantity()**](#updateShipmentQuantity) | **PUT** /v3/fulfillment/shipment-quantities | Update Shipment Quantities |
| [**updateShipmentTrackingDetails()**](#updateShipmentTrackingDetails) | **POST** /v3/fulfillment/shipment-tracking | Update Shipment Tracking |
| [**voidCarrierRateQuote()**](#voidCarrierRateQuote) | **DELETE** /v3/fulfillment/carrier-rate-quote/{shipmentId} | Cancel Carrier Rate Quote |
| [**wercsFeedback()**](#wercsFeedback) | **POST** /v3/items/onhold/search | Hazmat Items On hold |


## `cancelFulfillment()`

```php
cancelFulfillment($createCustomerOrderRequestWrapper): \Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO
```
Cancel Customer Order

The API is used to cancel the customer fulfilment orders created in the previous flow.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$createCustomerOrderRequestWrapper = {"header":{"headerAttributes":{"buId":"0","martId":"202"}},"payload":{"sellerOrderId":"301878911210253","orderItems":[{"sellerLineId":"1232456","qty":{"unitOfMeasure":"EACH","measurementValue":2}}]}}; // \Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper | Request fields

try {
    $result = $api->cancelFulfillment($createCustomerOrderRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->cancelFulfillment: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createCustomerOrderRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper**](../../../Models/MP/US/Fulfillment/CreateCustomerOrderRequestWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO**](../../../Models/MP/US/Fulfillment/CustomerOrderResponseWrapperDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `cancelShipment()`

```php
cancelShipment($inboundOrderId): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Cancel Inbound Shipment

The purpose of this service is to cancel an inbound order. Seller can cancel an Inbound Order before any of its Shipment arrives at the WFS FCs. Seller cannot cancel an Inbound Order if any of its Shipment’s status = Receiving in Progress, Closed, or Cancelled  Seller can only cancel at the Inbound Order level, not the Shipment level: if an Inbound Order is cancelled, all Shipments on that order will be cancelled.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$inboundOrderId = 'inboundOrderId_example'; // string | Unique ID identifying inbound shipment request

try {
    $result = $api->cancelShipment($inboundOrderId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->cancelShipment: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inboundOrderId** | **string**| Unique ID identifying inbound shipment request | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `confirmCarrierRateQuote()`

```php
confirmCarrierRateQuote($carrierQuoteConfirmRequestWrapper): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Confirm Carrier Rate Quote

The purpose of this service is for seller to confirm and accept the estimated carrier shipping charges, when choosing to use WFS Preferred Carrier Program - FedEx parcel to inbound inventory to Walmart fulfillment centers.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$carrierQuoteConfirmRequestWrapper = new \Walmart\Models\MP\US\Fulfillment\CarrierQuoteConfirmRequestWrapper(); // \Walmart\Models\MP\US\Fulfillment\CarrierQuoteConfirmRequestWrapper | Request fields

try {
    $result = $api->confirmCarrierRateQuote($carrierQuoteConfirmRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->confirmCarrierRateQuote: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierQuoteConfirmRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\CarrierQuoteConfirmRequestWrapper**](../../../Models/MP/US/Fulfillment/CarrierQuoteConfirmRequestWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `convertItemForWfs()`

```php
convertItemForWfs($feedType, $file): \Walmart\Models\MP\US\Fulfillment\FeedId
```
Convert items for WFS

This API is used for converting existing Marketplace items to be WFS eligible. Once you’ve created a Marketplace item, each item must be converted to WFS by providing additional details that are not required during the item setup process. This item conversion process can be completed by uploading the Convert Spec excel file via Seller Center, or can be completed using the API documented here.  Directions on how to convert your item to be eligible for Walmart Fulfillment Services can be found here: https://sellerhelp.walmart.com/s/guide?article=000009206  Additional details on hazmat item compliance requirements can be found here: https://sellerhelp.walmart.com/seller/s/guide?article=000009156  To download the schema, please refer to the Overview section

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$feedType = 'OMNI_WFS'; // string | Includes details of each entity in the feed. Do not set this parameter to true.
$file = "/path/to/file.txt"; // \SplFileObject | Feed file to upload

try {
    $result = $api->convertItemForWfs($feedType, $file);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->convertItemForWfs: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **feedType** | **string**| Includes details of each entity in the feed. Do not set this parameter to true. | [default to 'OMNI_WFS'] |
| **file** | **\SplFileObject****\SplFileObject**| Feed file to upload | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\FeedId**](../../../Models/MP/US/Fulfillment/FeedId.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createCarrierRateQuotes()`

```php
createCarrierRateQuotes($carrierQuoteRequestV2Wrapper): \Walmart\Models\MP\US\Fulfillment\QuoteResponseV2Wrapper
```
Create Carrier Rate Quote

The purpose of this service is to get the carrier rate quotes for WFS Preferred Carrier Program - FedEx parcel solution, when inbounding seller items from seller pickup point to Walmart fulfillment centers.  For the shipments sent by FedEx small parcel, you can ship packages up to 150 lb, up to 108\" in length, and 165\" in length plus girth. (Girth is 2x width + 2x height.). You can ship up to 200 packages per shipment.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$carrierQuoteRequestV2Wrapper = new \Walmart\Models\MP\US\Fulfillment\CarrierQuoteRequestV2Wrapper(); // \Walmart\Models\MP\US\Fulfillment\CarrierQuoteRequestV2Wrapper | Request fields

try {
    $result = $api->createCarrierRateQuotes($carrierQuoteRequestV2Wrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createCarrierRateQuotes: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **carrierQuoteRequestV2Wrapper** | [**\Walmart\Models\MP\US\Fulfillment\CarrierQuoteRequestV2Wrapper**](../../../Models/MP/US/Fulfillment/CarrierQuoteRequestV2Wrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\QuoteResponseV2Wrapper**](../../../Models/MP/US/Fulfillment/QuoteResponseV2Wrapper.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createFulfillment()`

```php
createFulfillment($createCustomerOrderRequestWrapper): \Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO
```
Create Customer Order

The API is used to create customer fulfilment orders by the seller for Walmart Multichannel Solutions flow.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$createCustomerOrderRequestWrapper = {"header":{"headerAttributes":{"buId":"0","martId":"202"}},"payload":{"orderChannelId":"Enter the orderChannelId","sellerOrderId":"Enter a unique orderId","orderPlacedTime":"Enter order placed time, format : 2022-03-25T21:58:30.143Z","needsConfirmation":false,"partialFulfillments":false,"customer":{"contact":{"name":{"firstName":"Enter Customer firstName","lastName":"Enter Customer lastName"},"phone":"Enter Customer phone number","email":"Enter Customer email"}},"orderItems":[{"sellerLineId":"1, increment for the next line","fulfillmentType":"DELIVERY","shippingMethod":"EXPEDITED","itemDetail":{"sku":"Enter sku of the item","description":"Enter item description"},"qty":{"unitOfMeasure":"EACH","measurementValue":2},"shippingTo":{"contact":{"name":{"firstName":"Enter delivery info : firstName","lastName":"Enter delivery info : lastName"},"phone":"Enter delivery info : phone number"},"address":{"line1":"Enter delivery address line1","line2":"Enter delivery address line2","city":"Enter delivery city","state":"Enter delivery state","country":"USA","zip":"Enter delivery zip code","addressType":"RESIDENTIAL"}},"chargeDetails":[{"chargeCategory":"PRODUCT","chargeName":"Sale Price","chargePerUnit":{"currencyAmount":0,"currencyUnit":"USD"},"taxDetails":{"taxPerLine":{"currencyAmount":0,"currencyUnit":"USD"}}}]}]}}; // \Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper | Request fields

try {
    $result = $api->createFulfillment($createCustomerOrderRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createFulfillment: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createCustomerOrderRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper**](../../../Models/MP/US/Fulfillment/CreateCustomerOrderRequestWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO**](../../../Models/MP/US/Fulfillment/CustomerOrderResponseWrapperDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createInboundShipmentLabel()`

```php
createInboundShipmentLabel($shipmentId): string
```
Create Inbound Shipment label (deprecated)

The purpose of this service is to generate WFS shipping labels in pdf format for receiving purpose. Please note this is not a carrier label; these labels are required for the FC to identify the Inbound Order and Shipment ID they are receiving against. After requesting the shipping label, sellers must work with warehouse/ supplier to follow these steps before sending any Shipments to WFS FCs:  1.  Print the WFS shipping label. 2.  Fill out the FILL OUT section based on seller’s packing situation. For example, if a seller plans to ship 3 boxes to the WFS fulfillment center, print out 3 labels and fill out BOX 1 of 3, 2 of 3, and 3 of 3 in the FILL OUT section. 3.  Circle one shipment type in the CIRCLE ONE section. For example, if there are different SKUs in the box, circle MIXED SKUS in the CIRCLE ONE section. 4.  Affix the WFS shipping labels to the boxes/ pallets.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying inbound shipment

try {
    $result = $api->createInboundShipmentLabel($shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createInboundShipmentLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying inbound shipment | |


### Return type

**string**

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createInboundShipmentLabelV2()`

```php
createInboundShipmentLabelV2($labelV2RequestWrapper): string
```
Create Inbound Shipment label

The purpose of this service is to generate WFS Receiving Labels in various formats for receiving purposes. Please note this is not a carrier label; these labels are required for the FC to identify the Inbound Order and Shipment ID they are receiving against.Receiving labels are customizable:  1. 3 size and format options are available to choose from through the LabelSize and LabelFormat fields:   - 4 in. x 6 in. (PDF).   - 4 in. x 3 1/3 in. (PDF).   - 4 in. x 6 in. (ZPL). 2. Provide the type of the label (box or pallet) in the LoadType field and the number of the labels needed in the Count field. 3. Print the WFS receiving label. 4. Affix the WFS receiving labels to the boxes/ pallets.  If none of the above optional inputs are provided, a blank 4 in. x 6 in. PDF format label will be generated. Sellers must work with the warehouse/supplier to provide the required details before sending any Shipments to WFS FCs: 1. Print the WFS receiving label. 2. Fill out the FILL OUT section based on the seller’s packing situation. For example, if a seller plans to ship 3 boxes to the WFS fulfillment center, print out 3 labels and fill out BOX 1 of 3, 2 of 3, and 3 of 3 in the FILL OUT section. 3. Circle one shipment type in the CIRCLE ONE section. For example, if there are different SKUs in the box, circle MIXED SKUS in the CIRCLE ONE section. 4. Affix the WFS receiving labels to the boxes/ pallets.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$labelV2RequestWrapper = new \Walmart\Models\MP\US\Fulfillment\LabelV2RequestWrapper(); // \Walmart\Models\MP\US\Fulfillment\LabelV2RequestWrapper | Request fields

try {
    $result = $api->createInboundShipmentLabelV2($labelV2RequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createInboundShipmentLabelV2: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **labelV2RequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\LabelV2RequestWrapper**](../../../Models/MP/US/Fulfillment/LabelV2RequestWrapper.md)| Request fields | |


### Return type

**string**

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `createShipment()`

```php
createShipment($inboundShipmentRequestWrapper): \Walmart\Models\MP\US\Fulfillment\InboundShipmentCreateResponseWrapperDTO
```
Create Inbound Shipment

Once you’ve converted items to WFS, you are ready to start shipping items inbound to Walmart. To do this, you will submit an Inbound shipment request. The Inbound shipment details when you expect to ship product, as well as the items and quantities which will be shipped.  Each shipment you send in to WFS should have a corresponding Inbound shipment . In this case, a shipment would be considered a direct truckload, LTL shipment, or set of items shipped via parcel on a given day.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$inboundShipmentRequestWrapper = {"inboundOrderId":"8778881015027","inboundServices":{"inventoryTransferService":"Y"},"returnAddress":{"addressLine1":"860 W California Ave","addressLine2":"","city":"Sunnyvale","stateCode":"CA","countryCode":"USA","postalCode":"94086"},"orderItems":[{"productId":"00894147009695","productType":"GTIN","sku":"WILL-SL969","itemDesc":"Blue jeans","itemQty":10,"vendorPackQty":10,"innerPackQty":1,"expectedDeliveryDate":"2020-11-21T00:00:00.000Z"}]}; // \Walmart\Models\MP\US\Fulfillment\InboundShipmentRequestWrapper | Request fields

try {
    $result = $api->createShipment($inboundShipmentRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->createShipment: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inboundShipmentRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\InboundShipmentRequestWrapper**](../../../Models/MP/US/Fulfillment/InboundShipmentRequestWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\InboundShipmentCreateResponseWrapperDTO**](../../../Models/MP/US/Fulfillment/InboundShipmentCreateResponseWrapperDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getCarrierRateQuote()`

```php
getCarrierRateQuote($shipmentId, $mode): \Walmart\Models\MP\US\Fulfillment\GetRateQuoteInfoResponseWrapper
```
Get Carrier Rate Quote

The purpose of this service is to get the carrier rate quotes for WFS Preferred Carrier Program - FedEx parcel solution, when inbounding seller items from seller pickup point to Walmart fulfillment centers.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.
$mode = 'mode_example'; // string | Shipment type.

try {
    $result = $api->getCarrierRateQuote($shipmentId, $mode);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getCarrierRateQuote: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying each shipment. | |
| **mode** | **string**| Shipment type. | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\GetRateQuoteInfoResponseWrapper**](../../../Models/MP/US/Fulfillment/GetRateQuoteInfoResponseWrapper.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getFulfillmentOrdersStatus()`

```php
getFulfillmentOrdersStatus($orgId, $limit, $offset, $orderNumber, $trackingNumber, $shipmentNumber, $fromOrderDate, $toOrderDate, $sortOrder, $sortBy): \Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO
```
Get fulfillment orders status

The API provides the list of customer fulfillment orders with corresponding details.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

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
    $result = $api->getFulfillmentOrdersStatus($orgId, $limit, $offset, $orderNumber, $trackingNumber, $shipmentNumber, $fromOrderDate, $toOrderDate, $sortOrder, $sortBy);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getFulfillmentOrdersStatus: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
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

[**\Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO**](../../../Models/MP/US/Fulfillment/CustomerOrderResponseWrapperDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getInboundOrderErrors()`

```php
getInboundOrderErrors($offset, $limit, $shipmentId): \Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper
```
Get Inbound Shipment errors

After Sellers request to create an Inbound Order, WFS may return error responses with error codes. Type of errors:  -  SKUs not in WFS catalog: Sellers need to make sure all SKUs have already been converted and added to the WFS catalog -  Missing required information;  -  Invalid Product ID (incorrect number of digits);  -  Duplicated Inbound Order ID: Inbound Order ID has already been used before -  Duplicated Product IDs Most of these errors can be prevented with a robust API integration that does not allow the mistakes to be made. Seller should update the request based on the error message and re-submit the request. Please note, once the Inbound Order is created successfully after the re-submission, historical errors under the same Inbound Order ID will be removed and no longer accessible.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$offset = '0'; // string | offset is the number of records you wish to skip before selecting records.
$limit = '10'; // string | The number of Purchase Orders to be returned.
$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.

try {
    $result = $api->getInboundOrderErrors($offset, $limit, $shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInboundOrderErrors: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **string**| offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| The number of Purchase Orders to be returned. | [optional] [default to '10'] |
| **shipmentId** | **string**| Unique ID identifying each shipment. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper**](../../../Models/MP/US/Fulfillment/InventoryLogResponseWrapper.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getInboundShipmentItems()`

```php
getInboundShipmentItems($offset, $limit, $shipmentId): \Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper
```
Get Inbound Shipment Items

After Sellers create an Inbound Order successfully, the response from Create Inbound Shipments API will tell whether the order can be sent in a single shipment to one WFS fulfillment center or needs to be split into multiple shipments to different fulfillment centers.  To retrieve the Shipment level info, please call the Get Inbound Shipments API and to get what needs to be in a specific shipment and SKU level receipt situation, please call the Get Inbound Shipment Items API

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$offset = '0'; // string | offset is the number of records you wish to skip before selecting records.
$limit = '10'; // string | The number of Purchase Orders to be returned.
$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.

try {
    $result = $api->getInboundShipmentItems($offset, $limit, $shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInboundShipmentItems: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **string**| offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| The number of Purchase Orders to be returned. | [optional] [default to '10'] |
| **shipmentId** | **string**| Unique ID identifying each shipment. | [optional] |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper**](../../../Models/MP/US/Fulfillment/InventoryLogResponseWrapper.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getInboundShipments()`

```php
getInboundShipments($offset, $limit, $inboundOrderId, $shipmentId, $status, $fromCreateDate, $toCreateDate): \Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper
```
Get Shipments

After Sellers create an Inbound Order successfully, the response from Create Inbound Shipments API will tell whether the order can be sent in a single shipment to one WFS fulfillment center or needs to be split into multiple shipments to different fulfillment centers. To retrieve the Shipment level info, please call the Get Inbound Shipments API

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$offset = '0'; // string | offset is the number of records you wish to skip before selecting records.
$limit = '10'; // string | The number of Purchase Orders to be returned.
$inboundOrderId = 'inboundOrderId_example'; // string | Unique ID identifying inbound shipment request.
$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.
$status = 'status_example'; // string | Current shipment status
$fromCreateDate = 'fromCreateDate_example'; // string | Shipment create date starting range
$toCreateDate = 'toCreateDate_example'; // string | Shipment create date starting  end range

try {
    $result = $api->getInboundShipments($offset, $limit, $inboundOrderId, $shipmentId, $status, $fromCreateDate, $toCreateDate);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInboundShipments: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **offset** | **string**| offset is the number of records you wish to skip before selecting records. | [optional] [default to '0'] |
| **limit** | **string**| The number of Purchase Orders to be returned. | [optional] [default to '10'] |
| **inboundOrderId** | **string**| Unique ID identifying inbound shipment request. | [optional] |
| **shipmentId** | **string**| Unique ID identifying each shipment. | [optional] |
| **status** | **string**| Current shipment status | [optional] |
| **fromCreateDate** | **string**| Shipment create date starting range | [optional] |
| **toCreateDate** | **string**| Shipment create date starting  end range | [optional] |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper**](../../../Models/MP/US/Fulfillment/InventoryLogResponseWrapper.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getInventoryHealthReport()`

```php
getInventoryHealthReport(): string
```
Get WFS Inventory Health Report

Returns all the information associated with Seller's items that are set up on Walmart Fulfillment Services (WFS) platform.

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
]);

$api = Walmart::marketplace($config)->fulfillment();


try {
    $result = $api->getInventoryHealthReport();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getInventoryHealthReport: {$e->getMessage()}\n";
}
```

### Parameters
This endpoint does not need any parameter.


### Return type

**string**

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `getWFSInventoryLog()`

```php
getWFSInventoryLog($gtin, $shipmentId, $transactionType, $transactionLocation, $startDate, $endDate, $sortBy, $sortOrder, $offset, $limit): \Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper
```
Get Inventory Log for a WFS item

Returns activity log for any Seller's item that is stored in Walmart Fulfillment Centers (WFS) platform.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

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
    $result = $api->getWFSInventoryLog($gtin, $shipmentId, $transactionType, $transactionLocation, $startDate, $endDate, $sortBy, $sortOrder, $offset, $limit);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->getWFSInventoryLog: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
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

[**\Walmart\Models\MP\US\Fulfillment\InventoryLogResponseWrapper**](../../../Models/MP/US/Fulfillment/InventoryLogResponseWrapper.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `inboundPreview()`

```php
inboundPreview($createCustomerOrderRequestWrapper): \Walmart\Models\MP\US\Fulfillment\InboundShipmentCreateResponseWrapperDTO
```
Fetch Inbound Preview

The purpose of this service is to give a preview of the estimated Inventory Transfer Service cost and shipment destinations between ITS and self-distribution.  Note: This API is only available to sellers eligible for the Inventory Transfer Service.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$createCustomerOrderRequestWrapper = {"header":{"headerAttributes":{"buId":"0","martId":"0"}},"payload":{"inboundOrderId":"WFS_P132398111-ITS1011","returnAddress":{"addressLine1":"860 W California Ave","addressLine2":"","city":"Sunnyvale","stateCode":"CA","countryCode":"US","postalCode":"94086"},"orderItems":[{"productId":"06484856148873","productType":"GTIN","sku":"SKU-06476211912694","itemDesc":"tennis ball","itemQty":5,"vendorPackQty":5,"innerPackQty":1,"expectedDeliveryDate":"2023-05-25T15:33:33-07:00","addOnServices":[{"serviceType":"LABEL"}]}]}}; // \Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper | Request fields

try {
    $result = $api->inboundPreview($createCustomerOrderRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->inboundPreview: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createCustomerOrderRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper**](../../../Models/MP/US/Fulfillment/CreateCustomerOrderRequestWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\InboundShipmentCreateResponseWrapperDTO**](../../../Models/MP/US/Fulfillment/InboundShipmentCreateResponseWrapperDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `printCarrierLabel()`

```php
printCarrierLabel($shipmentId, $carrierLabelRequestWrapper): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Print Carrier Label

The purpose of this service is for sellers to print carrier shipping label.   To print carrier shipping label, please first specify a Ship Date. Note, carrier allows to select a ship date 10 days in advance.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.
$carrierLabelRequestWrapper = new \Walmart\Models\MP\US\Fulfillment\CarrierLabelRequestWrapper(); // \Walmart\Models\MP\US\Fulfillment\CarrierLabelRequestWrapper

try {
    $result = $api->printCarrierLabel($shipmentId, $carrierLabelRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->printCarrierLabel: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying each shipment. | |
| **carrierLabelRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\CarrierLabelRequestWrapper**](../../../Models/MP/US/Fulfillment/CarrierLabelRequestWrapper.md)|  | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `promiseFulfillments()`

```php
promiseFulfillments($createCustomerOrderRequestWrapper): \Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO
```
Fetch Delivery Promise Details

This request provides fulfillment and delivery promise information for all valid item/offer to seller.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$createCustomerOrderRequestWrapper = {"header":{"headerAttributes":{"martId":"202","buId":"0"}},"payload":{"requestId":"dcd127e2-c944-4a40-ac88-d1058c73e33e","destinations":[{"address":{"city":"Milpitas","addressType":"RESIDENTIAL","postalCode":"95035","addressLineOne":"261 Odyssey Ln","addressLineTwo":"222","isPOBox":false,"countryCode":"US","stateCode":"CA"},"fulfillmentType":"DELIVERY"}],"offerSelections":[{"offers":[{"sku":"OMP-B01-L","lineId":"249ac8e1-e6c2-4806-81a5-54215eb16b00","salesUnit":"Each","requestedQuantity":{"measurementValue":1,"unitOfMeasure":"EA"}}]}]}}; // \Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper | Request fields

try {
    $result = $api->promiseFulfillments($createCustomerOrderRequestWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->promiseFulfillments: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createCustomerOrderRequestWrapper** | [**\Walmart\Models\MP\US\Fulfillment\CreateCustomerOrderRequestWrapper**](../../../Models/MP/US/Fulfillment/CreateCustomerOrderRequestWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\CustomerOrderResponseWrapperDTO**](../../../Models/MP/US/Fulfillment/CustomerOrderResponseWrapperDTO.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateShipmentQuantity()`

```php
updateShipmentQuantity($inboundShipmentUpdateQtyWrapper): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Update Shipment Quantities

Seller can modify the shipment quantity before the Shipment arrives at the WFS FCs. Seller cannot modify the shipment quantity when Shipment Status = Receiving in Progress, Closed, and Cancelled.   Seller will need to provide new quantities for each SKU to update. Seller will only be able to add up to 6 units per SKU but can reduce to 0 units to remove any SKU from a shipment. Seller cannot change all SKUs’ quantity to 0 – they must cancel the entire Inbound Order.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$inboundShipmentUpdateQtyWrapper = {"inboundOrderId":"123543","shipmentId":"1234","orderItems":[{"sku":"WILL-SL969","updatedShipmentQty":11}]}; // \Walmart\Models\MP\US\Fulfillment\InboundShipmentUpdateQtyWrapper | Request fields

try {
    $result = $api->updateShipmentQuantity($inboundShipmentUpdateQtyWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->updateShipmentQuantity: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **inboundShipmentUpdateQtyWrapper** | [**\Walmart\Models\MP\US\Fulfillment\InboundShipmentUpdateQtyWrapper**](../../../Models/MP/US/Fulfillment/InboundShipmentUpdateQtyWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `updateShipmentTrackingDetails()`

```php
updateShipmentTrackingDetails($trackingInfoWrapper): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Update Shipment Tracking

The purpose of this service is to capture tracking information from sellers. For small parcel shipments, sellers must provide the tracking info including carrier name and tracking numbers. WFS will use the data to capture updated expected delivery date to adjust the fulfillment inbound capacity to avoid any receiving delays.  Seller will also be able to view the updated expected delivery date through the Seller Center UI or calling the Get Inbound Shipment Items API.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$trackingInfoWrapper = {"shipmentId":"12345","carrierName":"UPS","trackingInfo":["123","456-1","789-2"]}; // \Walmart\Models\MP\US\Fulfillment\TrackingInfoWrapper | Request fields

try {
    $result = $api->updateShipmentTrackingDetails($trackingInfoWrapper);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->updateShipmentTrackingDetails: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **trackingInfoWrapper** | [**\Walmart\Models\MP\US\Fulfillment\TrackingInfoWrapper**](../../../Models/MP/US/Fulfillment/TrackingInfoWrapper.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `voidCarrierRateQuote()`

```php
voidCarrierRateQuote($shipmentId): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Cancel Carrier Rate Quote

The purpose of this service is for seller to void the carrier shipping charges, within 24 hours after the estimated carrier charges have been accepted by the seller.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$shipmentId = 'shipmentId_example'; // string | Unique ID identifying each shipment.

try {
    $result = $api->voidCarrierRateQuote($shipmentId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->voidCarrierRateQuote: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **shipmentId** | **string**| Unique ID identifying each shipment. | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)

## `wercsFeedback()`

```php
wercsFeedback($accept, $wercsFeedbackRequest): \Walmart\Models\MP\US\Fulfillment\ServiceResponse
```
Hazmat Items On hold

Use this API to see a list of items that are on hold for hazmat compliance review, including items with an In Review, Action Needed, and Prohibited status. Also use this API to review your Action Needed error descriptions and understand how to correct them for further assessment.

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
]);

$api = Walmart::marketplace($config)->fulfillment();

$accept = application/json; // string | Only supported Media Type : application/json
$wercsFeedbackRequest = {"query":{"field":"gtin","value":"06154035330299"},"filters":[{"field":"status","op":"equals","values":["PROHIBITED","IN_REVIEW","ACTION_NEEDED"]}],"sort":{"field":"updatedAt","order":"DESC"}}; // \Walmart\Models\MP\US\Fulfillment\WercsFeedbackRequest | Request fields

try {
    $result = $api->wercsFeedback($accept, $wercsFeedbackRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling FulfillmentApi->wercsFeedback: {$e->getMessage()}\n";
}
```

### Parameters
| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accept** | **string**| Only supported Media Type : application/json | |
| **wercsFeedbackRequest** | [**\Walmart\Models\MP\US\Fulfillment\WercsFeedbackRequest**](../../../Models/MP/US/Fulfillment/WercsFeedbackRequest.md)| Request fields | |


### Return type

[**\Walmart\Models\MP\US\Fulfillment\ServiceResponse**](../../../Models/MP/US/Fulfillment/ServiceResponse.md)

### Authorization

This endpoint requires the following authorization methods:

* `accessTokenScheme`: Header authentication with a Walmart access token, which is automatically generated using your Client ID and Client Secret. The token is valid for 15 minutes, and will be passed in the WM_SEC.ACCESS_TOKEN header

See the [Authorization](../../../../README.md#authorization) section of the README for more information.


[[Back to top]](#) [[Back to API list]](../../../../README.md#supported-apis)
[[Back to Model list]](../../../Models/MP/US)
[[Back to README]](../../../../README.md)
