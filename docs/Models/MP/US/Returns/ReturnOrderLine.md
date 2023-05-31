# Walmart\Models\MP\US\Returns\ReturnOrderLine

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**returnOrderLineNumber** | **int** | The returns order line number for that return | [optional]
**salesOrderLineNumber** | **int** | The sales order line number for the return created | [optional]
**sellerOrderId** | **string** | A unique ID associated with the sales order for specified Seller; gives Sellers the ability to print their own custom order ID on the return label; limit of 30 characters | [optional]
**returnReason** | **string** | Gives the reason that was selected during the return creation. Reason codes are: ARRIVED_LATE, AUTO_RETURN, BOUGHT_ANOTHER_SIZE_OR_COLOR, BOUGHT_SOMEWHERE_ELSE, DAMAGED, DEFECTIVE, DUPLICATE_ITEM, INADEQUATE_QUALITY, INCORRECT_ITEM, LOST_AFTER_DELIVERY, LOST_IN_TRANSIT, LOWER_PRICE, MISSING_PARTS, NOT_AS_DESCRIBED, NO_LONGER_WANTED, RETURN_TO_SENDER, SHIPPING_BOX_DAMAGED, TRIED_TO_CANCEL and WRONG_SIZE/POOR_FIT | [optional]
**purchaseOrderId** | **string** | The purchase order ID for the return created | [optional]
**purchaseOrderLineNumber** | **int** | The purchase order line number for the return created | [optional]
**exceptionItemType** | **string** |  | [optional]
**isReturnForException** | **bool** |  | [optional]
**rechargeReason** | **string** | reason for recharging the customer for replacement | [optional]
**returnCancellationReason** | **string** | reason for cancelling the return | [optional]
**item** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerItem**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerItem.md) |  | [optional]
**charges** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInner.md) | Information relating to the charge for the orderLine | [optional]
**unitPrice** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerTotalRefundAmount**](GetReturns200ResponseReturnOrdersInnerTotalRefundAmount.md) |  | [optional]
**itemReturnSettings** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerReferencesInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargesInnerReferencesInner.md) | Contains name value pairs of calculated charges for the line. Eg: if order line has 3 Qty, this will have a shipping charge = 3 * shipping charge per unit (This is present in the line level charges). | [optional]
**chargeTotals** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargeTotalsInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerChargeTotalsInner.md) | Contains name value pairs of calculated charges for the line. Eg: if order line has 3 Qty, this will have a shipping charge = 3 * shipping charge per unit (This is present in the line level charges). | [optional]
**cancellableQty** | **int** | How much quantity of this order line can be cancelled | [optional]
**quantity** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerItemItemWeight**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerItemItemWeight.md) |  | [optional]
**returnExpectedFlag** | **bool** | Is customer required to send this item back to return center. | [optional]
**isFastReplacement** | **bool** | Applicable only for 1P. | [optional]
**isKeepIt** | **bool** | Is customer allowed to keep the product and not required to send it back to return center. This flag is determined by making a call to fraud system. | [optional]
**lastItem** | **bool** | This return is the last item on the sales order line and all other sales order line items are already returned. Helps in last penny calculations. | [optional]
**refundedQty** | **float** | The quantity for which customer was refunded | [optional]
**rechargeableQty** | **float** | The quantity for which customer can be charged again for | [optional]
**refundChannel** | **string** | Determines the mode of refund initiation. Valid values are: WALMART_SETTLED_REFUND, SELLER_AUTO_REFUND, SELLER_MANUAL_REFUND, SELLER_SYSTEM_REFUND, and WALMART_TRIGGERED_REFUND. | [optional]
**returnTrackingDetail** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerReturnTrackingDetailInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInnerReturnTrackingDetailInner.md) | Informational blocks added as the return order completes its journey from return creation to received and refunded. | [optional]
**status** | **string** | Current status of return. (e.g., 'INITIATED') | [optional]
**statusTime** | **\DateTime** | Timestamp of listed status change | [optional]
**currentDeliveryStatus** | **string** | Determines the current carrier tracking status of the return. | [optional]
**currentRefundStatus** | **string** | Determines the current refund status of the return. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
