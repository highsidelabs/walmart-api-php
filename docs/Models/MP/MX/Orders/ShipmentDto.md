# Walmart\Models\MP\MX\Orders\ShipmentDto

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**shipmentLines** | [**\Walmart\Models\MP\MX\Orders\ShipmentLine[]**](ShipmentLine.md) |  | [optional]
**carrier** | **string** | The package shipment carrier. Valid entries are: MX-FEDX, MX-DHL, Estafeta, SFC, Other.<br />if carrier is (MX-FEDX or MX-DHL or Estafeta or SFC)<br />&nbsp;&nbsp;&nbsp;&nbsp;then trackingNumber is Mandatory<br />if carrier is Other<br />&nbsp;&nbsp;&nbsp;&nbsp;then both trackingNumber & trackingURL is Mandatory<br /> | [optional]
**trackingNumber** | **string** | Tracking number of the order | [optional]
**trackingURL** | **string** | Tracking Url of the order | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
