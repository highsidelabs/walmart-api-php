# Walmart\Models\Supplier\US\Items\ItemResponses

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**errors** | [**\Walmart\Models\Supplier\US\Items\GatewayError[]**](GatewayError.md) |  | [optional]
**itemResponse** | [**\Walmart\Models\Supplier\US\Items\ItemResponse[]**](ItemResponse.md) | Items included in the response list |
**totalItems** | **int** | Total Items for the query | [optional]
**nextCursor** | **string** | Used for pagination when more than 200 items are retrieved. The nextCursor value of the response includes a link to another GET call which retrieves the next page of results. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
