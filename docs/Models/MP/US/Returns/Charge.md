# Walmart\Models\MP\US\Returns\Charge

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**chargeCategory** | **string** | The category type. (e.g., 'PRODUCT' or 'FEE') | [optional]
**chargeName** | **string** | If chargeType is PRODUCT, chargeName is ItemPrice. If chargeType is PRODUCT and includes a chargeName as SubscriptionDiscount, these are subscription orders with a discount. If chargeType is SHIPPING, chargeName is Shipping | [optional]
**chargePerUnit** | [**\Walmart\Models\MP\US\Returns\Money**](Money.md) |  | [optional]
**isDiscount** | **bool** | Is this charge a discount, which then needs to be subtracted from the refund | [optional]
**isBillable** | **bool** | Should this charge be included in the refund computation | [optional]
**tax** | [**\Walmart\Models\MP\US\Returns\Tax[]**](Tax.md) | Taxes for each charge | [optional]
**excessCharge** | [**\Walmart\Models\MP\US\Returns\Money**](Money.md) |  | [optional]
**references** | [**\Walmart\Models\MP\US\Returns\ChargeTotal[]**](ChargeTotal.md) | Used only for OG | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
