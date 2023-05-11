<?php

namespace Walmart\Normalizer;

use Walmart\Runtime\Normalizer\CheckArray;
use Walmart\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = array('Walmart\\Model\\Scopes' => 'Walmart\\Normalizer\\ScopesNormalizer', 'Walmart\\Model\\TokenDetailResponse' => 'Walmart\\Normalizer\\TokenDetailResponseNormalizer', 'Walmart\\Model\\TokenDetailResponseScopes' => 'Walmart\\Normalizer\\TokenDetailResponseScopesNormalizer', 'Walmart\\Model\\OAuthTokenDTO' => 'Walmart\\Normalizer\\OAuthTokenDTONormalizer', 'Walmart\\Model\\OAuthToken' => 'Walmart\\Normalizer\\OAuthTokenNormalizer', 'Walmart\\Model\\IAMTokenDTO' => 'Walmart\\Normalizer\\IAMTokenDTONormalizer', 'Walmart\\Model\\V3TokenDetailGetResponse200' => 'Walmart\\Normalizer\\V3TokenDetailGetResponse200Normalizer', 'Walmart\\Model\\V3TokenDetailGetResponse200Scopes' => 'Walmart\\Normalizer\\V3TokenDetailGetResponse200ScopesNormalizer', 'Walmart\\Model\\V3TokenPostBody' => 'Walmart\\Normalizer\\V3TokenPostBodyNormalizer', 'Walmart\\Model\\V3TokenPostXmlResponse200' => 'Walmart\\Normalizer\\V3TokenPostXmlResponse200Normalizer', 'Walmart\\Model\\V3TokenPostJsonResponse200' => 'Walmart\\Normalizer\\V3TokenPostJsonResponse200Normalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Walmart\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}