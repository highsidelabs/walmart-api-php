<?php

namespace Walmart\Enums;

final class ApiCategory extends AbstractEnum
{
    public const CONTENT_PROVIDER = 'cp';
    public const DROP_SHIP_VENDOR = 'dsv';
    public const MARKETPLACE = 'mp';
    public const WAREHOUSE_SUPPLIER = 'ws';

    public static function asCategoryName(string $category): string
    {
        return match ($category) {
            self::CONTENT_PROVIDER => 'contentProvider',
            self::DROP_SHIP_VENDOR => 'dropShipVendor',
            self::MARKETPLACE => 'marketplace',
            self::WAREHOUSE_SUPPLIER => 'warehouseSupplier',
        };
    }
}
