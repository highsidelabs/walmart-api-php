# Walmart\Models\MP\US\Items\ItemResponseJsonResponseRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mart** | **string** | The marketplace name. Example: Walmart_US | [optional]
**sku** | **string** | An arbitrary alphanumeric unique ID, specified by the seller, which identifies each item. |
**wpid** | **string** | The Walmart Product ID assigned by Walmart to the item when listed on Walmart.com | [optional]
**upc** | **string** | The 12-digit bar code used extensively for retail packaging in the United States | [optional]
**gtin** | **string** | The GTIN-compatible Product ID (i.e. UPC or EAN). UPCs must be 12 or 14 digitis in length. EANs must be 13 digits in length. | [optional]
**productName** | **string** | A seller-specified, alphanumeric string uniquely identifying the product name. Example: 'Sterling Silver Blue Diamond Heart Pendant with 18in Chain' | [optional]
**shelf** | **string** | Walmart assigned an item shelf name | [optional]
**productType** | **string** | A seller-specified, alphanumeric string uniquely identifying the Product Type. Example: 'Diamond' | [optional]
**price** | [**\Walmart\Models\MP\US\Items\GetAllItems200ResponseItemResponseInnerPrice**](GetAllItems200ResponseItemResponseInnerPrice.md) |  | [optional]
**publishedStatus** | **string** | The status of an item when the item is in the submission process. The status can be one of the following: PUBLISHED, READY_TO_PUBLISH, IN_PROGRESS, UNPUBLISHED, STAGE, or SYSTEM_PROBLEM. | [optional]
**additionalAttributes** | [**\Walmart\Models\MP\US\Items\GetAllItems200ResponseItemResponseInnerAdditionalAttributes**](GetAllItems200ResponseItemResponseInnerAdditionalAttributes.md) |  | [optional]
**unpublishedReasons** | [**\Walmart\Models\MP\US\Items\GetAllItems200ResponseItemResponseInnerUnpublishedReasons**](GetAllItems200ResponseItemResponseInnerUnpublishedReasons.md) |  | [optional]
**lifecycleStatus** | **string** | The lifecycle status of an item describes where the item listing is in the overall lifecycle. Examples of allowed values are ACTIVE , ARCHIVED, RETIRED. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
