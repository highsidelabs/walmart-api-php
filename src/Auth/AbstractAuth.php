<?php

namespace Walmart\Auth;

use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Ramsey\Uuid\Uuid;
use Walmart\Country;
use Walmart\Walmart;

abstract class AbstractAuth implements AuthContract
{
    /**
     * The client ID for the Walmart API.
     * @var string
     */
    protected string $clientId;

    /**
     * The client secret for the Walmart API.
     * @var string
     */
    protected string $clientSecret;

    /**
     * The country to make requests in.
     * @var string
     */
    protected string $country;

    /**
     * Create a new auth instance.
     *
     * @param string $clientId The client ID
     * @param string $clientSecret The client secret
     * @param string $country The country to make requests in. Should be one of the constants in Walmart\Country.
     * @return void 
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $country = Country::US
    ) {
        if (!in_array($country, [Country::CA, Country::MX, Country::US])) {
            throw new InvalidArgumentException('Country must be one of the constants defined in Walmart\Country.');
        }

        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->country = $country;
    }

    /**
     * Signs the Walmart API request.
     *
     * @param RequestInterface $request The request to sign
     *
     * @throws InvalidArgumentException
     * @return RequestInterface The signed request
     */
    public function signRequest(RequestInterface $request): RequestInterface
    {
        if (!$this->authorized()) {
            $this->authorize();
        }

        $headers = array_merge(
            $this->sharedHeaders(),
            $this->customHeaders(),
        );

        foreach ($headers as $headerName => $headerValue) {
            $request = $request->withHeader($headerName, $headerValue);
        }

        return $request;
    }

    public function sharedHeaders(): array
    {
        return [
            'WM_SVC.NAME' => 'highsidelabs/walmart-api',
            'WM_QOS.CORRELATION_ID' => Uuid::uuid4(),
            'WM_CONSUMER.CHANNEL.TYPE' => '',
            // These aren't required by every endpoint, but many use them and passing the when they're
            // not needed doesn't adversely affect the request
            'WM_MARKET' => strtoupper($this->country),
            'WM_TIMESTAMP' => time(),
        ];
    }

    /**
     * Returns the headers for the request that are specific to the authentication strategy.
     *
     * @return array
     */
    abstract public function customHeaders(): array;
}
