<p align="center">
    <a href="https://highsidelabs.co" target="_blank">
        <img src="https://github.com/highsidelabs/.github/blob/main/images/logo.png?raw=true" width="125">
    </a>
</p>

<p align="center">
    <a href="https://packagist.org/packages/highsidelabs/walmart-api"><img alt="Total downloads" src="https://img.shields.io/packagist/dt/highsidelabs/walmart-api.svg?style=flat-square"></a>
    <a href="https://packagist.org/packages/highsidelabs/walmart-api"><img alt="Latest stable version" src="https://img.shields.io/packagist/v/highsidelabs/walmart-api.svg?style=flat-square"></a>
    <a href="https://packagist.org/packages/highsidelabs/walmart-api"><img alt="License" src="https://img.shields.io/packagist/l/highsidelabs/walmart-api.svg?style=flat-square"></a>
</p>

## Walmart API for PHP
A PHP library for connecting to Walmart's [Marketplace](https://developer.walmart.com/home/us-mp/), [1P Supplier](https://developer.walmart.com/home/us-supplier/), and [Content Provider](https://developer.walmart.com/home/us-cp/) APIs, for the US, Canada, and Mexico.

### Related packages

* [`jlevers/selling-partner-api`](https://github.com/jlevers/selling-partner-api): A PHP library for Amazon's [Selling Partner API](https://developer-docs.amazon.com/sp-api/docs), with a similar interface to this package. Our most popular package.
* [`highsidelabs/laravel-spapi`](https://github.com/highsidelabs/laravel-spapi): A [Laravel](https://laravel.com) wrapper for the package above, making Selling Partner API integration in Laravel projects quick and easy.
* [`highsidelabs/amazon-business-api`](https://github.com/highsidelabs/amazon-business-api): A PHP library for Amazon's [Business API](https://developer-docs.amazon.com/amazon-business/docs), with a near-identical interface to [`jlevers/selling-partner-api`](https://github.com/jlevers/selling-partner-api).

---

**This package is developed and maintained by [Highside Labs](https://highsidelabs.co). If you need support integrating with Walmart's (or any other e-commerce platform's) APIs, we're happy to help! Shoot us an email at [hi@highsidelabs.co](mailto:hi@highsidelabs.co).**

If you've found any of our packages useful, please consider [becoming a Sponsor](https://github.com/sponsors/highsidelabs), or making a donation via the button below. We appreciate any and all support you can provide!

---

## Features

* Supports all Walmart API operations for Marketplace Sellers, 1P Suppliers, and Content Providers as of 7/24/2023 ([see here](#supported-api-segments) for links to documentation for all calls)
* Supports the United States, Canada, and Mexico marketplaces
* Automatically handles all forms of authentication used by Walmart (basic auth, access tokens, and request signatures) with minimal configuration

## Installation

`composer require highsidelabs/walmart-api`

## Why make this library?

The existing Walmart client libraries for PHP are either incomplete, outdated, or both. This library aims to provide a complete, up-to-date, and easy-to-use interface for all of Walmart's seller- and supplier-side APIs – not just the Marketplace API (which is the only one that other packages cover). We built it to scratch our own itch.


## Table of Contents 

* [Getting Started](#getting-started)
    * [Prerequisites](#prerequisites)
    * [Setup](#setup)
    * [Basic Usage](#basic-usage)
* [Documentation](#documentation)
    * [Configuration](#configuration)
    * [Using API classes](#using-api-classes)
    * [Using model classes](#using-model-classes)
    * [Authorization](#authorization)
        * [Basic auth](#basic-auth)
        * [Access token auth](#access-token-auth)
        * [Request signature auth](#request-signature-auth)
    * [Debug mode](#debug-mode)
    * [Supported API segments](#supported-api-segments)
        * [Marketplace](#marketplace)
        * [1P Supplier](#1p-supplier)
        * [Content Provider](#content-provider)
    * [Contributing](#contributing)


## Getting Started

### Prerequisites

You need a couple things to get started:
* A Walmart Seller and/or Supplier account
* A Walmart Client ID/Client secret pair, and/or a Walmart Consumer ID and private key

### Setup

The [`Configuration`](https://github.com/highsidelabs/walmart-api/blob/main/src/Configuration.php) constructor takes three arguments, which cover all the credentials you need to access the Walmart APIs:
* A client ID
* A client secret
* An optional array of additional configuration parameters

```php
use Walmart\Configuration;

$clientId = '<YOUR CLIENT ID>';
$clientSecret = '<YOUR CLIENT SECRET>';
$config = new Configuration([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);
```

If you are a Marketplace Seller selling in the US (which is likely true of most people using this API), that's all the configuration you need to do to start making calls to the Marketplace API. If you want to call the 1P Supplier or Content Provider APIs, or if you sell goods outside the US and need to make calls to the Marketplace API for, you'll need to provide additional configuration parameters, which are detailed in the [Configuration](#configuration) section below.

### Basic Usage

Once you've created an instance of the `Configuration` class, you can start making calls to the Walmart APIs. The `Walmart` class provides an easy interface for retrieving an instance of any API class, from any of the three major API categories (Marketplace, 1P Supplier, Content Provider). For example, to retrieve an instance of the Marketplace `Authentication` API and check the status of your authentication token, you can do the following:

```php
use Walmart\Configuration;
use Walmart\Walmart;

$config = new Configuration([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);
$authApi = Walmart::marketplace($config)->auth();

// $authApi is an instance of Walmart\Apis\MP\US\AuthenticationApi
$tokenDetail = $authApi->getTokenDetail();
$tokenStatus = $tokenDetail->isValid;
var_dump($tokenStatus);
```

Similarly, the other API categories can be accessed via the `Walmart::supplier()` and `Walmart::contentProvider()` methods.


## Documentation

### Configuration

The `Configuration` class is used to configure the client library. It takes a single options array as its only argument, which can contain the following keys:
- `clientId`: Your Walmart Client ID
- `clientSecret`: Your Walmart Client Secret
- `country`: The country you are selling in. Must be one of the values in `Walmart\Enums\Country`: `Country::US`, `Country::CA`, or `Country::MX`. Defaults to `Country::US`.
- `consumerId`: Your Walmart Consumer ID. Required if you are making requests to endpoints that use signature-based auth (see the [Authorization](#authorization) section)
- `privateKey`: Your Walmart private key. Ditto the requirements for the `consumerId` option.
- `channelType`: The channel type value you received during onboarding. Required in CA.
- `partnerId`: Your Walmart Partner ID. Required when using the Supplier APIs.
- `accessToken`: An instance of `Walmart\AccessToken`, containing an access token and its expiration time. If provided, this will be used instead of the client ID and secret to authenticate API calls, until the token expires. This is useful if you want to reuse an access token that you've already retrieved from Walmart. More details on access token auth [below](#access-token-auth).

If you try to instantiate an instance of an API class that is not supported in the country you've specified, an exception will be thrown.


### Using API classes

The API classes are divided into three categories: Marketplace, 1P Supplier, and Content Provider. Each category has its own namespace, and each country has its own sub-namespace. For example, the Marketplace APIs for Canada are located in the `Walmart\Apis\MP\CA` namespace, and the 1P Supplier APIs for the US are located in the `Walmart\Apis\Supplier\US` namespace.

To create an instance of an API class, start by using the `Walmart::marketplace()`, `Walmart::contentProvider()`, and `Walmart::supplier()` methods. All three methods take a single argument: an instance of `Walmart\Configuration`. Each of those methods returns a helper class that provides access to all the API classes in that category for the country you've specified in the `Configuration` object (US by default). See the [Supported API segments](#supported-api-segments) section below for a list of all the APIs supported by this library, organized by API category.

Once you have an instance of an API class, you can call any of the endpoint methods defined in [the documentation](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis). The API class documentation is divided by API category and then country, because the same API may have different endpoints and/or parameters in different countries. Make sure you're looking at the correct documentation for the country you're actually selling in!

Some endpoints have a LOT of parameters. If you're using PHP 8 or later, you can use named arguments to make your code more readable. For instance, the Marketplace Feeds API in the US has a [`getAllItems`](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ItemsApi.md#getallitems) call that takes up to 7 parameters. If you only want to pass some of them, you can do this:

```php
use Walmart\Configuration;
use Walmart\Walmart;

$config = new Configuration([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);
$itemsApi = Walmart::marketplace($config)->items();

$response = $itemsApi->getAllItems(
    sku: '1234567890',
    lifecycleStatus: 'PUBLISHED',
    variantGroupId: '9876543210'
);
```

Instead of this:

```php
use Walmart\Configuration;
use Walmart\Walmart;

$config = new Configuration([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);
$itemsApi = Walmart::marketplace($config)->items();

$response = $itemsApi->getAllItems(
    null,  // $nextCursor
    '1234567890',  // $sku,
    null,  // $offset
    null,  // $limit
    'PUBLISHED',  // $lifecycleStatus
    null,  // $publishedStatus
    '9876543210'  // $variantGroupId
);
```

API methods often take model classes as parameters, and return them as API responses – let's look at how model classes work.


### Using model classes

In order to represent the various data structures that the APIs ingest and return, this library uses model classes. Each model class represents a single data structure, and has a constructor that takes an associative array of data. The model class documentation is divided by API category, country, and API class. Documentation for each model class is nested inside the `docs/Models` folder corresponding to the model class's location in the `src/Models` folder. For instance, the response model for the Marketplace Authorization API's `getTokenDetail` method in the US is [`Walmart\Models\MP\US\Authorization\TokenDetailResponse`](https://github.com/highsidelabs/walmart-api-php/blob/main/src/Models/MP/US/Authentication/TokenDetailResponse.php), and the docs are at [`docs/Models/MP/US/Authorization/TokenDetailResponse.md`](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Models/MP/US/Authentication/TokenDetailResponse.md).


### Authorization

Walmart uses three different forms of authentication for its APIs: basic auth, access tokens, and request signatures. This library handles all three automatically, so you shouldn't have to think about them much...but if you're curious about how it works, read on.

#### Basic auth
This the standard, simplest form of authentication. It uses the Walmart client ID and client secret that are passed to the `Configuration` constructor in order to generate an authorization header value. It's also used to generate an access token if necessary, which is why these are the two required parameters for the `Configuration` constructor.

#### Access token auth
For a lot of the Marketplace API, Walmart uses access token authentication. The access token is a short-lived token (15min) that is generated by Walmart with the client ID and client secret, and then used to authenticate API calls. This library automatically handles the generation and renewal of access tokens, so you don't have to worry about it. If you want to reuse an access token that you've already retrieved from Walmart, you can pass it to the `Configuration` constructor via the `accessToken` option.

#### Request signature auth
For most of the rest of the APIs aside from the Marketplace API, Walmart uses request signature auth. This is just another value that is passed as a header, and it is generated using the request method and path, a timestamp, and your consumer ID and private key. If you're making requests that involve signature auth, you need to pass the `privateKey` and `consumerId` options to the `Configuration` constructor's options array.


### Debug mode

To get debugging output when you make an API request, you can call `$config->setDebug()`. By default, debug output goes to `stdout` via `php://output`, but you can redirect it a file with `$config->setDebugFile('log/file/path.log')`.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Walmart\Configuration;

$config = new Configuration([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);
$config->setDebug(true);
// To redirect debug info to a file:
$config->setDebugFile('debug.log');
```


### Supported API segments

This is an exhaustive list of all the APIs supported by this library, organized by API category. Not all APIs are supported in all countries. For more information on each API, see the [Walmart Developer Portal](https://developer.walmart.com/).

#### Marketplace

* [Authentication API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/AuthenticationApi.md): `Walmart::marketplace($config)->auth()` (MX, US)
* [Events API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/Api.md): `Walmart::marketplace($config)->events()` (CA only)
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/FeedsApi.md): `Walmart::marketplace($config)->feeds()` (CA, MX, US)
* [Fulfillment API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/FulfillmentApi.md): `Walmart::marketplace($config)->fulfillment()` (US)
* [Insights API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/InsightsApi.md): `Walmart::marketplace($config)->insights()` (US only)
* [International Shipping API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/InternationalShippingApi.md): `Walmart::marketplace($config)->internationalShipping()` (CA, MX)
* [Inventory API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/InventoryApi.md): `Walmart::marketplace($config)->inventory()` (CA, MX, US)
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ItemsApi.md): `Walmart::marketplace($config)->items()` (CA, MX, US)
* [Lag Time API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/LagTimeApi.md): `Walmart::marketplace($config)->lagTime()` (US only)
* [Listing Quality API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ListingQualityApi.md): `Walmart::marketplace($config)->listingQuality()` (US only)
* [Notifications API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/NotificationsApi.md): `Walmart::marketplace($config)->notifications()` (US only)
* [On Request Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/OnRequestReportsApi.md): `Walmart::marketplace($config)->onRequestReports()` (US only)
* [Orders API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/OrdersApi.md): `Walmart::marketplace($config)->orders()` (CA, MX, US)
* [Prices API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/PricesApi.md): `Walmart::marketplace($config)->prices()` (CA, MX, US)
* [Promotions API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/PromotionsApi.md): `Walmart::marketplace($config)->promotions()` (CA, US)
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ReportsApi.md): `Walmart::marketplace($config)->reports()` (CA, MX, US)
* [Returns API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ReturnsApi.md): `Walmart::marketplace($config)->returns()` (MX, US)
* [Rules API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/RulesApi.md): `Walmart::marketplace($config)->rules()` (US only)
* [Settings API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/SettingsApi.md): `Walmart::marketplace($config)->settings()` (US only)
* [Utilities API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/UtilitiesApi.md): `Walmart::marketplace($config)->utilities()` (US only)


#### 1P Supplier

_Note_: The 1P Supplier APIs are currently only available in the US.

* [Cost API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/CostApi.md): `Walmart::supplier($config)->cost()`
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/FeedsApi.md): `Walmart::supplier($config)->feeds()`
* [Inventory API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/InventoryApi.md): `Walmart::supplier($config)->inventory()`
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/ItemsApi.md): `Walmart::supplier($config)->items()`
* [Lag Time API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/LagTimeApi.md): `Walmart::supplier($config)->lagTime()`
* [Orders API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/OrdersApi.md): `Walmart::supplier($config)->orders()`
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/Supplier/US/ReportsApi.md): `Walmart::supplier($config)->reports()`

#### Content Provider

_Note_: The Content Provider APIs are currently only available in the US.

* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/CP/US/FeedsApi.md): `Walmart::contentProvider($config)->feeds()`


## Contributing

Thanks for making it all the way down here! We welcome your contributions...the open-source world runs on people like you.

## Pull requests

Please ask (via an issue) before submitting a pull request for any significant feature work. It sucks to put a lot of effort into something only to have it rejected for reasons other than the quality of your code. (_Author's note: don't ask me how I know._) That said, we're open to contributions from anyone, and we'll do our best to get your code merged. Please be patient – we're not ignoring you, but it might take us some time to get to your PR.

Before submitting a PR, please format your code with `composer lint`.
