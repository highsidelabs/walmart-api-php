# Walmart\Models\MP\US\Reviews\FilterRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**itemStatus** | **string** | | Attribute | Description | Data Type | | --- | ----------- | ------- | | ELIGIBLE | To get items which are eligible for the program | string | | ENROLLED | To get items which are currently enrolled into the program | string | | COMPLETE | To get items which have attained target reviews through the program | string | |
**dateRange** | **string** | Date range to filter impressions, page views and sales. | [optional] [default to '7DAYS']
**category** | **string** | Category of the items. | [optional]
**price** | [**\Walmart\Models\MP\US\Reviews\PriceRequest**](PriceRequest.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
