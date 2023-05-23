<?php

namespace Walmart;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
final class Country
{
    public const CA = 'ca';
    public const MX = 'mx';
    public const US = 'us';

    public static function all(): array
    {
        return [self::CA, self::MX, self::US];
    }

    public static function isValid(string $country): bool
    {
        return in_array($country, self::all(), true);
    }
}
