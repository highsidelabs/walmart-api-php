<?php

namespace Walmart\Enums;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
final class SecurityScheme extends AbstractEnum
{
    public const ACCESS_TOKEN = 'accessTokenScheme';
    public const BASIC = 'basicScheme';
    public const CHANNEL_TYPE = 'channelTypeScheme';
    public const CONSUMER_ID = 'consumerIdScheme';
    public const MARKET = 'marketScheme';
    public const PARTNER = 'partnerScheme';
    public const SIGNATURE = 'signatureScheme';
}
