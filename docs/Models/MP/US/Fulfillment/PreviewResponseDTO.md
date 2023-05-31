# Walmart\Models\MP\US\Fulfillment\PreviewResponseDTO

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipNode** | **string** | Ship Node | [optional]
**isSortable** | **bool** | Flag indicating if the dimensions of the item make it sortable | [optional]
**isNonSortable** | **bool** | Flag indicating if the dimensions of the item make it non-sortable | [optional]
**nodeType** | **string** | Node Type: FC/ICC | [optional]
**shipToAddress** | [**\Walmart\Models\MP\US\Fulfillment\ShipToAddress**](ShipToAddress.md) |  | [optional]
**totalNetTransferCharge** | **float** | Total charge if you are using ITS. | [optional]
**currencyUnit** | **string** | Currency in which transfer charge is estimated | [optional]
**shipmentItems** | [**\Walmart\Models\MP\US\Fulfillment\PreviewShipmentItem[]**](PreviewShipmentItem.md) | Shipment items | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
