# Walmart\Models\MP\US\AssortmentRecommendations\EnumFilterCriteria

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**parameter** | **string** | To apply an enum filter based on the predefined parameter.   | Attribute | Description | Data Type | | --- | ----------- | ------- | | ITEM_AVAILABILITY_STATUS | To filter based on whether the items which are new to Walmart or existing in Walmart. | string | | SHOPPING_TRENDS | Indicates the demand types identified in the market for an item. An item can have more than one value for this parameter. | string | | [optional]
**values** | **string[]** | Values correspond to the parameter for applying filter on the response. The data in values[] are predefined. OR operator is used between the values.   | Attribute | Associated parameter of enumFilter | Description | Data Type | | --- | ----------- | ----------- | ------- | | EXISTING_IN_WALMART | ITEM_AVAILABILITY_STATUS | To filters based on the items which are existing in Walmart. | string | | NEW_TO_WALMART | ITEM_AVAILABILITY_STATUS | To filters based on the items which are new to Walmart. | string | | MOST_SEARCHED_FOR | SHOPPING_TRENDS | Item is most searched for in the market. | string | | BEST_SELLERS | SHOPPING_TRENDS | Item is best seller in the market.  | string | | DEAL_ITEMS | SHOPPING_TRENDS | Item is in demand and is a part of deals in the other marketplaces. | string | | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
