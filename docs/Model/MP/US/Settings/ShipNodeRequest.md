# #US\MP\ShipNodeRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipNodeName** | **string** | Name of the fulfillment center. | [optional]
**status** | **string** | Status of fulfillment center. Allowed values: ACTIVE, INACTIVE.. | [optional]
**timeZone** | **string** | Time zone that the seller ships from.Allowed timezones are PST, EST, CST, MST. | [optional]
**distributorSupportedServices** | **string[]** | The services supported by the defined physical ship node . The allowed values: TWO_DAY_DELIVERY. | [optional]
**customNodeId** | **string** | Custom node identifier provided by seller. Allowed values are alphanumeric | String | [optional]
**postalAddress** | [**\Walmart\Model\MP\US\Settings\GetAllFulfillmentCenters200ResponseInnerPostalAddress**](GetAllFulfillmentCenters200ResponseInnerPostalAddress.md) |  | [optional]
**shippingDetails** | [**\Walmart\Model\MP\US\Settings\GetAllFulfillmentCenters200ResponseInnerShippingDetailsInner[]**](GetAllFulfillmentCenters200ResponseInnerShippingDetailsInner.md) | Shipping Details. | [optional]
**calendarDayConfiguration** | [**\Walmart\Model\MP\US\Settings\CreateFulfillmentCenterRequestShipNodeInnerCalendarDayConfiguration**](CreateFulfillmentCenterRequestShipNodeInnerCalendarDayConfiguration.md) |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
