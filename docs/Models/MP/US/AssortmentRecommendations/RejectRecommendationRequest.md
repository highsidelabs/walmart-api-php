# Walmart\Models\MP\US\AssortmentRecommendations\RejectRecommendationRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**recommendationType** | **string** | | Attribute | Description | Data Type | | --- | ----------- | ------- | | ITEM | To reject list of recommended items | string | |
**filterCriteria** | [**\Walmart\Models\MP\US\AssortmentRecommendations\RecommendationRequestFilter**](RecommendationRequestFilter.md) |  | [optional]
**itemRecommendationUniqueIds** | **string[]** | List of item recommendation unique ids to reject.  The size of the list should not exceed 100.  You cannot add filter criteria along with the itemRecommendationUniqueIds list | [optional]
**rejectionCodes** | **string[]** | List of rejection codes   | Attribute | Description | Data Type | | --- | ----------- | ------- | | NOT_SELLING_THESE_ITEMS | As a seller, I don’t intend to sell these items on Walmart  | string | | NOT_SELLING_THESE_BRANDS | As a seller, I don’t intend to sell these brands on Walmart  | string | | NOT_SELLING_THESE_CATEGORIES | As a seller, I don’t intend to sell these categories on Walmart  | string | | LIMITED_TO_OTHER_MARKETPLACE | As a seller, I intend to sell the rejected items only on other marketplaces  | string | | ALREADY_SELLING_ON_WALMART | I am already selling these items on Walmart  | string | | OTHER_REASON | Other reason for rejecting the items. customRejectionMessage is mandatory to pass if rejectionCode is OTHER_REASON.  | string | |
**customRejectionMessage** | **string** | Custom rejection message if the rejection code is OTHER_REASON. This is required only when the rejectionCodes has OTHER_REASON in the list. Maximum length of the message is 500 | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
