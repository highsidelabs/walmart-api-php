# Walmart\Models\Supplier\US\Items\InnerPack

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**innerPackGTIN** | **string** | Indicates global trade item number (in the GTIN-14 format) that identifies the inner pack.  The Inner Pack also known as a break pack, warehouse pack, inner case, or pick.  The 14-digit Global Trade item number. If the returned value is less than 14 digits, add zeros at the beginning to lengthen it to 14 digits. | [optional]
**innerPackDepth** | **float** | Indicates the longest horizontal (front to back) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**innerPackWidth** | **float** | Indicates the longest horizontal (left to right) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**innerPackHeight** | **float** | Indicates the longest horizontal (top to bottom) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**innerPackWeight** | **float** | Indicates the weight (in pounds) of the trade item at each level, including all of its packaging materials. | [optional]
**qtySellableItemsInnerPack** | **int** | Indicates the total number of sellable units in the Inner Pack. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
