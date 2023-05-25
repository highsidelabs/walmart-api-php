# #US\MP\ShipmentItemDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**inboundOrderId** | **string** | Unique ID identifying inbound shipment request | [optional]
**shipmentId** | **string** | Unique ID identifying each shipment | [optional]
**gtin** | **string** | Item barcode | [optional]
**sku** | **string** | Seller Item ID | [optional]
**itemDesc** | **string** | Item description | [optional]
**itemQty** | **int** | Total number of sellable units | [optional]
**vendorPackQty** | **int** | Total number of cases | [optional]
**innerPackQty** | **int** | Total number of sellable units per case | [optional]
**receivedQty** | **int** | Qty received in FC | [optional]
**damagedQty** | **int** | Qty damaged while receiving in FC | [optional]
**fillRate** | **float** | Fill rate for this shipment item | [optional]
**expectedDeliveryDate** | **\DateTime** | expected delivery date provided by seller | [optional]
**updatedExpectedDeliveryDate** | **\DateTime** | update expected delivery date based on network capacity | [optional]
**shipNodeName** | **string** | FC name | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
