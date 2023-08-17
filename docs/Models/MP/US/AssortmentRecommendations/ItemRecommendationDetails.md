# Walmart\Models\MP\US\AssortmentRecommendations\ItemRecommendationDetails

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | Title of the recommended item | [optional]
**brand** | **string** | Brand of the recommended item | [optional]
**category** | **string** | Category of the recommended item | [optional]
**gtin** | **string** | GTIN of the recommended item | [optional]
**upc** | **string** | UPC of the recommended item | [optional]
**isbn** | **string** | ISBN of the recommended item | [optional]
**ean** | **string** | EAN of the recommended item | [optional]
**itemAvailabilityStatus** | **string** | Item availability status of the recommended item.   | Attribute | Description | Data Type | | --- | ----------- | ------- | | EXISTING_IN_WALMART | Indicates that item is existing in Walmart. | string | | NEW_TO_WALMART | Indicates that item is new to Walmart. | string | | [optional]
**potentialSales** | **string** | Indicates the potential revenue the recommended item can bring in over a year.  This field does not promise the numbers indicated. | [optional]
**shoppingTrends** | **string[]** | Indicates the demand type for an item.   | Attribute | Description | Data Type | | --- | ----------- | ------- | | MOST_SEARCHED_FOR | Item is most searched for in the market. | string | | BEST_SELLERS | Item is best seller in the market. | string | | DEAL_ITEMS | Item is in demand and is a part of deals in the other marketplaces. | string | | [optional]
**walmart** | [**\Walmart\Models\MP\US\AssortmentRecommendations\WalmartItemInfo**](WalmartItemInfo.md) |  | [optional]
**competitors** | [**\Walmart\Models\MP\US\AssortmentRecommendations\CompetitorItemInfo[]**](CompetitorItemInfo.md) | Competitor's item information | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
