# Walmart\Models\Supplier\US\DSVOrders\GetOrderResponseRecord

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
**shippingInfo** | [**\Walmart\Models\Supplier\US\DSVOrders\ShippingInfoType**](ShippingInfoType.md) |  |
**orderLines** | [**\Walmart\Models\Supplier\US\DSVOrders\CancelLinesType**](CancelLinesType.md) |  |
**paymentTypes** | **string[]** | Payment Types | [optional]
**orderSummary** | [**\Walmart\Models\Supplier\US\DSVOrders\OrderSummary**](OrderSummary.md) |  | [optional]
**pickupPersons** | [**\Walmart\Models\Supplier\US\DSVOrders\PickupPerson[]**](PickupPerson.md) | List of pickup persons | [optional]
**shipNode** | [**\Walmart\Models\Supplier\US\DSVOrders\ShipNodesType**](ShipNodesType.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
