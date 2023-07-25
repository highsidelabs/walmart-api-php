# Walmart\Models\MP\US\Orders\Order

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
**shippingInfo** | [**\Walmart\Models\MP\US\Orders\ShippingInfoType**](ShippingInfoType.md) |  |
**orderLines** | [**\Walmart\Models\MP\US\Orders\RefundLinesType**](RefundLinesType.md) |  |
**paymentTypes** | **string[]** | Payment Types | [optional]
**orderSummary** | [**\Walmart\Models\MP\US\Orders\OrderSummary**](OrderSummary.md) |  | [optional]
**pickupPersons** | [**\Walmart\Models\MP\US\Orders\PickupPerson[]**](PickupPerson.md) | List of pickup persons | [optional]
**shipNode** | [**\Walmart\Models\MP\US\Orders\ShipNodesType**](ShipNodesType.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
