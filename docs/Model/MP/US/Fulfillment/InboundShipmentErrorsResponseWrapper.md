# #US\MP\InboundShipmentErrorsResponseWrapper

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**inboundOrderId** | **string** | Unique ID identifying inbound shipment requests | [optional]
**createdDate** | **\DateTime** | created date for the request | [optional]
**returnAddress** | [**\Walmart\Model\MP\US\Fulfillment\GetInboundShipments200ResponsePayloadInnerReturnAddress**](GetInboundShipments200ResponsePayloadInnerReturnAddress.md) |  | [optional]
**orderItems** | [**\Walmart\Model\MP\US\Fulfillment\CreateFulfillmentRequestPayloadOrderItemsInner[]**](CreateFulfillmentRequestPayloadOrderItemsInner.md) | inbound shipment request line items | [optional]
**errors** | [**\Walmart\Model\MP\US\Fulfillment\UpdateShipmentQuantity200ResponseErrorsInner[]**](UpdateShipmentQuantity200ResponseErrorsInner.md) | Error in inbound shipment creation | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
