# #US\DSV\GetOrderResponseRecord

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**purchaseOrderId** | **string** | A unique ID associated with the seller's purchase order |
**customerOrderId** | **string** | A unique ID associated with the sales order for specified customer |
**customerEmailId** | **string** | The email address of the customer for the sales order |
**orderType** | **string** | Specifies if the order is a regular order or replacement order. Possible values are REGULAR or REPLACEMENT. Provided in response only if query parameter replacementInfo=true. | [optional]
**originalCustomerOrderID** | **string** | customer order ID of the original customer order on which the replacement is created. | [optional]
**orderDate** | **int** | The date the customer submitted the sales order |
**buyerId** | **string** | Unique ID associated with the specified buyer | [optional]
**mart** | **string** | Mart information | [optional]
**isGuest** | **bool** | Indicates a guest customer | [optional]
**shippingInfo** | [**\Walmart\Model\DSV\US\Orders\ShipOrderLines200ResponseShippingInfo**](ShipOrderLines200ResponseShippingInfo.md) |  |
**orderLines** | [**\Walmart\Model\DSV\US\Orders\ShipOrderLines200ResponseOrderLines**](ShipOrderLines200ResponseOrderLines.md) |  |
**paymentTypes** | **string[]** | Payment Types | [optional]
**orderSummary** | [**\Walmart\Model\DSV\US\Orders\ShipOrderLines200ResponseOrderSummary**](ShipOrderLines200ResponseOrderSummary.md) |  | [optional]
**pickupPersons** | [**\Walmart\Model\DSV\US\Orders\ShipOrderLines200ResponsePickupPersonsInner[]**](ShipOrderLines200ResponsePickupPersonsInner.md) | List of pickup persons | [optional]
**shipNode** | [**\Walmart\Model\DSV\US\Orders\ShipOrderLines200ResponseShipNode**](ShipOrderLines200ResponseShipNode.md) |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/DSV) [[Back to README]](../../README.md)
