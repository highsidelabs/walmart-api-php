# #US\DSV\PartnerFeedResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**errors** | [**\Walmart\Model\DSV\US\Feeds\GetAllFeedStatuses200ResponseErrorsInner[]**](GetAllFeedStatuses200ResponseErrorsInner.md) |  | [optional]
**feedId** | **string** | A unique ID used for tracking the Feed File | [optional]
**feedStatus** | **string** | Can be one of the following: RECEIVED, INPROGRESS, PROCESSED, or ERROR | [optional]
**ingestionErrors** | [**\Walmart\Model\DSV\US\Feeds\GetFeedItemStatus200ResponseIngestionErrors**](GetFeedItemStatus200ResponseIngestionErrors.md) |  | [optional]
**itemsReceived** | **int** | The number of items received in the feed | [optional]
**itemsSucceeded** | **int** | The number of items in the feed that processed successfully | [optional]
**itemsFailed** | **int** | The number of items in the feed that failed due to a data or system error | [optional]
**itemsProcessing** | **int** | The number of items in the feed that are still processing | [optional]
**offset** | **int** | The object response to the starting number, where 0 is the first entity available for request | [optional]
**limit** | **int** | The number of items returned. Cannot be greater than 1000. | [optional]
**itemDetails** | [**\Walmart\Model\DSV\US\Feeds\GetFeedItemStatus200ResponseItemDetails**](GetFeedItemStatus200ResponseItemDetails.md) |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/DSV) [[Back to README]](../../README.md)
