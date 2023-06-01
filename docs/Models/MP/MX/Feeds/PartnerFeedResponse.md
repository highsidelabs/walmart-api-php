# Walmart\Models\MP\MX\Feeds\PartnerFeedResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**errors** | [**\Walmart\Models\MP\MX\Feeds\GatewayError[]**](GatewayError.md) |  | [optional]
**feedId** | **string** | A unique ID used for tracking the Feed File | [optional]
**feedStatus** | **string** | Can be one of the following: RECEIVED, INPROGRESS, PROCESSED, or ERROR | [optional]
**ingestionErrors** | [**\Walmart\Models\MP\MX\Feeds\IngestionErrors**](IngestionErrors.md) |  | [optional]
**itemsReceived** | **int** | The number of items received in the feed | [optional]
**itemsSucceeded** | **int** | The number of items in the feed that processed successfully | [optional]
**itemsFailed** | **int** | The number of items in the feed that failed due to a data or system error | [optional]
**itemsProcessing** | **int** | The number of items in the feed that are still processing | [optional]
**offset** | **int** | The object response to the starting number, where 0 is the first entity available for request | [optional]
**limit** | **int** | The number of items returned. Cannot be greater than 1000. | [optional]
**itemDetails** | [**\Walmart\Models\MP\MX\Feeds\ItemDetails**](ItemDetails.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
