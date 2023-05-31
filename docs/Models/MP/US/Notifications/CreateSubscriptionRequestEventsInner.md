# Walmart\Models\MP\US\Notifications\CreateSubscriptionRequestEventsInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**eventType** | **string** | Event that you want to subscribe to. For all allowed eventType(s) see Event Payload section or use GET Event Types API |
**eventVersion** | **string** | Version of the specific event type. For all eventVersion(s) for each eventType, see Event Payload section or use GET Event Types API |
**resourceName** | **string** | Delegated access scope that event type is mapped to. For all allowed resourceName(s) for each eventType, see Event Payload section or use GET Event Types API |
**eventUrl** | **string** | Destination URL where notification will be received by seller |
**authDetails** | [**\Walmart\Models\MP\US\Notifications\TestNotificationRequestAuthDetails**](TestNotificationRequestAuthDetails.md) |  | [optional]
**headers** | [**\Walmart\Models\MP\US\Notifications\TestNotificationRequestHeaders**](TestNotificationRequestHeaders.md) |  | [optional]
**status** | **string** | Status of the subscription. Allowed values are ACTIVE or INACTIVE. To create subscription, use status = ACTIVE. Notification will be triggered only if subscription is in ACTIVE status |


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
