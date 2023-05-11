<?php

namespace Walmart\Endpoint;

class TokenAPI extends \Walmart\Runtime\Client\BaseEndpoint implements \Walmart\Runtime\Client\Endpoint
{
    protected $accept;
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
     * @param array $accept Accept content header application/xml|application/json
     */
    public function __construct(\Walmart\Model\V3TokenPostBody $requestBody, array $headerParameters = array(), array $accept = array())
    {
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
        $this->accept = $accept;
    }
    use \Walmart\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/v3/token';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Walmart\Model\V3TokenPostBody) {
            return array(array('Content-Type' => array('application/x-www-form-urlencoded')), http_build_query($serializer->normalize($this->body, 'json')));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/xml', 'application/json'));
        }
        return $this->accept;
    }
    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('WM_CONSUMER.CHANNEL.TYPE'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('WM_CONSUMER.CHANNEL.TYPE', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Walmart\Model\V3TokenPostJsonResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Walmart\\Model\\V3TokenPostJsonResponse200', 'json');
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array('basicScheme');
    }
}