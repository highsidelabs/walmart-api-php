# Walmart\Models\MP\US\Items\GetCatalogSearch200ResponsePayloadInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mart** | **string** | The marketplace name. Example: Walmart_US | [optional]
**sku** | **string** | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. | [optional]
**wpid** | **string** | The Walmart Product ID assigned by Walmart to the item when listed on Walmart.com | [optional]
**upc** | **string** | The 12-digit bar code used extensively for retail packaging in the United States | [optional]
**isbn** | **string** | International Standard Book Number | [optional]
**ean** | **string** | Product ID, EANs must be 13 digits in length. | [optional]
**gtin** | **string** | The GTIN-compatible Product ID (i.e. UPC or EAN). UPCs must be 12 or 14 digitis in length. EANs must be 13 digits in length. | [optional]
**itemId** | **string** | A unique Id which identifies the item. | [optional]
**productName** | **string** | A seller-specified, alphanumeric string uniquely identifying the product name. Example: 'Sterling Silver Blue Diamond Heart Pendant with 18in Chain' | [optional]
**shelf** | **string** | Walmart assigned an item shelf name | [optional]
**productType** | **string** | A seller-specified, alphanumeric string uniquely identifying the Product Type. Example: 'Diamond' | [optional]
**price** | [**\Walmart\Models\MP\US\Items\GetCatalogSearch200ResponsePayloadInnerPrice**](GetCatalogSearch200ResponsePayloadInnerPrice.md) |  | [optional]
**brand** | **string** | Brand of Item. | [optional]
**numReviews** | **string** | The reviewed times for Items. | [optional]
**customerRating** | **string** | Customer rating. | [optional]
**manufacturer** | **string** | manufacturer of Item. | [optional]
**fulfillmentType** | **string** | Fulfillment information. | [optional]
**publishedStatus** | [**\Walmart\Models\MP\US\Items\GetCatalogSearch200ResponsePayloadInnerPublishedStatus**](GetCatalogSearch200ResponsePayloadInnerPublishedStatus.md) |  | [optional]
**inventoryStatus** | **string** | It indicates whether the product is in stock or not. | [optional]
**lifecycleStatus** | **string** | The lifecycle status of an item describes where the item listing is in the overall lifecycle. Examples of allowed values are ACTIVE , ARCHIVED, RETIRED. | [optional]
**shopRef** | **string** |  | [optional]
**shopProductId** | **string** |  | [optional]
**shopVariantId** | **string** |  | [optional]
**variantGroupId** | **string** | Variant Id if the item is of type Variant | [optional]
**variantGroupInfo** | [**\Walmart\Models\MP\US\Items\GetCatalogSearch200ResponsePayloadInnerVariantGroupInfo**](GetCatalogSearch200ResponsePayloadInnerVariantGroupInfo.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
