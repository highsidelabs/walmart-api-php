<?php

namespace Walmart\Auth;

require_once __DIR__ . '/../../vendor/autoload.php';

use DateTime;
use Walmart\Api\MP;
use Walmart\Configuration;

class AccessTokenAuth extends AbstractAuth
{
    /**
     * A map of client IDs to access tokens.
     * @var array[string => Walmart\Auth\AccessToken]
     */
    private static array $tokens = [];

    public function customHeaders(): array
    {
        return ['WM_SEC.ACCESS_TOKEN' => self::$tokens[$this->clientId]->accessToken];
    }

    /**
     * Authorize the client.
     *
     * @return void 
     */
    public function authorize(...$args): void
    {
        $tempConfig = new Configuration([
            'clientId' => $this->clientId,
            'clientSecret' => $this->clientSecret,
        ]);

        $authApi = new MP\US\AuthenticationApi($tempConfig);
        $authResponse = $authApi->tokenAPI('client_credentials');
        $accessToken = $authResponse->getAccessToken();

        self::$tokens[$this->clientId] = new AccessToken(
            $accessToken,
            new DateTime($authResponse->getExpiresIn() . ' seconds')
        );
    }

    public function authorized(): bool
    {
        return (
            array_key_exists($this->clientId, self::$tokens)
            && !self::$tokens[$this->clientId]->expired()
        );
    }
}
