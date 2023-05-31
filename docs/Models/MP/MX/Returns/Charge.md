# Walmart\Models\MP\MX\Returns\Charge

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**chargeType** | **string** | The category type. (e.g., 'PRODUCT' or 'FEE') | [optional]
**chargeName** | **string** | If chargeType is PRODUCT, chargeName is Item Price. If chargeType is SHIPPING, chargeName is Shipping | [optional]
**chargeAmount** | [**\Walmart\Models\MP\MX\Returns\ChargeAmount**](ChargeAmount.md) |  | [optional]
**tax** | [**\Walmart\Models\MP\MX\Returns\Tax[]**](Tax.md) | Taxes for each charge | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
