<?php

/**
 * CategorizationResponsePayload
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Walmart
 * @author   Jesse Evers
 * @link     https://highsidelabs.co
 * @email    jesse@highsidelabs.co
 */

/**
 * Assortment Recommendations
 *
 * This class is auto-generated by the OpenAPI generator v6.6.0 (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Walmart\Models\MP\US\AssortmentRecommendations;

use Walmart\Models\BaseModel;

/**
 * CategorizationResponsePayload Class Doc Comment
 *
 * @category Class

 * @description Payload in the response having the categorization details about the item recommendations.

 * @package  Walmart
 * @author   Jesse Evers
 * @link     https://highsidelabs.co
 * @email    jesse@highsidelabs.co
 */
class CategorizationResponsePayload extends BaseModel
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'CategorizationResponsePayload';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static array $openAPITypes = [
        'categorizationType' => 'string',
        'meta' => '\Walmart\Models\MP\US\AssortmentRecommendations\MetaDataResponse',
        'records' => '\Walmart\Models\MP\US\AssortmentRecommendations\CategorizationFacet[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'categorizationType' => null,
        'meta' => null,
        'records' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'categorizationType' => false,
        'meta' => false,
        'records' => false
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'categorizationType' => 'categorizationType',
        'meta' => 'meta',
        'records' => 'records'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'categorizationType' => 'setCategorizationType',
        'meta' => 'setMeta',
        'records' => 'setRecords'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'categorizationType' => 'getCategorizationType',
        'meta' => 'getMeta',
        'records' => 'getRecords'
    ];


    public const CATEGORIZATION_TYPE_BRAND = 'BRAND';

    public const CATEGORIZATION_TYPE_CATEGORY = 'CATEGORY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCategorizationTypeAllowableValues()
    {
        return [
            self::CATEGORIZATION_TYPE_BRAND,
            self::CATEGORIZATION_TYPE_CATEGORY,
        ];
    }

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('categorizationType', $data ?? [], null);
        $this->setIfExists('meta', $data ?? [], null);
        $this->setIfExists('records', $data ?? [], null);
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getCategorizationTypeAllowableValues();
        if (!is_null($this->container['categorizationType']) && !in_array($this->container['categorizationType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'categorizationType', must be one of '%s'",
                $this->container['categorizationType'],
                implode("', '", $allowedValues)
            );
        }


        return $invalidProperties;
    }

    /**
     * Gets categorizationType
     *
     * @return string|null
    
     */
    public function getCategorizationType()
    {
        return $this->container['categorizationType'];
    }

    /**
     * Sets categorizationType
     *
     * @param string|null $categorizationType | Attribute | Description | Data Type | | --- | ----------- | ------- | | BRAND | To get list of brands which are associated with the assortment recommendations | string | | CATEGORY | To get list of categories which are associated with the assortment recommendations | string |
     *
     * @return self
    
     */
    public function setCategorizationType($categorizationType)
    {
        if (is_null($categorizationType)) {
            throw new \InvalidArgumentException('non-nullable categorizationType cannot be null');
        }
        $allowedValues = $this->getCategorizationTypeAllowableValues();
        if (!in_array($categorizationType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'categorizationType', must be one of '%s'",
                    $categorizationType,
                    implode("', '", $allowedValues)
                )
            );
        }

        $this->container['categorizationType'] = $categorizationType;
        return $this;
    }

    /**
     * Gets meta
     *
     * @return \Walmart\Models\MP\US\AssortmentRecommendations\MetaDataResponse|null
    
     */
    public function getMeta()
    {
        return $this->container['meta'];
    }

    /**
     * Sets meta
     *
     * @param \Walmart\Models\MP\US\AssortmentRecommendations\MetaDataResponse|null $meta meta
     *
     * @return self
    
     */
    public function setMeta($meta)
    {
        if (is_null($meta)) {
            throw new \InvalidArgumentException('non-nullable meta cannot be null');
        }

        $this->container['meta'] = $meta;
        return $this;
    }

    /**
     * Gets records
     *
     * @return \Walmart\Models\MP\US\AssortmentRecommendations\CategorizationFacet[]|null
    
     */
    public function getRecords()
    {
        return $this->container['records'];
    }

    /**
     * Sets records
     *
     * @param \Walmart\Models\MP\US\AssortmentRecommendations\CategorizationFacet[]|null $records Information of item recommendations based on the categorizationType.
     *
     * @return self
    
     */
    public function setRecords($records)
    {
        if (is_null($records)) {
            throw new \InvalidArgumentException('non-nullable records cannot be null');
        }

        $this->container['records'] = $records;
        return $this;
    }
}
