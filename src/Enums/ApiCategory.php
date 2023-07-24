<?php

namespace Walmart\Enums;

final class ApiCategory extends AbstractEnum
{
    public const CONTENT_PROVIDER = 'cp';
    public const MARKETPLACE = 'mp';
    public const SUPPLIER = 'supplier';

    public static function asCategoryName(string $category): string
    {
        return match ($category) {
            self::CONTENT_PROVIDER => 'contentProvider',
            self::MARKETPLACE => 'marketplace',
            self::SUPPLIER => 'supplier',
        };
    }
}
