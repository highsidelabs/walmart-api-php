<?php

/**
 * ItemsFailureResponse
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
 * Reviews Acceleration
 *
 * This class is auto-generated by the OpenAPI generator v6.6.0 (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Walmart\Models\MP\US\Reviews;

use Walmart\Models\BaseModel;

/**
 * ItemsFailureResponse Class Doc Comment
 *
 * @category Class

 * @description Items.

 * @package  Walmart
 * @author   Jesse Evers
 * @link     https://highsidelabs.co
 * @email    jesse@highsidelabs.co
 */
class ItemsFailureResponse extends BaseModel
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'ItemsFailureResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static array $openAPITypes = [
        'itemId' => 'string',
        'errorCode' => 'string',
        'errorDescription' => 'string',
        'category' => 'string',
        'severity' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'itemId' => null,
        'errorCode' => null,
        'errorDescription' => null,
        'category' => null,
        'severity' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'itemId' => false,
        'errorCode' => false,
        'errorDescription' => false,
        'category' => false,
        'severity' => false
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'itemId' => 'itemId',
        'errorCode' => 'errorCode',
        'errorDescription' => 'errorDescription',
        'category' => 'category',
        'severity' => 'severity'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'itemId' => 'setItemId',
        'errorCode' => 'setErrorCode',
        'errorDescription' => 'setErrorDescription',
        'category' => 'setCategory',
        'severity' => 'setSeverity'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'itemId' => 'getItemId',
        'errorCode' => 'getErrorCode',
        'errorDescription' => 'getErrorDescription',
        'category' => 'getCategory',
        'severity' => 'getSeverity'
    ];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('itemId', $data ?? [], null);
        $this->setIfExists('errorCode', $data ?? [], null);
        $this->setIfExists('errorDescription', $data ?? [], null);
        $this->setIfExists('category', $data ?? [], null);
        $this->setIfExists('severity', $data ?? [], null);
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];


        return $invalidProperties;
    }

    /**
     * Gets itemId
     *
     * @return string|null
    
     */
    public function getItemId()
    {
        return $this->container['itemId'];
    }

    /**
     * Sets itemId
     *
     * @param string|null $itemId Specifies the item identifier.
     *
     * @return self
    
     */
    public function setItemId($itemId)
    {
        if (is_null($itemId)) {
            throw new \InvalidArgumentException('non-nullable itemId cannot be null');
        }

        $this->container['itemId'] = $itemId;
        return $this;
    }

    /**
     * Gets errorCode
     *
     * @return string|null
    
     */
    public function getErrorCode()
    {
        return $this->container['errorCode'];
    }

    /**
     * Sets errorCode
     *
     * @param string|null $errorCode Error code.
     *
     * @return self
    
     */
    public function setErrorCode($errorCode)
    {
        if (is_null($errorCode)) {
            throw new \InvalidArgumentException('non-nullable errorCode cannot be null');
        }

        $this->container['errorCode'] = $errorCode;
        return $this;
    }

    /**
     * Gets errorDescription
     *
     * @return string|null
    
     */
    public function getErrorDescription()
    {
        return $this->container['errorDescription'];
    }

    /**
     * Sets errorDescription
     *
     * @param string|null $errorDescription Error description.
     *
     * @return self
    
     */
    public function setErrorDescription($errorDescription)
    {
        if (is_null($errorDescription)) {
            throw new \InvalidArgumentException('non-nullable errorDescription cannot be null');
        }

        $this->container['errorDescription'] = $errorDescription;
        return $this;
    }

    /**
     * Gets category
     *
     * @return string|null
    
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string|null $category Error category.
     *
     * @return self
    
     */
    public function setCategory($category)
    {
        if (is_null($category)) {
            throw new \InvalidArgumentException('non-nullable category cannot be null');
        }

        $this->container['category'] = $category;
        return $this;
    }

    /**
     * Gets severity
     *
     * @return string|null
    
     */
    public function getSeverity()
    {
        return $this->container['severity'];
    }

    /**
     * Sets severity
     *
     * @param string|null $severity Error severity.
     *
     * @return self
    
     */
    public function setSeverity($severity)
    {
        if (is_null($severity)) {
            throw new \InvalidArgumentException('non-nullable severity cannot be null');
        }

        $this->container['severity'] = $severity;
        return $this;
    }
}
