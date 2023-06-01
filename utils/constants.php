<?php

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
