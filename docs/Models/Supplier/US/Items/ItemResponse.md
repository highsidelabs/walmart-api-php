# Walmart\Models\Supplier\US\Items\ItemResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**gtin** | **string** | Indicates the global trade Item number (in the GTIN-14 format).  The 14-digit Global Trade item number. If the returned value is less than 14 digits, add zeros at the beginning to lengthen it to 14 digits. | [optional]
**sku** | **string** | Indicates the stock keeping unit (SKU) identifier for the item and is assigned by the supplier. | [optional]
**variantGroupId** | **string** | Indicates the variant group identifier of the item.  This value is included only if the item part of a variant or variant group. | [optional]
**productName** | **string** | Indicates the name of the product that is displayed on the item page. | [optional]
**brand** | **string** | Indicates the name provided by the brand owner.  The brand assists recognition by the consumer as represented on the product.  If the item does not have a brand, it will be listed as `Unbranded`. | [optional]
**mainImageUrl** | **string** | Indicates the URL of the main image of the item. | [optional]
**shortDescription** | **string** | Indicates the descriptive overview of the item's key selling points, marketing content, and highlights.  For SEO purposes, repeat the product name and relevant keywords here. | [optional]
**productType** | **string** | Indicates Walmart's product type classification.  If there is no `ProductType` defined for the item, it will be shown as `null`. | [optional]
**shelfName** | **string** | Indicates the Walmart-assigned item shelf name used for the site. | [optional]
**publishedStatus** | **string** | Indicates the status of an item during the submission process.  The valid values are:  | Value | Meaning | | --- | ----------- | | Published | The item has been accepted and is published. | | Unpublished | The item has either been rejected during the submission process or removed from the site. It is not available on the site. | | In Progress | The item is still in the submission process and a publishing decision has yet been made. |   Example: Published | [optional]
**unpublishedReasons** | **string[]** | Indicates the reason the item is unpublished. | [optional]
**itemPageURL** | **string** | Indicates the URL for the item's product page on Walmart.com. | [optional]
**price** | [**\Walmart\Models\Supplier\US\Items\Price**](Price.md) |  | [optional]
**_1pBuyBox** | **string** | Indicates a 1P offer is winning the buy-box for the item.  If `YES`, a 1P offer is winning the buy-box for the item.  If `NO`, a 1P offer is not winning the buy-box for the item. | [optional]
**siteDates** | [**\Walmart\Models\Supplier\US\Items\SiteDates**](SiteDates.md) |  | [optional]
**customerRating** | **float** | Indicates the average customer review score for the item.  The scale is 1 to 5, 5 being the best review.  See the parameter `customerReviewCount` for the number of reviews for the item. | [optional]
**customerReviewCount** | **int** | Indicates the number of customer reviews for the item.  See the parameter `customerRating` for the item's averaged rating. | [optional]
**contentQualityScore** | **float** | Indicates the item's content quality score.  The scale is 0 to 100, 100 being the best quality score. | [optional]
**walmartOrderAttributes** | [**\Walmart\Models\Supplier\US\Items\WalmartOrderAttributes**](WalmartOrderAttributes.md) |  | [optional]
**itemConfigurations** | [**\Walmart\Models\Supplier\US\Items\ItemConfigurations[]**](ItemConfigurations.md) | Indicates an array of objects detailing the item configuration.  This view shows one item for every Walmart item number, or the specific item configurations that suppliers sell to the merchant. | [optional]
**attributeContentInsights** | [**\Walmart\Models\Supplier\US\Items\AttributeContentInsights[]**](AttributeContentInsights.md) | Indicates an array identifying specific content recommendations that can be made to improve the content quality score. | [optional]
**variantGroupInfo** | [**\Walmart\Models\Supplier\US\Items\VariantGroupInfo**](VariantGroupInfo.md) |  | [optional]
**additionalProductAttributes** | **object** | Indicates an object providing additional product attributes details.  This object contains all the attributes related to the item’s product type. If there is no product type assigned to the item, that is, the object is returned as `null`, there will be no attributes present in the object.  The fields will vary according to the product type returned. For a complete list of fields and structures, see the Item Maintenance Feed File Schema provided the Item Guide. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
