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
class V3TokenDetailGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Walmart\\Model\\V3TokenDetailGetResponse200';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Walmart\\Model\\V3TokenDetailGetResponse200';
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
        $object = new \Walmart\Model\V3TokenDetailGetResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('expire_at', $data)) {
            $object->setExpireAt($data['expire_at']);
            unset($data['expire_at']);
        }
        if (\array_key_exists('issued_at', $data)) {
            $object->setIssuedAt($data['issued_at']);
            unset($data['issued_at']);
        }
        if (\array_key_exists('is_valid', $data)) {
            $object->setIsValid($data['is_valid']);
            unset($data['is_valid']);
        }
        if (\array_key_exists('is_channel_match', $data)) {
            $object->setIsChannelMatch($data['is_channel_match']);
            unset($data['is_channel_match']);
        }
        if (\array_key_exists('scopes', $data)) {
            $object->setScopes($this->denormalizer->denormalize($data['scopes'], 'Walmart\\Model\\V3TokenDetailGetResponse200Scopes', 'json', $context));
            unset($data['scopes']);
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
        if ($object->isInitialized('expireAt') && null !== $object->getExpireAt()) {
            $data['expire_at'] = $object->getExpireAt();
        }
        if ($object->isInitialized('issuedAt') && null !== $object->getIssuedAt()) {
            $data['issued_at'] = $object->getIssuedAt();
        }
        if ($object->isInitialized('isValid') && null !== $object->getIsValid()) {
            $data['is_valid'] = $object->getIsValid();
        }
        if ($object->isInitialized('isChannelMatch') && null !== $object->getIsChannelMatch()) {
            $data['is_channel_match'] = $object->getIsChannelMatch();
        }
        if ($object->isInitialized('scopes') && null !== $object->getScopes()) {
            $data['scopes'] = $this->normalizer->normalize($object->getScopes(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}