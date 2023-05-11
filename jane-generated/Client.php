<?php

namespace Walmart;

class Client extends \Walmart\Runtime\Client\Client
{
    /**
     * Retrieves information on the access levels delegated by Sellers for their Solution Providers. The scope includes a range of API categories and their corresponding access levels, for example Reports: View Only, Item: Full Access, etc.
     *
     * @param array $headerParameters {
     *     @var string $WM_SEC.ACCESS_TOKEN The access token retrieved in the Token API call
     *     @var string $Authorization Basic authorization header. Base 64 encodes the Client ID and Client Secret retrieved in step two of the integration steps.
     *     @var string $WM_CONSUMER.CHANNEL.TYPE A unique ID to track the consumer request by channel. Use the Consumer Channel Type received during onboarding
     *     @var string $WM_QOS.CORRELATION_ID A unique ID which identifies each API call and used to track and debug issues; use a random generated GUID for this ID
     *     @var string $WM_SVC.NAME Walmart Service Name
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return null|\Walmart\Model\V3TokenDetailGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function getTokenDetail(array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Walmart\Endpoint\GetTokenDetail($headerParameters), $fetch);
    }
    /**
     * Get access token by providing Client ID and Client Secret.
     *
     * @param \Walmart\Model\V3TokenPostBody $requestBody 
     * @param array $headerParameters {
     *     @var string $Authorization Basic authorization header. Base 64 encodes the Client ID and Client Secret retrieved in step two of the integration steps.
     *     @var string $WM_CONSUMER.CHANNEL.TYPE A unique ID to track the consumer request by channel. Use the Consumer Channel Type received during onboarding
     *     @var string $WM_QOS.CORRELATION_ID A unique ID which identifies each API call and used to track and debug issues; use a random generated GUID for this ID
     *     @var string $WM_SVC.NAME Walmart Service Name
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array $accept Accept content header application/xml|application/json
     *
     * @return null|\Walmart\Model\V3TokenPostJsonResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function tokenAPI(\Walmart\Model\V3TokenPostBody $requestBody, array $headerParameters = array(), string $fetch = self::FETCH_OBJECT, array $accept = array())
    {
        return $this->executeEndpoint(new \Walmart\Endpoint\TokenAPI($requestBody, $headerParameters, $accept), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array(), array $additionalNormalizers = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://marketplace.walmartapis.com');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Walmart\Normalizer\JaneObjectNormalizer());
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}