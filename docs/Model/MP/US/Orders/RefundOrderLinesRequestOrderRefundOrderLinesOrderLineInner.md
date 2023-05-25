# #US\MP\RefundOrderLinesRequestOrderRefundOrderLinesOrderLineInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**lineNumber** | **string** |  |
**isFullRefund** | **bool** | Specifies that a full Refund is required to be set as true to do a full refund including all the applicable charges like tax and shipping. If full refund is set as false and full item price is entered in the charge amount field, applicable charges like tax and shipping will also be refunded to perform a full refund. In case of request containing multiple order lines, all order lines should either be of full refund scenario or partial refund but not both. Allowed values are true and false. | [optional] [default to false]
**refunds** | [**\Walmart\Model\MP\US\Orders\RefundOrderLinesRequestOrderRefundOrderLinesOrderLineInnerRefunds**](RefundOrderLinesRequestOrderRefundOrderLinesOrderLineInnerRefunds.md) |  |


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
