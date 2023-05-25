# #US\MP\ReturnTrackingDetail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**sequenceNo** | **int** | The stage the return is in. (e.g., '1' is an initiated return) | [optional]
**eventTag** | **string** | The last completed return event. (e.g., 'RETURN_IN_TRANSIT') | [optional]
**eventDescription** | **string** | Description of current return status event. (e.g., 'A MARKET_PLACE Return in Transit') | [optional]
**eventTime** | **\DateTime** | Timestamp of listed event | [optional]
**references** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerReferencesInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerReferencesInner.md) | Used only for 1P | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
