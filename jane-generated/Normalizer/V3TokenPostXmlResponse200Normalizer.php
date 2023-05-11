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
class V3TokenPostXmlResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Walmart\\Model\\V3TokenPostXmlResponse200';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Walmart\\Model\\V3TokenPostXmlResponse200';
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
        $object = new \Walmart\Model\V3TokenPostXmlResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('accessToken', $data)) {
            $object->setAccessToken($data['accessToken']);
            unset($data['accessToken']);
        }
        if (\array_key_exists('tokenType', $data)) {
            $object->setTokenType($data['tokenType']);
            unset($data['tokenType']);
        }
        if (\array_key_exists('expiresIn', $data)) {
            $object->setExpiresIn($data['expiresIn']);
            unset($data['expiresIn']);
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
        $data['accessToken'] = $object->getAccessToken();
        if ($object->isInitialized('tokenType') && null !== $object->getTokenType()) {
            $data['tokenType'] = $object->getTokenType();
        }
        if ($object->isInitialized('expiresIn') && null !== $object->getExpiresIn()) {
            $data['expiresIn'] = $object->getExpiresIn();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}