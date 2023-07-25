# Walmart\Models\MP\MX\Orders\Order

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**purchaseOrderId** | **string** | A unique ID associated with the seller's purchase order | [optional]
**customerOrderId** | **string** | A unique ID associated with the sales order for specified customer | [optional]
**customerEmailId** | **string** | The email address of the customer for the sales order | [optional]
**orderDate** | **string** | The date the customer submitted the sales order | [optional]
**shippingInfo** | [**\Walmart\Models\MP\MX\Orders\ShippingInfo**](ShippingInfo.md) |  | [optional]
**billingInfo** | [**\Walmart\Models\MP\MX\Orders\BillingInfo**](BillingInfo.md) |  | [optional]
**totalLines** | **string** | Total number of order lines in the order | [optional]
**totalQuantity** | **string** | Total number of items in all order lines in the order | [optional]
**orderLines** | [**\Walmart\Models\MP\MX\Orders\OrderLine[]**](OrderLine.md) | A list of order lines in the order | [optional]
**shipments** | [**\Walmart\Models\MP\MX\Orders\Shipment[]**](Shipment.md) | List of shipments associated with the order | [optional]
**orderTotal** | [**\Walmart\Models\MP\MX\Orders\OrderTotal**](OrderTotal.md) |  | [optional]
**rfc** | **string** | The RFC for the order | [optional]
**paymentMethod** | **string** | The payment method used to pay for the order | [optional]
**cfdi** | **string** | Reason code of the invoice.Example: 'P01' | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
