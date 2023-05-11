<?php

namespace Walmart\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Walmart\Runtime\Normalizer\CheckArray;
use Walmart\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ScopesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Walmart\\Model\\Scopes';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Walmart\\Model\\Scopes';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Walmart\Model\Scopes();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('reports', $data)) {
            $object->setReports($data['reports']);
            unset($data['reports']);
        }
        if (\array_key_exists('item', $data)) {
            $object->setItem($data['item']);
            unset($data['item']);
        }
        if (\array_key_exists('shipping', $data)) {
            $object->setShipping($data['shipping']);
            unset($data['shipping']);
        }
        if (\array_key_exists('price', $data)) {
            $object->setPrice($data['price']);
            unset($data['price']);
        }
        if (\array_key_exists('lagtime', $data)) {
            $object->setLagtime($data['lagtime']);
            unset($data['lagtime']);
        }
        if (\array_key_exists('feeds', $data)) {
            $object->setFeeds($data['feeds']);
            unset($data['feeds']);
        }
        if (\array_key_exists('returns', $data)) {
            $object->setReturns($data['returns']);
            unset($data['returns']);
        }
        if (\array_key_exists('orders', $data)) {
            $object->setOrders($data['orders']);
            unset($data['orders']);
        }
        if (\array_key_exists('rules', $data)) {
            $object->setRules($data['rules']);
            unset($data['rules']);
        }
        if (\array_key_exists('inventory', $data)) {
            $object->setInventory($data['inventory']);
            unset($data['inventory']);
        }
        if (\array_key_exists('content', $data)) {
            $object->setContent($data['content']);
            unset($data['content']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('reports') && null !== $object->getReports()) {
            $data['reports'] = $object->getReports();
        }
        if ($object->isInitialized('item') && null !== $object->getItem()) {
            $data['item'] = $object->getItem();
        }
        if ($object->isInitialized('shipping') && null !== $object->getShipping()) {
            $data['shipping'] = $object->getShipping();
        }
        if ($object->isInitialized('price') && null !== $object->getPrice()) {
            $data['price'] = $object->getPrice();
        }
        if ($object->isInitialized('lagtime') && null !== $object->getLagtime()) {
            $data['lagtime'] = $object->getLagtime();
        }
        if ($object->isInitialized('feeds') && null !== $object->getFeeds()) {
            $data['feeds'] = $object->getFeeds();
        }
        if ($object->isInitialized('returns') && null !== $object->getReturns()) {
            $data['returns'] = $object->getReturns();
        }
        if ($object->isInitialized('orders') && null !== $object->getOrders()) {
            $data['orders'] = $object->getOrders();
        }
        if ($object->isInitialized('rules') && null !== $object->getRules()) {
            $data['rules'] = $object->getRules();
        }
        if ($object->isInitialized('inventory') && null !== $object->getInventory()) {
            $data['inventory'] = $object->getInventory();
        }
        if ($object->isInitialized('content') && null !== $object->getContent()) {
            $data['content'] = $object->getContent();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}