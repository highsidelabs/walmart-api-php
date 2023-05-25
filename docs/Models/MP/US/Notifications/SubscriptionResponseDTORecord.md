# #US\MP\SubscriptionResponseDTORecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**eventType** | **string** | Event for which the subscription is created | [optional]
**subscriptionId** | **string** | Unique ID for the subscription that can be used for fetching details, editing or deleting the subscription | [optional]
**partnerId** | **string** | Partner ID of the seller who created the subscription | [optional]
**eventVersion** | **string** | Version of the event type for which the subscription is created | [optional]
**resourceName** | **string** | Delegated access scope that event type is mapped to. | [optional]
**status** | **string** | ACTIVE or INACTIVE status of the subscription | [optional]
**eventUrl** | **string** | Destination URL where notification will be received by seller | [optional]
**authDetails** | [**\Walmart\Model\MP\US\Notifications\TestNotificationRequestAuthDetails**](TestNotificationRequestAuthDetails.md) |  | [optional]
**headers** | [**\Walmart\Model\MP\US\Notifications\TestNotificationRequestHeaders**](TestNotificationRequestHeaders.md) |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
