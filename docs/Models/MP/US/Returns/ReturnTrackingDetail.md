# Walmart\Models\MP\US\Returns\ReturnTrackingDetail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**sequenceNo** | **int** | The stage the return is in. (e.g., '1' is an initiated return) | [optional]
**eventTag** | **string** | The last completed return event. (e.g., 'RETURN_IN_TRANSIT') | [optional]
**eventDescription** | **string** | Description of current return status event. (e.g., 'A MARKET_PLACE Return in Transit') | [optional]
**eventTime** | **\DateTime** | Timestamp of listed event | [optional]
**references** | [**\Walmart\Models\MP\US\Returns\ChargeTotal[]**](ChargeTotal.md) | Used only for 1P | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
