# Walmart\Models\MP\US\Fulfillment\ShipmentPlanDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**inboundOrderId** | **string** | Unique ID identifying inbound shipment request | [optional]
**shipmentId** | **string** | Unique ID identifying inbound shipment | [optional]
**shipToAddress** | [**\Walmart\Models\MP\US\Fulfillment\ShipToAddress**](ShipToAddress.md) |  | [optional]
**returnAddress** | [**\Walmart\Models\MP\US\Fulfillment\ReturnAddress**](ReturnAddress.md) |  | [optional]
**status** | **string** | Current status of the shipment | [optional]
**createdDate** | **\DateTime** | creation date for shipment | [optional]
**shipmentUnits** | **int** | Total number of units in the shipment | [optional]
**receivedUnits** | **int** | Total number of units recived in FC for the shipment | [optional]
**expectedDeliveryDate** | **\DateTime** | expected delivery date provided by seller | [optional]
**updatedExpectedDeliveryDate** | **\DateTime** | update expected delivery date based on network capacity | [optional]
**actualDeliveryDate** | **\DateTime** | Actual delivery date of the shipment at FC | [optional]
**trackingNo** | **string[]** | Tracking info for the shipment | [optional]
**carrierName** | **string** | Carrier of the shipment | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
