# Walmart\Models\MP\US\Fulfillment\OrderItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**productId** | **string** | Unique ID identifying product |
**productType** | **string** | Supported product types are GTIN |
**sku** | **string** | Seller Item ID |
**itemDesc** | **string** | Item description |
**itemQty** | **int** | Total number of sellable units |
**vendorPackQty** | **int** | Total number of cases |
**innerPackQty** | **int** | Total number of sellable units per case |
**expectedDeliveryDate** | **\DateTime** | expected delivery date for shipment |
**addOnServices** | **string[]** | Indicate whether add-on services (e.g. item labeling or poly bagging) are needed | [optional]
**itemNbr** | **int** |  | [optional]
**dimensions** | **float[]** |  | [optional]
**itemWeightQty** | **float** |  | [optional]
**nonSortItem** | **bool** |  | [optional]
**shipNode** | **string** |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
