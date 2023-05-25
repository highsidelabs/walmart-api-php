# #US\MP\CreateShipment200ResponsePayloadInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipmentId** | **string** | Unique ID identifying each shipment | [optional]
**shipToAddress** | [**\Walmart\Model\MP\US\Fulfillment\GetInboundShipments200ResponsePayloadInnerShipToAddress**](GetInboundShipments200ResponsePayloadInnerShipToAddress.md) |  | [optional]
**shipmentItems** | [**\Walmart\Model\MP\US\Fulfillment\CreateShipment200ResponsePayloadInnerShipmentItemsInner[]**](CreateShipment200ResponsePayloadInnerShipmentItemsInner.md) | The items which needs to be send in the shipment | [optional]
**expectedDeliveryDate** | **\DateTime** | expected delivery date for inbounding shipment. Can be different from provided in the rquest based on network capacity | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
