# Walmart\Api\US\MPNotificationsApi  
All URIs are relative to https://marketplace.walmartapis.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSubscription()**](NotificationsApi.md#createSubscription) | **POST** /v3/webhooks/subscriptions | Create subscription |
| [**deleteSubscription()**](NotificationsApi.md#deleteSubscription) | **DELETE** /v3/webhooks/subscriptions/{subscriptionId} | Delete Subscription |
| [**getAllSubscriptions()**](NotificationsApi.md#getAllSubscriptions) | **GET** /v3/webhooks/subscriptions | All subscriptions |
| [**getEventTypes()**](NotificationsApi.md#getEventTypes) | **GET** /v3/webhooks/eventTypes | Event Types |
| [**testNotification()**](NotificationsApi.md#testNotification) | **POST** /v3/webhooks/test | Test Notification |
| [**updateSubscription()**](NotificationsApi.md#updateSubscription) | **PATCH** /v3/webhooks/subscriptions/{subscriptionId} | Update Subscription |


## `createSubscription()`

```php
createSubscription($createSubscriptionRequest): \Walmart\Model\MP\US\Notifications\CreateSubscription200Response
```
Create subscription

This API is used to create subscription for notification of an event by selecting an event type, event version, resource name, and providing event URL. One or more than one events can be subscribed for notifications in one subscription request.  Use Get Event Types API to get the list of event type, event version and resource name available for subscribing.  Configure an event URL to receive the notifications.  URL Authentication Options If authMethod is BASIC_AUTH, while making notification request to endpointUrl, Walmart system will pass authentication header with key as authHeaderName and value as BASE64 encoding of userName and password. If authMethod is HMAC, while making notification request to endpointUrl, Walmart system will pass authentication header with key as authHeaderName and value as HMACSHA256 of complete response, using clientSecret as key. If authMethod is OAUTH, Walmart system will make POST call to authUrl to generate token with request body as \"grant_type=client_credentials\" and headers as : Authorization header with key as authHeaderName and value as BASE64 encoding of clientId and clientSecret \"Accept\" :\"application/json; charset=UTF-8\" \"Content-type\":\"application/x-www-form-urlencoded; charset=ISO-8859-1\" Custom headers provided in headers field , if provided authURL should return HTTPS status 200 and response should have access_token and expires_in field. While making notification request to endpointUrl, Walmart system will pass access_token in headers with authHeaderName as key and value as Bearer <access_token> along with any other custom headers provided in headers field.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\NotificationsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$createSubscriptionRequest = {"events":[{"eventType":"OFFER_UNPUBLISHED","eventVersion":"V1","resourceName":"ITEM","eventUrl":"https://example.com/events","status":"ACTIVE"},{"eventType":"PO_CREATED","eventVersion":"V1","resourceName":"ORDER","eventUrl":"https://example.com/orders","status":"ACTIVE"}]}; // \Walmart\Model\MP\US\Notifications\CreateSubscriptionRequest | Request fields

try {
    $result = $apiInstance->createSubscription($createSubscriptionRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling NotificationsApi->createSubscription: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **createSubscriptionRequest** | [**\Walmart\Model\MP\US\Notifications\CreateSubscriptionRequest**](../Model/CreateSubscriptionRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Notifications\CreateSubscription200Response**](../Model/CreateSubscription200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSubscription()`

```php
deleteSubscription($subscriptionId): \Walmart\Model\MP\US\Notifications\DeleteSubscription200Response
```
Delete Subscription

This API is used to delete the subscription. Once deleted, the subscription cannot be retrieved.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\NotificationsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$subscriptionId = 'subscriptionId_example'; // string | Unique ID for the subscription

try {
    $result = $apiInstance->deleteSubscription($subscriptionId);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling NotificationsApi->deleteSubscription: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subscriptionId** | **string**| Unique ID for the subscription | |


### Return type

[**\Walmart\Model\MP\US\Notifications\DeleteSubscription200Response**](../Model/DeleteSubscription200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllSubscriptions()`

```php
getAllSubscriptions($subscriptionId, $eventType, $resourceName, $status): \Walmart\Model\MP\US\Notifications\GetAllSubscriptions200Response
```
All subscriptions

This API is used to retrieve the details of all subscriptions created using \"create subscription\" API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\NotificationsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$subscriptionId = 'subscriptionId_example'; // string | Use this to get details of a specific subscription
$eventType = 'eventType_example'; // string | Use this to get list of all subscriptions for a specific event type. Refer to Events section for list of available eventType.
$resourceName = 'resourceName_example'; // string | Use this to get list of all subscriptions for a specific resource. Refer to Events section for list of available resourceName.
$status = 'status_example'; // string | Use this to get list of all subscriptions in ACTIVE or INACTIVE status

try {
    $result = $apiInstance->getAllSubscriptions($subscriptionId, $eventType, $resourceName, $status);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling NotificationsApi->getAllSubscriptions: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subscriptionId** | **string**| Use this to get details of a specific subscription | [optional] |
| **eventType** | **string**| Use this to get list of all subscriptions for a specific event type. Refer to Events section for list of available eventType. | [optional] |
| **resourceName** | **string**| Use this to get list of all subscriptions for a specific resource. Refer to Events section for list of available resourceName. | [optional] |
| **status** | **string**| Use this to get list of all subscriptions in ACTIVE or INACTIVE status | [optional] |


### Return type

[**\Walmart\Model\MP\US\Notifications\GetAllSubscriptions200Response**](../Model/GetAllSubscriptions200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEventTypes()`

```php
getEventTypes(): \Walmart\Model\MP\US\Notifications\GetEventTypes200Response
```
Event Types

This API provides the list of event types and resource names that you can subscribe to. Notifications will be triggered only for the event types that you subscribe to using Create Subscription API .  Event Types are workflow events that are triggered when status or conditions change. Some examples are an offer moving from published to unpublished status, an order getting auto-cancelled by Walmart, a buy box price/winner change, etc.  Resource Names are functional API categories that group similar event types. Resource Names can be Item, Price, Orders, Inventory, etc. The permissions to subscribe to an Event Type is defined by Resource Name which is mapped to permissions in Delegated Access.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\NotificationsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);


try {
    $result = $apiInstance->getEventTypes();
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling NotificationsApi->getEventTypes: {$e->getMessage()}\n";
}
```

### ParametersThis endpoint does not need any parameter.


### Return type

[**\Walmart\Model\MP\US\Notifications\GetEventTypes200Response**](../Model/GetEventTypes200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `testNotification()`

```php
testNotification($testNotificationRequest): \Walmart\Model\MP\US\Notifications\TestNotification200Response
```
Test Notification

This API can be used to send a test notification to the destination URL with the sample payload.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\NotificationsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$testNotificationRequest = {"eventType":"OFFER_UNPUBLISHED","eventVersion":"V1","resourceName":"ITEM","eventUrl":"https://example.com/events","authDetails":{"authMethod":"BASIC_AUTH","userName":"abc","password":"test","authHeaderName":"Authorization"},"headers":{"content-type":"application/json"}}; // \Walmart\Model\MP\US\Notifications\TestNotificationRequest | Request fields

try {
    $result = $apiInstance->testNotification($testNotificationRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling NotificationsApi->testNotification: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **testNotificationRequest** | [**\Walmart\Model\MP\US\Notifications\TestNotificationRequest**](../Model/TestNotificationRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Notifications\TestNotification200Response**](../Model/TestNotification200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSubscription()`

```php
updateSubscription($subscriptionId, $updateSubscriptionRequest): \Walmart\Model\MP\US\Notifications\CreateSubscription200Response
```
Update Subscription

This API is used to update the details of subscriptions. You can update event version, event URL, headers, authentication details of a subscription using this API. You can also disable/enable the subscription by changing the status from ACTIVE to INACTIVE or vice versa .

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure access token authorization: accessTokenScheme
$accessToken = new Walmart\AccessToken('ACCESS_TOKEN', new DateTime('+900 seconds'));
$config = new Walmart\Configuration('CLIENT_ID', 'CLIENT_SECRET', ['accessToken' => $accessToken]);

$apiInstance = new Walmart\Api\NotificationsApi(  
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$subscriptionId = 'subscriptionId_example'; // string | Unique ID for the subscription
$updateSubscriptionRequest = {"eventUrl":"https://example.com/events","authDetails":{"authMethod":"BASIC_AUTH","userName":"abc","password":"test","authHeaderName":"Authorization"},"status":"ACTIVE"}; // \Walmart\Model\MP\US\Notifications\UpdateSubscriptionRequest | Request fields

try {
    $result = $apiInstance->updateSubscription($subscriptionId, $updateSubscriptionRequest);
    print_r($result);
} catch (Exception $e) {
    echo "Exception when calling NotificationsApi->updateSubscription: {$e->getMessage()}\n";
}
```

### Parameters| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **subscriptionId** | **string**| Unique ID for the subscription | |
| **updateSubscriptionRequest** | [**\Walmart\Model\MP\US\Notifications\UpdateSubscriptionRequest**](../Model/UpdateSubscriptionRequest.md)| Request fields | |


### Return type

[**\Walmart\Model\MP\US\Notifications\CreateSubscription200Response**](../Model/CreateSubscription200Response.md)

### Authorization

[accessTokenScheme](../../README.md#accessTokenScheme)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
