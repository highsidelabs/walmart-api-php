# Walmart\Models\MP\US\Fulfillment\InboundShipmentCreateResponseWrapper

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipmentId** | **string** | Unique ID identifying each shipment | [optional]
**shipToAddress** | [**\Walmart\Models\MP\US\Fulfillment\ShipToAddress**](ShipToAddress.md) |  | [optional]
**shipmentItems** | [**\Walmart\Models\MP\US\Fulfillment\ShipmentItem[]**](ShipmentItem.md) | The items which needs to be send in the shipment | [optional]
**expectedDeliveryDate** | **\DateTime** | expected delivery date for inbounding shipment. Can be different from provided in the rquest based on network capacity | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
