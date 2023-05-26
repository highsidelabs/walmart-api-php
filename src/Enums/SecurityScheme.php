<?php

namespace Walmart\Enums;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
final class SecurityScheme extends AbstractEnum
{
    public const BASIC = 'basicScheme';
    public const ACCESS_TOKEN = 'accessTokenScheme';
    public const SIGNATURE = 'signatureScheme';
    public const CONSUMER_ID = 'consumerIdScheme';
}
