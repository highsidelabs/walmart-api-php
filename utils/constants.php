<?php

const VALID_OPTS = ['category::', 'country::', 'api-code::', 'help'];

const RESOURCE_DIR = __DIR__ . '/../resources';
const MODEL_DIR = RESOURCE_DIR . '/schemas/models';
const MODEL_MODIFICATIONS_DIR = RESOURCE_DIR . '/schemas/modifications';
const TEMPLATE_DIR = RESOURCE_DIR . '/templates';
const DOCS_DIR = __DIR__ . '/../docs';

const CUSTOM_API_DIR = 'Apis';
const CUSTOM_MODEL_DIR = 'Models';
const DEFAULT_API_DIR = 'Api';
const DEFAULT_MODEL_DIR = 'Model';

const LOGFILE = __DIR__ . '/../generate.log';

const OPENAPI_GENERATOR = "node_modules/.bin/openapi-generator-cli";

// The attributes in this file are merged with any corresponding attributes in the models
const SCHEMA_ADDITIONS_FILE = MODEL_MODIFICATIONS_DIR . '/additions.json';
// The attributes in this file replace any corresponding attributes in the models
const SCHEMA_REPLACEMENTS_FILE = MODEL_MODIFICATIONS_DIR . '/replacements.json';
// The attributes in this file are removed from the models
const SCHEMA_DELETIONS_FILE = MODEL_MODIFICATIONS_DIR . '/deletions.json';

const ACCESS_TOKEN_HEADER = 'WM_SEC.ACCESS_TOKEN';
const AUTH_SIG_HEADER = 'WM_SEC.AUTH_SIGNATURE';
const BASIC_SCHEME_HEADER = 'Authorization';
const CHANNEL_TYPE_HEADER = 'WM_CONSUMER.CHANNEL.TYPE';
const CONSUMER_ID_HEADER = 'WM_CONSUMER.ID';
const PARTNER_HEADER = 'WM_PARTNER.ID';
