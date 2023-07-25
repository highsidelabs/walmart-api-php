# Walmart\Models\Supplier\US\DSVInventory\Inventory

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**gtin** | **string** | Specifies the global trade item number (GTIN) item identifier.   The global trade item number is a 14-digit number, including the check digit, that is used worldwide and identifies the Each. If the user’s number is less than 14 digits, add zeros at the beginning. |
**availabilityCode** | **string** | Specifies how to manage the inventory update.   AC: The code used for standard inventory updates. Assign this code to an item with normal inventory.   AA: An item with infinite inventory. If users set AA as the availability code, they do not need to provide inventory for the item. |
**quantity** | [**\Walmart\Models\Supplier\US\DSVInventory\Quantity**](Quantity.md) |  |


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
