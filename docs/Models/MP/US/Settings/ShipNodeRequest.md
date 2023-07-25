# Walmart\Models\MP\US\Settings\ShipNodeRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipNodeName** | **string** | Name of the fulfillment center. | [optional]
**status** | **string** | Status of fulfillment center. Allowed values: ACTIVE, INACTIVE.. | [optional]
**timeZone** | **string** | Time zone that the seller ships from.Allowed timezones are PST, EST, CST, MST. | [optional]
**distributorSupportedServices** | **string[]** | The services supported by the defined physical ship node . The allowed values: TWO_DAY_DELIVERY. | [optional]
**customNodeId** | **string** | Custom node identifier provided by seller. Allowed values are alphanumeric | String | [optional]
**postalAddress** | [**\Walmart\Models\MP\US\Settings\PostalAddress**](PostalAddress.md) |  | [optional]
**shippingDetails** | [**\Walmart\Models\MP\US\Settings\ShippingDetails[]**](ShippingDetails.md) | Shipping Details. | [optional]
**calendarDayConfiguration** | [**\Walmart\Models\MP\US\Settings\CalendarDayConfigurationRequest**](CalendarDayConfigurationRequest.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
