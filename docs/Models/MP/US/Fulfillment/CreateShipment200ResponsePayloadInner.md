# Walmart\Models\MP\US\Fulfillment\CreateShipment200ResponsePayloadInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipmentId** | **string** | Unique ID identifying each shipment | [optional]
**shipToAddress** | [**\Walmart\Models\MP\US\Fulfillment\GetInboundShipments200ResponsePayloadInnerShipToAddress**](GetInboundShipments200ResponsePayloadInnerShipToAddress.md) |  | [optional]
**shipmentItems** | [**\Walmart\Models\MP\US\Fulfillment\CreateShipment200ResponsePayloadInnerShipmentItemsInner[]**](CreateShipment200ResponsePayloadInnerShipmentItemsInner.md) | The items which needs to be send in the shipment | [optional]
**expectedDeliveryDate** | **\DateTime** | expected delivery date for inbounding shipment. Can be different from provided in the rquest based on network capacity | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
