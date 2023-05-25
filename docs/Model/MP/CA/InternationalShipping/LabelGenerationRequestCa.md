# #CA\MP\LabelGenerationRequestCa

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**packageType** | **string** | Package Type. Supported Package Types are - 'CUSTOM_PACKAGE', 'FEDEX_ENVELOPE', 'FEDEX_PAK' |
**boxDimensions** | [**\Walmart\Model\MP\CA\InternationalShipping\CreateLabelRequestBoxDimensions**](CreateLabelRequestBoxDimensions.md) |  |
**boxItems** | [**\Walmart\Model\MP\CA\InternationalShipping\CreateLabelRequestBoxItemsInner[]**](CreateLabelRequestBoxItemsInner.md) | Box Items |
**fromAddress** | [**\Walmart\Model\MP\CA\InternationalShipping\CreateLabelRequestFromAddress**](CreateLabelRequestFromAddress.md) |  |
**purchaseOrderId** | **string** | Purchase Order Id |
**carrierName** | **string** | Carrier Name. For now, supported carriers are - 'FedEx' and 'PUROLATOR' |
**carrierServiceType** | **string** | Carrier Service Type. For now, supported values for FedEx are - 'FEDEX_INTERNATIONAL_PRIORITY' for fedExPak/fedExEnvelope package types, 'FEDEX_INTERNATIONAL_ECONOMY' and 'FEDEX_INTERNATIONAL_GROUND'. Not required for PUROLATOR. | [optional]
**labelSize** | **string** | Label Size e.g. A6, LETTER_SIZE or A4 for PDF response | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/CA/MP) [[Back to README]](../../README.md)
