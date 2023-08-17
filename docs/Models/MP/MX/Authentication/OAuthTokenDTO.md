# Walmart\Models\MP\MX\Authentication\OAuthTokenDTO

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accessToken** | **string** | Access token to be used for accessing business APIs |
**tokenType** | **string** | Type of token according to user. (e.g., 'BEARER') | [optional]
**expiresIn** | **int** | Expiry time of access token in seconds | [optional]
**refreshToken** | **string** | Token which should be used to refresh access token.<br /> This field is present in response when **grant_type: authorization_code** | [optional]


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
