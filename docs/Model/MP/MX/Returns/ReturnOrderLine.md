# #MX\MP\ReturnOrderLine

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**returnOrderLineNumber** | **string** | The returns order line number for that return | [optional]
**primeLineNumber** | **string** | The purchase order line number for the return created | [optional]
**returnReason** | **string** | Gives the reason that was selected during the return creation. | [optional]
**reasonCode** | **string** | Gives the return reason code associated with returnReason | [optional]
**purchaseOrderId** | **string** | The purchase order ID for the return created | [optional]
**purchaseOrderLineNumber** | **string** | The purchase order line number for the return created | [optional]
**item** | [**\Walmart\Model\MP\MX\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerItem**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerItem.md) |  | [optional]
**charges** | [**\Walmart\Model\MP\MX\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInner.md) | Information relating to the charge for the orderLine | [optional]
**unitPrice** | [**\Walmart\Model\MP\MX\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerUnitPrice**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerUnitPrice.md) |  | [optional]
**chargeTotals** | [**\Walmart\Model\MP\MX\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargeTotalsInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargeTotalsInner.md) | Contains name value pairs of calculated charges for the line. Eg: if order line has 3 Qty, this will have a shipping charge = 3 * shipping charge per unit (This is present in the line level charges). | [optional]
**quantity** | [**\Walmart\Model\MP\MX\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerQuantity**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerQuantity.md) |  | [optional]
**status** | **string** | Current status of return. (e.g., 'INITIATED') | [optional]
**statusTime** | **string** | Timestamp of listed status change | [optional]
**refundAmount** | [**\Walmart\Model\MP\MX\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerRefundAmount**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerRefundAmount.md) |  | [optional]
**soPrimeLineSubLineNo** | **string** |  | [optional]
**isWFSEnabled** | **string** | Determines Walmart Fulfilled vs Seller Fulfilled returns. Valid values are: Y, N | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/MX/MP) [[Back to README]](../../README.md)
