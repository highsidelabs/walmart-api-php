# Walmart\Models\Supplier\US\Items\Pallet

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**palletGTIN** | **string** | Indicates global trade item number (in the GTIN-14 format) that identifies the pallet.  The 14-digit Global Trade item number. If the returned value is less than 14 digits, add zeros at the beginning to lengthen it to 14 digits. | [optional]
**palletDepth** | **float** | Indicates the longest horizontal (front to back) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**palletWidth** | **float** | Indicates the longest horizontal (left to right) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**palletHeight** | **float** | Indicates the longest horizontal (top to bottom) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**palletWeight** | **float** | Indicates the weight (in pounds) of the trade item at the pallet level, including all of its packaging materials. | [optional]
**qtySellableItemsPallet** | **int** | Indicates the total number of sellable units in the pallet. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
