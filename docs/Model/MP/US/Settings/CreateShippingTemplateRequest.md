# #US\MP\CreateShippingTemplateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Shipping Template Name | [optional]
**type** | **string** | Shipping Template Type, should be CUSTOM or 3PL Specific | [optional]
**rateModelType** | **string** | This is the shipping model type. TIERED_PRICING: This model means that you charge shipping based on the price of the item PER_SHIPMENT_PRICING: This model means that you charge shipping based on the weight of your items (per pound), or you charge shipping based on the number of items purchased in an order | [optional]
**status** | **string** | Shipping Template Status, Can be ACTIVE or INACTIVE status | [optional]
**shippingMethods** | [**\Walmart\Model\MP\US\Settings\GetShippingTemplateDetails200ResponseShippingMethodsInner[]**](GetShippingTemplateDetails200ResponseShippingMethodsInner.md) | Array of different ship methods of a Shipping Template | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
