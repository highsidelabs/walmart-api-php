# Walmart\Models\MP\US\Insights\ItemsDetailsForListingRequestFiltersInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**field** | **string** | | Attribute | Description | Data Type | --- | ----------- | ------- | contentDiscoverabilityPercentage | Item's content and discoverability score expressed as a percentage. | string | | qualityScorePercentage | Item's overall Listing Quality score, rated as a percentage. | string | | offerPercentage | Item's offer score, based on: item price, shipping price and speed, and in-stock rate.| string | | ratingReviewsPercentage | Rating and reviews score, as a percentage. | string | | viewTrendingItems | Indicates to return details for trending items that have non-zero page views. Acceptable values are \"true\" if pageView > 0, or \"false\" if pageView >= 0. | string | | viewPostPurchaseItems | Show items with post-purchase quality issues. If item has post-purchase value >= 1, it filters all items greater or equal based on post purchase value. | string | | wfsFlag | Show WFS-eligible items. Value of this parameter can be true or false. | string | | categoryName | Item's category name. | string | | hasIssues | Provides a count of item with issues. | integer | | productType | Product type to classify the item (e.g. Pants). | string| | attributeList | List of all available filter attributes. | string | | productTypes | List of all available product. | List<String> | | brandList | List of all available brand. | List<String> | | oos | Filter using out of stock offer based on days. Min value = 0, Max Value = 7. | integer | | fastAndFreeShipping | Possible values are 1 for offers eligible for free shipping and 0 for offers not eligible for free shipping. No value shows all the offers. | integer | | priceMeetBeatFlag | Possible values are -1 for no match, 0 for lose, 1 for meets and 2 for beats. No value shows all the offers. | integer | | [optional]
**op** | **string** |  | [optional]
**values** | **int[]** |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
