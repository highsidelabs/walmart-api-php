<?php

namespace Walmart;

require_once __DIR__ . '/../vendor/autoload.php';

use BadMethodCallException;
use RuntimeException;
use Walmart\Api\CP\ContentProviderApi;
use Walmart\Api\DSV\DropShipVendorApi;
use Walmart\Api\MP\MarketplaceApi;
use Walmart\Api\WS\WarehouseSupplierApi;
use Walmart\Configuration;

abstract class Walmart
{
    /**
     * The configuration for this client.
     * @var Configuration
     */
    protected Configuration $config;

    /**
     * The country to API class map. This should be overwritten by every child class.
     * @var array<string, string[]>
     */
    protected static array $countryApiMap;

    /**
     * Create a new Walmart client.
     *
     * @param Configuration $config The configuration for this client.
     * @param ?string $country The country to use for this client.
     */
    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    /**
     * Enable calling country-specific APIs as single methods on this class, without needing to
     * specify the country outside $this->config or manually instantiate the API class.
     *
     * @param mixed $name The name of the method being called.
     * @param mixed $arguments The arguments passed to the callee.
     * @return mixed 
     * @throws BadMethodCallException
     * @throws RuntimeException
     */
    public function __call($name, $arguments)
    {
        // Don't override existing methods
        if (method_exists(get_class($this), $name)) {
            return $this->$name(...$arguments);
        }

        if (!array_key_exists($name, static::$countryApiMap)) {
            throw new BadMethodCallException("Method $name does not exist");
        }

        if (!array_key_exists($this->config->getCountry(), static::$countryApiMap[$name])) {
            $supportedCountriesStr = implode(', ', array_keys(static::$countryApiMap[$name]));
            throw new RuntimeException(
                "$name API is not supported in country {$this->config->getCountry()}. Supported country(ies): $supportedCountriesStr"
            );
        }

        $apiClass = static::$countryApiMap[$name][$this->config->getCountry()];
        return new $apiClass($this->config);
    }

    /**
     * Return an instance of the Content Provider API provider.
     *
     * @param Configuration $config
     * @return ContentProviderApi
     */
    public static function contentProvider(Configuration $config): ContentProviderApi
    {
        return new ContentProviderApi($config);
    }

    /**
     * Return an instance of the Drop Ship Vendor API provider.
     *
     * @param Configuration $config
     * @return DropShipVendorApi
     */
    public static function dropShipVendor(Configuration $config): DropShipVendorApi
    {
        return new DropShipVendorApi($config);
    }

    /**
     * Return an instance of the Marketplace API provider.
     *
     * @param Configuration $config
     * @return MarketplaceApi
     */
    public static function marketplace(Configuration $config): MarketplaceApi
    {
        return new MarketplaceApi($config);
    }

    /**
     * Return an instance of the Warehouse Supplier API provider.
     *
     * @param Configuration $config
     * @return WarehouseSupplierApi
     */
    public static function warehouseSupplier(Configuration $config): WarehouseSupplierApi
    {
        return new WarehouseSupplierApi($config);
    }
}
