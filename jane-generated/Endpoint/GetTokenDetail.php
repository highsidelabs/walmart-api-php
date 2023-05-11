<?php

namespace Walmart\Endpoint;

class GetTokenDetail extends \Walmart\Runtime\Client\BaseEndpoint implements \Walmart\Runtime\Client\Endpoint
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
     */
    public function __construct(array $headerParameters = array())
    {
        $this->headerParameters = $headerParameters;
    }
    use \Walmart\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/v3/token/detail';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('WM_SEC.ACCESS_TOKEN', 'WM_CONSUMER.CHANNEL.TYPE'));
        $optionsResolver->setRequired(array('WM_SEC.ACCESS_TOKEN'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('WM_SEC.ACCESS_TOKEN', array('string'));
        $optionsResolver->addAllowedTypes('WM_CONSUMER.CHANNEL.TYPE', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Walmart\Model\V3TokenDetailGetResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Walmart\\Model\\V3TokenDetailGetResponse200', 'json');
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('basicScheme');
    }
}