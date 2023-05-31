# Walmart\Models\MP\US\Orders\GetAnOrder200Response

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
**shippingInfo** | [**\Walmart\Models\MP\US\Orders\GetAnOrder200ResponseShippingInfo**](GetAnOrder200ResponseShippingInfo.md) |  |
**orderLines** | [**\Walmart\Models\MP\US\Orders\GetAnOrder200ResponseOrderLines**](GetAnOrder200ResponseOrderLines.md) |  |
**paymentTypes** | **string[]** | Payment Types | [optional]
**orderSummary** | [**\Walmart\Models\MP\US\Orders\GetAnOrder200ResponseOrderSummary**](GetAnOrder200ResponseOrderSummary.md) |  | [optional]
**pickupPersons** | [**\Walmart\Models\MP\US\Orders\GetAnOrder200ResponsePickupPersonsInner[]**](GetAnOrder200ResponsePickupPersonsInner.md) | List of pickup persons | [optional]
**shipNode** | [**\Walmart\Models\MP\US\Orders\GetAnOrder200ResponseShipNode**](GetAnOrder200ResponseShipNode.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
