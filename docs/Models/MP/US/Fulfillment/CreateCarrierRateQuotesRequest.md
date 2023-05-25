# #US\MP\CreateCarrierRateQuotesRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipmentId** | **string** |  |
**shipmentSource** | **string** |  |
**pickupFromDateTime** | **\DateTime** |  | [optional]
**pickupToDateTime** | **\DateTime** |  | [optional]
**deliveryFromDateTime** | **\DateTime** |  | [optional]
**deliveryToDateTime** | **\DateTime** |  | [optional]
**customer** | [**\Walmart\Models\MP\US\Fulfillment\CreateFulfillmentRequestPayloadCustomer**](CreateFulfillmentRequestPayloadCustomer.md) |  |
**originLocation** | [**\Walmart\Models\MP\US\Fulfillment\GetCarrierRateQuote200ResponseOriginLocation**](GetCarrierRateQuote200ResponseOriginLocation.md) |  |
**destinationLocation** | [**\Walmart\Models\MP\US\Fulfillment\GetCarrierRateQuote200ResponseOriginLocation**](GetCarrierRateQuote200ResponseOriginLocation.md) |  |
**returnLocation** | [**\Walmart\Models\MP\US\Fulfillment\GetCarrierRateQuote200ResponseReturnLocation**](GetCarrierRateQuote200ResponseReturnLocation.md) |  |
**shipmentPackages** | [**\Walmart\Models\MP\US\Fulfillment\GetCarrierRateQuote200ResponseShipmentPackagesInner[]**](GetCarrierRateQuote200ResponseShipmentPackagesInner.md) |  |
**mode** | **string** |  | [default to 'PARCEL']
**freightClass** | **string** |  | [optional]
**declaredValue** | **int** |  | [optional]
**loadTypes** | [**\Walmart\Models\MP\US\Fulfillment\CreateCarrierRateQuotesRequestLoadTypesInner[]**](CreateCarrierRateQuotesRequestLoadTypesInner.md) |  | [optional]


[[Back to Model list]](../) [[Back to API list]](../../Api/US/MP) [[Back to README]](../../README.md)
