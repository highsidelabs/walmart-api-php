# Walmart\Models\MP\US\Insights\ProSellerResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**hasBadge** | **bool** | Specifies if the seller has the badge | [optional]
**isEligible** | **bool** | Specifies if the seller is eligible for the badge in the next refresh | [optional]
**badgedSince** | **\DateTime** | Specifies when the seller received their badge | [optional]
**isProhibited** | **bool** | Specifies whether the seller is prohibited from participating in the Pro Seller badge program. | [optional]
**badgeStatus** | **string** | Specifies the seller's badge status in detail. The possible values are \"Become a Pro Seller\", \"You are a Pro Seller\", \"Pro Seller Badge at risk\", \"Eligible starting from YYYY-MM-DD\", and \"Not eligible for the Pro Seller Badge\" | [optional]
**meetsCriteria** | [**\Walmart\Models\MP\US\Insights\GetProSellerBadgeInfo200ResponseMeetsCriteria**](GetProSellerBadgeInfo200ResponseMeetsCriteria.md) |  | [optional]
**criteriaData** | [**\Walmart\Models\MP\US\Insights\GetProSellerBadgeInfo200ResponseCriteriaData**](GetProSellerBadgeInfo200ResponseCriteriaData.md) |  | [optional]
**recommendations** | [**\Walmart\Models\MP\US\Insights\GetProSellerBadgeInfo200ResponseRecommendations**](GetProSellerBadgeInfo200ResponseRecommendations.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
