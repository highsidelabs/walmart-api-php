<?php

/**
 * GetFulfillmentOrdersStatus200ResponsePayloadInnerShipmentsInnerShipmentLinesInner
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
 * Fulfillment Management
 *
 * This class is auto-generated by the OpenAPI generator v6.6.0 (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Walmart\Models\MP\US\Fulfillment;
use Walmart\Models\BaseModel;

/**
 * GetFulfillmentOrdersStatus200ResponsePayloadInnerShipmentsInnerShipmentLinesInner Class Doc Comment
 *
 * @category Class

 * @description Shipment line details

 * @package  Walmart
 * @author   Jesse Evers
 * @link     https://highsidelabs.co
 * @email    jesse@highsidelabs.co
 */
class GetFulfillmentOrdersStatus200ResponsePayloadInnerShipmentsInnerShipmentLinesInner extends BaseModel
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'getFulfillmentOrdersStatus_200_response_payload_inner_shipments_inner_shipmentLines_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static array $openAPITypes = [
        'shipmentLineNo' => 'string',
        'fulfillerLineId' => 'string',
        'quantity' => '\Walmart\Models\MP\US\Fulfillment\GetFulfillmentOrdersStatus200ResponsePayloadInnerShipmentsInnerShipmentLinesInnerQuantity'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'shipmentLineNo' => null,
        'fulfillerLineId' => null,
        'quantity' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'shipmentLineNo' => false,
        'fulfillerLineId' => false,
        'quantity' => false
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'shipmentLineNo' => 'shipmentLineNo',
        'fulfillerLineId' => 'fulfillerLineId',
        'quantity' => 'quantity'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'shipmentLineNo' => 'setShipmentLineNo',
        'fulfillerLineId' => 'setFulfillerLineId',
        'quantity' => 'setQuantity'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'shipmentLineNo' => 'getShipmentLineNo',
        'fulfillerLineId' => 'getFulfillerLineId',
        'quantity' => 'getQuantity'
    ];/**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('shipmentLineNo', $data ?? [], null);
        $this->setIfExists('fulfillerLineId', $data ?? [], null);
        $this->setIfExists('quantity', $data ?? [], null);
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
     * Gets shipmentLineNo
     *
     * @return string|null
    
     */
    public function getShipmentLineNo()
    {
        return $this->container['shipmentLineNo'];
    }

    /**
     * Sets shipmentLineNo
     *
     * @param string|null $shipmentLineNo Shipment line number
     *
     * @return self
    
     */
    public function setShipmentLineNo($shipmentLineNo)
    {
        if (is_null($shipmentLineNo)) {
            throw new \InvalidArgumentException('non-nullable shipmentLineNo cannot be null');
        }

        $this->container['shipmentLineNo'] = $shipmentLineNo;
        return $this;
    }

    /**
     * Gets fulfillerLineId
     *
     * @return string|null
    
     */
    public function getFulfillerLineId()
    {
        return $this->container['fulfillerLineId'];
    }

    /**
     * Sets fulfillerLineId
     *
     * @param string|null $fulfillerLineId Shipment fulfiller LineId
     *
     * @return self
    
     */
    public function setFulfillerLineId($fulfillerLineId)
    {
        if (is_null($fulfillerLineId)) {
            throw new \InvalidArgumentException('non-nullable fulfillerLineId cannot be null');
        }

        $this->container['fulfillerLineId'] = $fulfillerLineId;
        return $this;
    }

    /**
     * Gets quantity
     *
     * @return \Walmart\Models\MP\US\Fulfillment\GetFulfillmentOrdersStatus200ResponsePayloadInnerShipmentsInnerShipmentLinesInnerQuantity|null
    
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param \Walmart\Models\MP\US\Fulfillment\GetFulfillmentOrdersStatus200ResponsePayloadInnerShipmentsInnerShipmentLinesInnerQuantity|null $quantity quantity
     *
     * @return self
    
     */
    public function setQuantity($quantity)
    {
        if (is_null($quantity)) {
            throw new \InvalidArgumentException('non-nullable quantity cannot be null');
        }

        $this->container['quantity'] = $quantity;
        return $this;
    }
}

