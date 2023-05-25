# #US\MP\ShippingUpdatesRequestOrderShipmentOrderLinesOrderLineInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**lineNumber** | **string** | The line number associated with the details for each individual item in the purchase order |
**intentToCancelOverride** | **bool** | Needs to be passed as true during shipping as an acknowledgment for orders which are intent to cancel by the customer | [optional] [default to false]
**sellerOrderId** | **string** | A unique ID associated with the sales order for specified Seller; gives Sellers the ability to print their own custom order ID on the return label; limit of 30 characters |
**orderLineStatuses** | [**\Walmart\Model\MP\US\Orders\ShippingUpdatesRequestOrderShipmentOrderLinesOrderLineInnerOrderLineStatuses**](ShippingUpdatesRequestOrderShipmentOrderLinesOrderLineInnerOrderLineStatuses.md) |  |
**sellerOrderNo** | **string** |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
