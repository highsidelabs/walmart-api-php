# Walmart\Models\Supplier\US\Items\Each

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**eachGTIN** | **string** | Indicates global trade item number (in the GTIN-14 format) that identifies the each.  The 14-digit Global Trade item number. If the returned value is less than 14 digits, add zeros at the beginning to lengthen it to 14 digits. | [optional]
**eachDepth** | **float** | Indicates the longest depth (front to back) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**eachWidth** | **float** | Indicates the longest horizontal (left to right) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**eachHeight** | **float** | Indicates the longest vertical (top to bottom) measurement (in inches).  If the trade item is the consumable (sellable) unit, this is measured with the product sitting on its natural base and facing forward. If the trade item is not the consumable (sellable) unit, this is measured with the product sitting on its natural base.  For more information, see <a href=\"https://supplierhelp.walmart.com\" target=\"_blank\">Supplier Help</a> and search for *pack dimensions*. | [optional]
**eachWeight** | **float** | Indicates the weight (in pounds) of the trade Item at each level, including all of its packaging materials. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
