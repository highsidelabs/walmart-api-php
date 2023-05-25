# #US\WS\GetAllFeedStatuses200ResponseResultsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**feedId** | **string** | A unique ID used for tracking the Feed File | [optional]
**feedSource** | **string** | The source of the feed | [optional]
**feedType** | **string** | The feed type | [optional]
**partnerId** | **string** | The seller ID | [optional]
**itemsReceived** | **int** | The number of items received | [optional]
**itemsSucceeded** | **int** | The number of items in the feed that have successfully processed | [optional]
**itemsFailed** | **int** | The number of items in the feed that failed due to a data or system error | [optional]
**itemsProcessing** | **int** | The number of items in the feed that are still in progress | [optional]
**feedStatus** | **string** | Can be one of the following: RECEIVED, INPROGRESS, PROCESSED, or ERROR. For details, see the definitions listed under 'Feed Statuses' at the beginning of this section. | [optional]
**feedDate** | **\DateTime** | The date and time the feed was submitted. Format: yyyymmddThh:mm:ss.xxxz | [optional]
**batchId** | **string** | The batch ID for the feed, if provided | [optional]
**modifiedDtm** | **\DateTime** | The most recent time the feed was modified. Format: yyyymmddThh:mm:ss.xxxz | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/WS) [[Back to README]](../../README.md)
