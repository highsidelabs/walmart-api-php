# Walmart\Models\MP\US\Fulfillment\CarrierQuoteRequestV2Wrapper

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipmentId** | **string** |  |
**shipmentSource** | **string** |  |
**pickupFromDateTime** | **\DateTime** |  | [optional]
**pickupToDateTime** | **\DateTime** |  | [optional]
**deliveryFromDateTime** | **\DateTime** |  | [optional]
**deliveryToDateTime** | **\DateTime** |  | [optional]
**customer** | [**\Walmart\Models\MP\US\Fulfillment\Customer**](Customer.md) |  |
**originLocation** | [**\Walmart\Models\MP\US\Fulfillment\DestinationLocation**](DestinationLocation.md) |  |
**destinationLocation** | [**\Walmart\Models\MP\US\Fulfillment\DestinationLocation**](DestinationLocation.md) |  |
**returnLocation** | [**\Walmart\Models\MP\US\Fulfillment\ReturnLocation**](ReturnLocation.md) |  |
**shipmentPackages** | [**\Walmart\Models\MP\US\Fulfillment\ShipmentPackage[]**](ShipmentPackage.md) |  |
**mode** | **string** |  | [default to 'PARCEL']
**freightClass** | **string** |  | [optional]
**declaredValue** | **int** |  | [optional]
**loadTypes** | [**\Walmart\Models\MP\US\Fulfillment\LoadType[]**](LoadType.md) |  | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
