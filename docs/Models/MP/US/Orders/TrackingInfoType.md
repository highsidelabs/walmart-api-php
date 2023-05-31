# Walmart\Models\MP\US\Orders\TrackingInfoType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipDateTime** | **int** | The date the package was shipped |
**carrierName** | [**\Walmart\Models\MP\US\Orders\CarrierNameType**](CarrierNameType.md) |  |
**methodCode** | **string** | The shipping method. Can be one of the following: Standard, Express, OneDay, WhiteGlove, Value or Freight |
**trackingNumber** | **string** | The shipment tracking number |
**trackingURL** | **string** | The URL for tracking the shipment. This parameter is mandatory if the otherCarrier parameter is used | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
