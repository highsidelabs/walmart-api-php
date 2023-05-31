# Walmart\Models\MP\CA\InternationalShipping\LabelGenerationRequestCa

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**packageType** | **string** | Package Type. Supported Package Types are - 'CUSTOM_PACKAGE', 'FEDEX_ENVELOPE', 'FEDEX_PAK' |
**boxDimensions** | [**\Walmart\Models\MP\CA\InternationalShipping\BoxDimensions**](BoxDimensions.md) |  |
**boxItems** | [**\Walmart\Models\MP\CA\InternationalShipping\CABoxItem[]**](CABoxItem.md) | Box Items |
**fromAddress** | [**\Walmart\Models\MP\CA\InternationalShipping\Address**](Address.md) |  |
**purchaseOrderId** | **string** | Purchase Order Id |
**carrierName** | **string** | Carrier Name. For now, supported carriers are - 'FedEx' and 'PUROLATOR' |
**carrierServiceType** | **string** | Carrier Service Type. For now, supported values for FedEx are - 'FEDEX_INTERNATIONAL_PRIORITY' for fedExPak/fedExEnvelope package types, 'FEDEX_INTERNATIONAL_ECONOMY' and 'FEDEX_INTERNATIONAL_GROUND'. Not required for PUROLATOR. | [optional]
**labelSize** | **string** | Label Size e.g. A6, LETTER_SIZE or A4 for PDF response | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
