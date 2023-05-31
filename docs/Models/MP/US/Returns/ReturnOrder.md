# Walmart\Models\MP\US\Returns\ReturnOrder

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**returnOrderId** | **string** | Return order identifier of the return order. This is the same as RMA number. | [optional]
**customerEmailId** | **string** | Customer email address | [optional]
**returnType** | **string** | Specifies if the return order is a replacement return or a regular (refund) return. Possible values are REPLACEMENT or REFUND. | [optional]
**replacementCustomerOrderId** | **string** | customer order ID of the original return order on which the replacement is created. | [optional]
**customerName** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerCustomerName**](GetReturns200ResponseReturnOrdersInnerCustomerName.md) |  | [optional]
**customerOrderId** | **string** | A unique ID associated with the sales order for specified customer | [optional]
**returnOrderDate** | **\DateTime** | Date format for return order date | [optional]
**returnByDate** | **\DateTime** | Date format for return by order date | [optional]
**refundMode** | **string** | Determines when the refund was/will be issued to the customer | [optional]
**totalRefundAmount** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerTotalRefundAmount**](GetReturns200ResponseReturnOrdersInnerTotalRefundAmount.md) |  | [optional]
**returnLineGroups** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnLineGroupsInner[]**](GetReturns200ResponseReturnOrdersInnerReturnLineGroupsInner.md) | These groups are created per label or type of carrier service required. (e.g., If order has some lines that can be clubbed and mailed together as a smart post then they belong to one return group. If a line is bulky and needs a different type of carrier service, then that line will be part of different group. Customer gets multiple labels depending on how many groups are created for the entire order.) | [optional]
**returnOrderLines** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInner[]**](GetReturns200ResponseReturnOrdersInnerReturnOrderLinesInner.md) | A list of order lines in the return order | [optional]
**returnChannel** | [**\Walmart\Models\MP\US\Returns\GetReturns200ResponseReturnOrdersInnerReturnChannel**](GetReturns200ResponseReturnOrdersInnerReturnChannel.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
