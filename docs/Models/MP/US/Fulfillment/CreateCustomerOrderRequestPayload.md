# #US\MP\CreateCustomerOrderRequestPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**orderChannelId** | **string** | Unique ID identifying channels from where the orders have been generated |
**sellerOrderId** | **string** | Unique ID identifying customer order request |
**orderPlacedTime** | **\DateTime** | Order placed time at respective channels |
**needsConfirmation** | **bool** | Flag to identify if confirmation is needed | [optional]
**partialFulfillments** | **bool** | Flag to identify if partial fulfilment is allowed | [optional]
**customer** | [**\Walmart\Models\MP\US\Fulfillment\CreateFulfillmentRequestPayloadCustomer**](CreateFulfillmentRequestPayloadCustomer.md) |  |
**orderItems** | [**\Walmart\Models\MP\US\Fulfillment\CreateFulfillmentRequestPayloadOrderItemsInner[]**](CreateFulfillmentRequestPayloadOrderItemsInner.md) | Order items details |


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
