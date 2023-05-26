<?php

namespace Walmart\Enums;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
final class Country extends AbstractEnum
{
    public const CA = 'ca';
    public const MX = 'mx';
    public const US = 'us';
}
