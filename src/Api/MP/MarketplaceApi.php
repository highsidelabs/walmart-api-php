<?php

namespace Walmart\Api\MP;

use Walmart\Api\MP\CA;
use Walmart\Api\MP\MX;
use Walmart\Api\MP\US;
use Walmart\Country;
use Walmart\Walmart;

class MarketplaceApi extends Walmart
{
    /**
     * The country to API class map
     * @var array<string, string[]>
     */
    protected static array $countryApiMap = [
        'auth' => [
            Country::MX => MX\AuthenticationAndAuthorizationApi::class,
            Country::US => US\AuthenticationApi::class,
        ],
        'events' => [
            Country::CA => CA\EventsApi::class,
        ],
        'feeds' => [
            Country::CA => CA\FeedsApi::class,
            Country::MX => MX\FeedsApi::class,
            Country::US => US\FeedsApi::class,
        ],
        'fulfillment' => [
            Country::US => US\FulfillmentApi::class,
        ],
        'insights' => [
            Country::US => US\InsightsApi::class,
        ],
        'inventory' => [
            Country::CA => CA\InventoryApi::class,
            Country::MX => MX\InventoryApi::class,
            Country::US => US\InventoryApi::class,
        ],
        'items' => [
            Country::CA => CA\ItemsApi::class,
            Country::MX => MX\ItemsApi::class,
            Country::US => US\ItemsApi::class,
        ],
        'lagtime' => [
            Country::US => US\LagTimeApi::class,
        ],
        'notifications' => [
            Country::US => US\NotificationsApi::class,
        ],
        'onrequestreports' => [
            Country::US => US\OnRequestReportsApi::class,
        ],
        'orders' => [
            Country::CA => CA\OrdersApi::class,
            Country::MX => MX\OrdersApi::class,
            Country::US => US\OrdersApi::class,
        ],
        'price' => [
            Country::CA => CA\PriceApi::class,
            Country::MX => MX\PriceApi::class,
            Country::US => US\PriceApi::class,
        ],
        'promotion' => [
            Country::CA => CA\PromotionApi::class,
            Country::MX => MX\PromotionApi::class,
            Country::US => US\PromotionApi::class,
        ],
        'reports' => [
            Country::CA => CA\ReportsApi::class,
            Country::MX => MX\ReportsApi::class,
            Country::US => US\ReportsApi::class,
        ],
        'returns' => [
            Country::MX => MX\ReturnsApi::class,
            Country::US => US\ReturnsApi::class,
        ],
        'shipping' => [
            Country::CA => CA\ShippingApi::class,
            Country::MX => MX\ShippingApi::class,
        ],
        'rules' => [
            Country::US => US\RulesApi::class,
        ],
        'settings' => [
            Country::US => US\SettingsApi::class,
        ],
        'utilities' => [
            Country::US => US\UtilitiesApi::class,
        ],
    ];
}
