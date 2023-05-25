# #US\MP\Charge

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**chargeCategory** | **string** | The category type. (e.g., 'PRODUCT' or 'FEE') | [optional]
**chargeName** | **string** | If chargeType is PRODUCT, chargeName is ItemPrice. If chargeType is PRODUCT and includes a chargeName as SubscriptionDiscount, these are subscription orders with a discount. If chargeType is SHIPPING, chargeName is Shipping | [optional]
**chargePerUnit** | [**\Walmart\Model\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerTotalRefundAmount**](GetReturns200ResponseReturnOrdersInnerTotalRefundAmount.md) |  | [optional]
**isDiscount** | **bool** | Is this charge a discount, which then needs to be subtracted from the refund | [optional]
**isBillable** | **bool** | Should this charge be included in the refund computation | [optional]
**tax** | [**\Walmart\Model\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerTaxInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerTaxInner.md) | Taxes for each charge | [optional]
**excessCharge** | [**\Walmart\Model\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerTotalRefundAmount**](GetReturns200ResponseReturnOrdersInnerTotalRefundAmount.md) |  | [optional]
**references** | [**\Walmart\Model\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerReferencesInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerReferencesInner.md) | Used only for OG | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
