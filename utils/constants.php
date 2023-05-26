<?php

const CONTENT_PROVIDER_API_CODE = 'cp';
const DROP_SHIP_VENDOR_API_CODE = 'dsv';
const MARKETPLACE_API_CODE = 'mp';
const WAREHOUSE_API_CODE = 'ws';

const API_VERSION = 'v3';

const VALID_OPTS = ['category::', 'country::', 'api-code::', 'help'];

const RESOURCE_DIR = __DIR__ . '/../resources';
const SCHEMA_DIR = RESOURCE_DIR . '/schemas';
const TEMPLATE_DIR = RESOURCE_DIR . '/templates';
const DOCS_DIR = __DIR__ . '/../docs';

const CUSTOM_API_DIR = 'Apis';
const CUSTOM_MODEL_DIR = 'Models';
const DEFAULT_API_DIR = 'Api';
const DEFAULT_MODEL_DIR = 'Model';


const LOGFILE = __DIR__ . '/../generate.log';

const BASIC_SCHEME_HEADER = 'Authorization';
const ACCESS_TOKEN_HEADER = 'WM_SEC.ACCESS_TOKEN';
const AUTH_SIG_HEADER = 'WM_SEC.AUTH_SIGNATURE';
const CONSUMER_ID_HEADER = 'WM_CONSUMER.ID';
const MARKET_HEADER = 'WM_MARKET';

const BASIC_SCHEME_NAME = 'basicScheme';
const ACCESS_TOKEN_SCHEME_NAME = 'accessTokenScheme';
const AUTH_SIG_SCHEME_NAME = 'signatureScheme';
const CONSUMER_ID_SCHEME_NAME = 'consumerIdScheme';
