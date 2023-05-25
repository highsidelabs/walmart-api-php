<?php

namespace Walmart\Apis\DSV;

use Walmart\Apis\DSV\US;
use Walmart\Enums\Country;
use Walmart\Walmart;

class DropShipVendorApi extends Walmart
{
    /**
     * The country to API class map
     * @var array<string, string[]>
     */
    protected static array $countryApiMap = [
        'cost' => [
            Country::US => US\CostApi::class,
        ],
        'feeds' => [
            Country::US => US\FeedsApi::class,
        ],
        'inventory' => [
            Country::US => US\InventoryApi::class,
        ],
        'items' => [
            Country::US => US\ItemsApi::class,
        ],
        'lagtime' => [
            Country::US => US\LagTimeApi::class,
        ],
        'orders' => [
            Country::US => US\OrdersApi::class,
        ],
        'reports' => [
            Country::US => US\ReportsApi::class,
        ],
    ];
}
