# Walmart\Models\Supplier\US\Items\Error401

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**code** | **string** | Error code of the response.   UNAUTHORIZED.GMP_GATEWAY_API | [optional]
**field** | **string** | Indicate which field has the error.   Example: UNAUTHORIZED | [optional]
**description** | **string** | Description of error.  Example: Unauthorized | [optional]
**info** | **string** | Info of error.  Example: Unauthorized token or incorrect authorization header. Please verify correct format: \\\"Authorization: Basic Base64Encode(clientId:clientSecret)\\\" For more information, see https://developer.walmart.com/#/apicenter/marketPlace/latest#apiAuthentication. | [optional]
**severity** | **string** | Severity of Error.  Example: ERROR | [optional]
**category** | **string** | Category of error.  Example: DATA | [optional]
**causes** | **string[]** | Causes of error. | [optional]
**errorIdentifiers** | **object** | Error Identifiers of the error. | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
