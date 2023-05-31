# Walmart\Models\MP\US\Fulfillment\GetInboundOrderErrors200ResponsePayloadInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**inboundOrderId** | **string** | Unique ID identifying inbound shipment requests | [optional]
**createdDate** | **\DateTime** | created date for the request | [optional]
**returnAddress** | [**\Walmart\Models\MP\US\Fulfillment\GetInboundShipments200ResponsePayloadInnerReturnAddress**](GetInboundShipments200ResponsePayloadInnerReturnAddress.md) |  | [optional]
**orderItems** | [**\Walmart\Models\MP\US\Fulfillment\CreateFulfillmentRequestPayloadOrderItemsInner[]**](CreateFulfillmentRequestPayloadOrderItemsInner.md) | inbound shipment request line items | [optional]
**errors** | [**\Walmart\Models\MP\US\Fulfillment\UpdateShipmentQuantity200ResponseErrorsInner[]**](UpdateShipmentQuantity200ResponseErrorsInner.md) | Error in inbound shipment creation | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
