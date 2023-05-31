# Walmart\Models\MP\US\Rules\RuleInfo

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**conditions** | [**\Walmart\Models\MP\US\Rules\Condition[]**](Condition.md) | Seller creates conditions while defining the custom rule assortment.There are three condition which a seller can use : subCategories, price, weight. | [optional]
**description** | **string** | Description of the rule created for custom rule assortment. | [optional]
**name** | **string** | Name of the rule created for custom rule assortment. | [optional]
**priority** | **string** | Priority of the rule created for custom rule assortment. | [optional]
**ruleId** | **string** | Unique identifier of the rule created for custom rule assortment. | [optional]
**ruleStatus** | **string** | Status of the rule post the rule creation. Allowed values are Active, Inactive, Submitted. | [optional]
**skuProcessingStatus** | **string** | When the rule gets activated, skuProcessingStatus represents the state of all items being processed for two-day. The two values for skuProcessingStatus are Processing and Completed. | [optional]
**ruleAction** | [**\Walmart\Models\MP\US\Rules\RuleAction**](RuleAction.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
