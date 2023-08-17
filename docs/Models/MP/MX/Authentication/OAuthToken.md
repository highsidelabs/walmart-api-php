# Walmart\Models\MP\MX\Authentication\OAuthToken

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accessToken** | **string** | Access token to be used for accessing business APIs | [default to 'eyJraWQiOiI1MWY3MjM0Ny0wYWY5LTRhZ....']
**tokenType** | **string** | Type of token according to user. (e.g., 'BEARER') | [default to 'Bearer']
**expiresIn** | **int** | Expiry time of access token in seconds | [default to 900]
**refreshToken** | **string** | Token which should be used to refresh access token.<br /> This field is present in response when **grant_type: authorization_code** | [optional] [default to 'APXcIoTpKMH9OQN…….']


[[Back to Model list]](./) [[Back to API list]](../../../../../README.md#supported-apis) [[Back to README]](../../../../../README.md)
