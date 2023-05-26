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
A PHP library for connecting to Walmart's [Marketplace](https://developer.walmart.com/home/us-mp/), [Drop Ship Vendor](https://developer.walmart.com/home/us-dsv/), [Content Provider](https://developer.walmart.com/home/us-cp/), and [Warehouse Supplier](https://developer.walmart.com/home/us-ws/) APIs, for the US, Canada, and Mexico.

### Related packages

* [`jlevers/selling-partner-api`](https://github.com/jlevers/selling-partner-api): A PHP library for Amazon's [Selling Partner API](https://developer-docs.amazon.com/sp-api/docs), with a similar interface to this package. Our most popular package.
* [`highsidelabs/laravel-spapi`](https://github.com/highsidelabs/laravel-spapi): An Laravel wrapper for the package above, making Selling Partner API integration in Laravel projects quick and easy.
* [`highsidelabs/amazon-business-api`](https://github.com/highsidelabs/amazon-business-api): A PHP library for Amazon's [Business API](https://developer-docs.amazon.com/amazon-business/docs), with a near-identical interface to [`jlevers/selling-partner-api`](https://github.com/jlevers/selling-partner-api).

---

**This package is developed and maintained by [Highside Labs](https://highsidelabs.co). If you need support integrating with Walmart's (or any other e-commerce platform's) APIs, we're happy to help! Shoot us an email at [hi@highsidelabs.co](mailto:hi@highsidelabs.co).**

If you've found any of our packages useful, please consider [becoming a Sponsor](https://github.com/sponsors/highsidelabs), or making a donation via the button below. We appreciate any and all support you can provide!

---

## Features

* Supports all Walmart API operations for Marketplace Sellers, Drop Ship Vendors, Content Providers, and Warehouse Suppliers as of 5/26/2023 ([see here](#supported-api-segments) for links to documentation for all calls)
* Supports the United States, Canada, and Mexico marketplaces
* Automatically handles all forms of authentication used by Walmart (basic auth, access tokens, and request signatures) with minimal configuration

## Installation

`composer require highsidelabs/walmart-api`

## Why make this library?

The existing Walmart client libraries for PHP are either incomplete, outdated, or both. This library aims to provide a complete, up-to-date, and easy-to-use interface for all of Walmart's APIs. We built it to scratch our own itch.


## Table of Contents 





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
$config = new Walmart\Configuration($clientId, $clientSecret);
```

If you are a Marketplace Seller selling in the US (which is likely true of most people using this API), that's all the configuration you need to do to start making calls to the Marketplace API. If you want to call the Drop Ship Vendor, Content Provider, or Warehouse Supplier APIs, or if you sell goods outside the US and need to make calls to the Marketplace API for, you'll need to provide additional configuration parameters, which are detailed in the [Configuration](#configuration) section below.

### Basic Usage

Once you've created an instance of the `Configuration` class, you can start making calls to the Walmart APIs. The `Walmart` class provides an easy interface for retrieving an instance of any API class, from any of the four major API categories (Marketplace, Drop Ship Vendor, Content Provider, Warehouse Supplier). For example, to retrieve an instance of the Marketplace `Authentication` API and check the status of your authentication token, you can do the following:

```php
use Walmart\Configuration;
use Walmart\Walmart;

$config = new Walmart\Configuration($clientId, $clientSecret);
$authApi = Walmart::marketplace($config)->auth();

// $authApi is an instance of Walmart\Apis\MP\US\AuthenticationApi
$tokenDetail = $authApi->getTokenDetail();
$tokenStatus = $tokenDetail->isValid;
var_dump($tokenStatus);
```

Similarly, the other API categories can be accessed via the `Walmart::dropShipVendor()`, `Walmart::contentProvider()`, and `Walmart::warehouseSupplier()` methods.


### Debug mode

To get debugging output when you make an API request, you can call `$config->setDebug()`. By default, debug output goes to `stdout` via `php://output`, but you can redirect it a file with `$config->setDebugFile('log/file/path.log')`.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Walmart\Configuration;

$config = new Configuration($clientId, $clientSecret);
$config->setDebug(true);
// To redirect debug info to a file:
$config->setDebugFile('debug.log');
```


## Supported API segments

This is an exhaustive list of all the APIs supported by this library, organized by API category and marketplace. For more information on each API, see the [Walmart Developer Portal](https://developer.walmart.com/).

### Marketplace

##### United States
* [Authentication API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/AuthenticationApi.md)
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/FeedsApi.md)
* [Fulfillment API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/FulfillmentApi.md)
* [Insights API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/InsightsApi.md)
* [Inventory API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/InventoryApi.md)
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ItemsApi.md)
* [Lag Time API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/LagTimeApi.md)
* [Listing Quality API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ListingQualityApi.md)
* [Notifications API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/NotificationsApi.md)
* [On Request Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/OnRequestReportsApi.md)
* [Orders API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/OrdersApi.md)
* [Prices API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/PricesApi.md)
* [Promotions API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/PromotionsApi.md)
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ReportsApi.md)
* [Returns API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/ReturnsApi.md)
* [Rules API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/RulesApi.md)
* [Settings API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/SettingsApi.md)
* [Utilities API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/US/UtilitiesApi.md)

##### Canada
* [Events API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/Api.md)
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/FeedsApi.md)
* [International Shipping API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/InternationalShippingApi.md)
* [Inventory API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/InventoryApi.md)
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/ItemsApi.md)
* [Orders API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/OrdersApi.md)
* [Prices API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/PricesApi.md)
* [Promotions API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/PromotionsApi.md)
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/CA/ReportsApi.md)

##### Mexico
* [Authentication API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/AuthenticationApi.md)
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/FeedsApi.md)
* [International Shipping API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/InternationalShippingApi.md)
* [Inventory API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/InventoryApi.md)
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/ItemsApi.md)
* [Orders API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/OrdersApi.md)
* [Prices API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/PricesApi.md)
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/ReportsApi.md)
* [Returns API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/MP/MX/ReturnsApi.md)


### Drop Ship Vendor

##### United States
* [Cost API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/CostApi.md)
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/FeedsApi.md)
* [Inventory API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/InventoryApi.md)
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/ItemsApi.md)
* [Lag Time API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/LagTimeApi.md)
* [Orders API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/OrdersApi.md)
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/DSV/US/ReportsApi.md)

### Content Provider

##### United States
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/CP/US/FeedsApi.md)

### Warehouse Supplier

##### United States
* [Feeds API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/WS/US/FeedsApi.md)
* [Items API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/WS/US/ItemsApi.md)
* [Reports API](https://github.com/highsidelabs/walmart-api-php/blob/main/docs/Apis/WS/US/ReportsApi.md)