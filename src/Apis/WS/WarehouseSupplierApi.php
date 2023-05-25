<?php

namespace Walmart\Apis\WS;

use Walmart\Apis\WS\US;
use Walmart\Enums\Country;
use Walmart\Walmart;

class WarehouseSupplierApi extends Walmart
{
    /**
     * The country to API class map
     * @var array<string, string[]>
     */
    protected static array $countryApiMap = [
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
