<?php

namespace Walmart\Apis\Supplier;

use Walmart\Apis\Supplier\US;
use Walmart\Enums\Country;
use Walmart\Walmart;

class SupplierApi extends Walmart
{
    /**
     * The country to API class map
     * @var array<string, string[]>
     */
    protected static array $countryApiMap = [
        'dsvCost' => [
            Country::US => US\DSVCostApi::class,
        ],
        'dsvInventory' => [
            Country::US => US\DSVInventoryApi::class,
        ],
        'dsvLagTime' => [
            Country::US => US\DSVLagTimeApi::class,
        ],
        'dsvOrders' => [
            Country::US => US\DSVOrdersApi::class,
        ],
        'feeds' => [
            Country::US => US\FeedsApi::class,
        ],
        'items' => [
            Country::US => US\ItemsApi::class,
        ],
        'reports' => [
            Country::US => US\ReportsApi::class,
        ],
    ];
}
