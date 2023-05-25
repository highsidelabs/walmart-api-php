<?php

namespace Walmart\Api\CP;

use Walmart\Api\CP\US;
use Walmart\Enums\Country;
use Walmart\Walmart;

class ContentProviderApi extends Walmart
{
    /**
     * The country to API class map
     * @var array<string, string[]>
     */
    protected static array $countryApiMap = [
        'feeds' => [
            Country::US => US\FeedsApi::class,
        ]
    ];
}
