# #US\DSV\InventoryV2

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**productId** | **string** | Specifies the product identifier for the item.    This parameter can only be a global trade item number (GTIN).   The global trade item number (GTIN) is a 14-digit number, including the check digit, that is used worldwide and identifies the Each. If the user’s number is less than 14 digits, add zeros at the beginning. |
**shipNode** | **string** | Specifies the distributor identifier for the distribution facility, used to identify each facility. |
**availabilityCode** | **string** | Specifies the code that identifies how to manage the inventory update.   Codes include:   AC: The code used for standard inventory updates. Assign this code to an item with normal inventory.   AA: An item with infinite inventory. If users set AA as the `availabilityCode`, they do not need to provide inventory for the item. |
**quantity** | **int** | Specifies the item quantity available in the inventory. | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/DSV) [[Back to README]](../../README.md)
