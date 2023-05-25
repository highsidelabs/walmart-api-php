# #MX\MP\GetAllOrders200ResponseOrderInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**purchaseOrderId** | **string** | A unique ID associated with the seller's purchase order | [optional]
**customerOrderId** | **string** | A unique ID associated with the sales order for specified customer | [optional]
**customerEmailId** | **string** | The email address of the customer for the sales order | [optional]
**orderDate** | **string** | The date the customer submitted the sales order | [optional]
**shippingInfo** | [**\Walmart\Model\MP\MX\Orders\GetAllOrders200ResponseOrderInnerShippingInfo**](GetAllOrders200ResponseOrderInnerShippingInfo.md) |  | [optional]
**billingInfo** | [**\Walmart\Model\MP\MX\Orders\GetAllOrders200ResponseOrderInnerBillingInfo**](GetAllOrders200ResponseOrderInnerBillingInfo.md) |  | [optional]
**totalLines** | **string** | Total number of order lines in the order | [optional]
**totalQuantity** | **string** | Total number of items in all order lines in the order | [optional]
**orderLines** | [**\Walmart\Model\MP\MX\Orders\GetAllOrders200ResponseOrderInnerOrderLinesInner[]**](GetAllOrders200ResponseOrderInnerOrderLinesInner.md) | A list of order lines in the order | [optional]
**shipments** | [**\Walmart\Model\MP\MX\Orders\GetAllOrders200ResponseOrderInnerShipmentsInner[]**](GetAllOrders200ResponseOrderInnerShipmentsInner.md) | List of shipments associated with the order | [optional]
**orderTotal** | [**\Walmart\Model\MP\MX\Orders\GetAllOrders200ResponseOrderInnerOrderTotal**](GetAllOrders200ResponseOrderInnerOrderTotal.md) |  | [optional]
**rfc** | **string** | The RFC for the order | [optional]
**paymentMethod** | **string** | The payment method used to pay for the order | [optional]
**cfdi** | **string** | Reason code of the invoice.Example: 'P01' | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/MX/MP) [[Back to README]](../../README.md)
