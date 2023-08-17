# Walmart\Models\MP\US\AssortmentRecommendations\RecommendationRequestFilter

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**searchText** | **string** | To filter with a search text having a word that can be part of the recommended data. | [optional]
**multiValueFilter** | [**\Walmart\Models\MP\US\AssortmentRecommendations\MultiValueFilterCriteria[]**](MultiValueFilterCriteria.md) | Filters based on multiple values associated with a specific parameter.  No parameter should be repeated. | [optional]
**enumFilter** | [**\Walmart\Models\MP\US\AssortmentRecommendations\EnumFilterCriteria[]**](EnumFilterCriteria.md) | Filter based on preset parameters and their associated values is possible with EnumFilter.   No parameter should be repeated. | [optional]
**rangeFilter** | [**\Walmart\Models\MP\US\AssortmentRecommendations\RangeFilterCriteria[]**](RangeFilterCriteria.md) | Filter based on a range with RangeFilter. You must also pass a parameter along with any of the beginning or the ending points or both.  No parameter should be repeated. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
