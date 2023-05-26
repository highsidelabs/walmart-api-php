<?php

namespace Walmart\Enums;

use ReflectionClass;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
abstract class AbstractEnum
{
    /**
     * Get all the valid values of this "enum"
     *
     * @return array 
     */
    public static function all(): array
    {
        return array_values((new ReflectionClass(static::class))->getConstants());
    }

    /**
     * Check if the given value is a valid value for this enum
     *
     * @param string $value The value to check
     * @return bool 
     */
    public static function isValid(string $value): bool
    {
        return in_array($value, static::all(), true);
    }
}