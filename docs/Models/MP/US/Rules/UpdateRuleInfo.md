# Walmart\Models\MP\US\Rules\UpdateRuleInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ruleId** | **string** | Unique identifier of the rule created for custom rule assortment. | [optional]
**ruleStatus** | **string** | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | [optional]
**name** | **string** | Name of the rule created for custom rule assortment. | [optional]
**description** | **string** | Description of the rule created for custom rule assortment. | [optional]
**priority** | **string** | Priority of the rule created for custom rule assortment. | [optional]
**conditions** | [**\Walmart\Models\MP\US\Rules\UpdateShippingAreaToRule200ResponseRulesInnerConditionsInner[]**](UpdateShippingAreaToRule200ResponseRulesInnerConditionsInner.md) | Seller creates conditions while defining the custom rule assortment.There are three condition which a seller can use : subCategories, price, weight. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
