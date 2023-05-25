# #US\MP\Order

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**purchaseOrderId** | **string** | A unique ID associated with the seller's purchase order |
**customerOrderId** | **string** | A unique ID associated with the sales order for specified customer |
**customerEmailId** | **string** | The email address of the customer for the sales order |
**orderDate** | **\DateTime** | The date the customer submitted the sales order |
**buyerId** | **string** | Unique ID associated with the specified buyer | [optional]
**mart** | **string** | Mart information | [optional]
**isGuest** | **bool** | Indicates a guest customer | [optional]
**shippingInfo** | [**\Walmart\Model\MP\US\Orders\ShippingUpdates200ResponseOrderShippingInfo**](ShippingUpdates200ResponseOrderShippingInfo.md) |  |
**orderLines** | [**\Walmart\Model\MP\US\Orders\ShippingUpdates200ResponseOrderOrderLines**](ShippingUpdates200ResponseOrderOrderLines.md) |  |
**paymentTypes** | **string[]** | Payment Types | [optional]
**orderSummary** | [**\Walmart\Model\MP\US\Orders\ShippingUpdates200ResponseOrderOrderSummary**](ShippingUpdates200ResponseOrderOrderSummary.md) |  | [optional]
**pickupPersons** | [**\Walmart\Model\MP\US\Orders\ShippingUpdates200ResponseOrderPickupPersonsInner[]**](ShippingUpdates200ResponseOrderPickupPersonsInner.md) | List of pickup persons | [optional]
**shipNode** | [**\Walmart\Model\MP\US\Orders\ShippingUpdates200ResponseOrderShipNode**](ShippingUpdates200ResponseOrderShipNode.md) |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
