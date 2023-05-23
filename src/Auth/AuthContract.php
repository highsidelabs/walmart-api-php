<?php

namespace Walmart\Auth;

use Psr\Http\Message\RequestInterface;

require_once __DIR__ . '/../../vendor/autoload.php';

interface AuthContract
{
    public function authorize(...$args): void;
    public function authorized(): bool;
    public function signRequest(RequestInterface $request): RequestInterface;
}
