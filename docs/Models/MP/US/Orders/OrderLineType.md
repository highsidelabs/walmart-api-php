# Walmart\Models\MP\US\Orders\OrderLineType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**lineNumber** | **string** | The line number associated with the details for each individual item in the purchase order |
**item** | [**\Walmart\Models\MP\US\Orders\ItemType**](ItemType.md) |  |
**charges** | [**\Walmart\Models\MP\US\Orders\ChargesType**](ChargesType.md) |  |
**orderLineQuantity** | [**\Walmart\Models\MP\US\Orders\QuantityType**](QuantityType.md) |  |
**statusDate** | **int** | The date shown on the recent order status |
**orderLineStatuses** | [**\Walmart\Models\MP\US\Orders\OrderLineStatusesType**](OrderLineStatusesType.md) |  |
**returnOrderId** | **string** | Id of the return order created in case of a full refund | [optional]
**refund** | [**\Walmart\Models\MP\US\Orders\RefundType**](RefundType.md) |  | [optional]
**originalCarrierMethod** | **string** | Ship method stamped at order line level when order is placed | [optional]
**referenceLineId** | **string** | Reference line Id | [optional]
**fulfillment** | [**\Walmart\Models\MP\US\Orders\FulfillmentType**](FulfillmentType.md) |  | [optional]
**serialNumbers** | **string[]** | Unique identifier assigned by a manufacturer to an individual item, to uniquely identify it. This number helps with record-keeping, accuracy and compliance | [optional]
**intentToCancel** | **string** |  | [optional]
**configId** | **string** | Sets ConfigID for Personalised orders | [optional]
**sellerOrderId** | **string** | A unique ID associated with the sales order for specified Seller; gives Sellers the ability to print their own custom order ID on the return label; limit of 30 characters | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
