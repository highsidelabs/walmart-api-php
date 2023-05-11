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
class V3TokenPostJsonResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Walmart\\Model\\V3TokenPostJsonResponse200';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Walmart\\Model\\V3TokenPostJsonResponse200';
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
        $object = new \Walmart\Model\V3TokenPostJsonResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('access_token', $data)) {
            $object->setAccessToken($data['access_token']);
            unset($data['access_token']);
        }
        if (\array_key_exists('token_type', $data)) {
            $object->setTokenType($data['token_type']);
            unset($data['token_type']);
        }
        if (\array_key_exists('expires_in', $data)) {
            $object->setExpiresIn($data['expires_in']);
            unset($data['expires_in']);
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
        $data['access_token'] = $object->getAccessToken();
        if ($object->isInitialized('tokenType') && null !== $object->getTokenType()) {
            $data['token_type'] = $object->getTokenType();
        }
        if ($object->isInitialized('expiresIn') && null !== $object->getExpiresIn()) {
            $data['expires_in'] = $object->getExpiresIn();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}