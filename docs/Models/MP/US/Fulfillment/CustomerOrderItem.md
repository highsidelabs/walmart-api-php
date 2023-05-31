# Walmart\Models\MP\US\Fulfillment\CustomerOrderItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**fulfillmentType** | **string** | Fulfillment Type of an order. Currently supported type: 'DELIVERY' | [optional]
**sellerLineId** | **string** | Unique Id for each line item, preferred sequence 1,2,3... |
**itemDetail** | [**\Walmart\Models\MP\US\Fulfillment\ItemDetail**](ItemDetail.md) |  |
**qty** | [**\Walmart\Models\MP\US\Fulfillment\CustomerOrderItemQuantityType**](CustomerOrderItemQuantityType.md) |  |
**shippingMethod** | **string** | Shipping method of an order. Currently supported type: 'EXPEDITED', 'STANDARD' | [optional]
**shippingTo** | [**\Walmart\Models\MP\US\Fulfillment\PickupPersonDetails**](PickupPersonDetails.md) |  |
**chargeDetails** | [**\Walmart\Models\MP\US\Fulfillment\ChargeDetails[]**](ChargeDetails.md) | Item charge details |


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
