<?php

const CONTENT_PROVIDER_API_CODE = 'cp';
const DROP_SHIP_VENDOR_API_CODE = 'dsv';
const MARKETPLACE_API_CODE = 'mp';
const WAREHOUSE_API_CODE = 'ws';

const COUNTRY_CA = 'ca';
const COUNTRY_MX = 'mx';
const COUNTRY_US = 'us';

const API_VERSION = 'v3';

const VALID_OPTS = ['category::', 'country::', 'api-name::', 'help'];

const RESOURCE_DIR = __DIR__ . '/../resources';
const SCHEMA_DIR = RESOURCE_DIR . '/schemas';
const TEMPLATE_DIR = RESOURCE_DIR . '/templates';

const LOGFILE = __DIR__ . '/generate.log';

const BASIC_SCHEME_HEADER = 'Authorization';
const ACCESS_TOKEN_HEADER = 'WM_SEC.ACCESS_TOKEN';
const AUTH_SIG_HEADER = 'WM_SEC.AUTH_SIGNATURE';
const CONSUMER_ID_HEADER = 'WM_CONSUMER.ID';

const BASIC_SCHEME_NAME = 'basicScheme';
const ACCESS_TOKEN_SCHEME_NAME = 'accessTokenScheme';
const AUTH_SIG_SCHEME_NAME = 'signatureScheme';
const CONSUMER_ID_SCHEME_NAME = 'consumerIdScheme';
