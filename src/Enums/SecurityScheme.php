<?php

namespace Walmart\Enums;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
final class SecurityScheme extends AbstractEnum
{
    const BASIC = 'basicScheme';
    const ACCESS_TOKEN = 'accessTokenScheme';
    const SIGNATURE = 'signatureScheme';
    const CONSUMER_ID = 'consumerIdScheme';
}
