<?php

namespace Walmart\Enums;

// This is basically an enum, but since this library supports PHP 7.4 we can't use a literal enum
final class SecurityScheme extends AbstractEnum
{
    public const ACCESS_TOKEN = 'accessToken';
    public const BASIC = 'basic';
    public const CHANNEL_TYPE = 'channelType';
    public const CONSUMER_ID = 'consumerId';
    public const MARKET = 'market';
    public const PARTNER = 'partner';
    public const SIGNATURE = 'signature';
}
