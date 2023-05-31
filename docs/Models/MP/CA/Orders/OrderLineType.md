# Walmart\Models\MP\CA\Orders\OrderLineType

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**lineNumber** | **string** | The line number associated with the details for each individual item in the purchase order |
**shipFromCountry** | **string** | The ship from country is associated with the details for each individual item in the purchase order | [optional]
**item** | [**\Walmart\Models\MP\CA\Orders\ItemType**](ItemType.md) |  |
**charges** | [**\Walmart\Models\MP\CA\Orders\ChargesType**](ChargesType.md) |  |
**orderLineQuantity** | [**\Walmart\Models\MP\CA\Orders\QuantityType**](QuantityType.md) |  |
**statusDate** | **\DateTime** | The date shown on the recent order status |
**orderLineStatuses** | [**\Walmart\Models\MP\CA\Orders\OrderLineStatusesType**](OrderLineStatusesType.md) |  |
**refund** | [**\Walmart\Models\MP\CA\Orders\RefundType**](RefundType.md) |  | [optional]
**originalCarrierMethod** | **string** |  | [optional]
**referenceLineId** | **string** |  | [optional]
**fulfillment** | [**\Walmart\Models\MP\CA\Orders\FulfillmentType**](FulfillmentType.md) |  | [optional]
**intentToCancel** | **string** |  | [optional]
**configId** | **string** |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
