<?php

namespace Walmart\Auth;

use DateTime;

class AccessToken
{
    public string $accessToken;
    public DateTime $expiresAt;

    public function __construct(string $accessToken, DateTime $expiresAt)
    {
        $this->accessToken = $accessToken;
        $this->expiresAt = $expiresAt;
    }

    public function expired(): bool
    {
        return $this->expiresAt < new DateTime();
    }
}