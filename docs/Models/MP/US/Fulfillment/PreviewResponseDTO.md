# #US\MP\PreviewResponseDTO

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipNode** | **string** | Ship Node | [optional]
**isSortable** | **bool** | Flag indicating if the dimensions of the item make it sortable | [optional]
**isNonSortable** | **bool** | Flag indicating if the dimensions of the item make it non-sortable | [optional]
**nodeType** | **string** | Node Type: FC/ICC | [optional]
**shipToAddress** | [**\Walmart\Model\MP\US\Fulfillment\GetInboundShipments200ResponsePayloadInnerShipToAddress**](GetInboundShipments200ResponsePayloadInnerShipToAddress.md) |  | [optional]
**totalNetTransferCharge** | **float** | Total charge if you are using ITS. | [optional]
**currencyUnit** | **string** | Currency in which transfer charge is estimated | [optional]
**shipmentItems** | [**\Walmart\Model\MP\US\Fulfillment\InboundPreview200ResponsePayloadInnerPreviewsInnerPreviewInnerShipmentItemsInner[]**](InboundPreview200ResponsePayloadInnerPreviewsInnerPreviewInnerShipmentItemsInner.md) | Shipment items | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
