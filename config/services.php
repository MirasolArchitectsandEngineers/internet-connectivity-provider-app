<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'router_configs' => [
        'data_limit' => [
            [
                'value',
                'unit',
                'options',
                'from',
                'to',
            ],
        ],
        'download_speed_limit' => [
            [
                'value',
                'unit',
                'options',
                'from',
                'to',
            ],
        ],
        'upload_speed_limit' => [
            [
                'value',
                'unit',
                'options',
                'from',
                'to',
            ],
        ],
        'disable_access' => [
            [
                'unit',
                'options',
                'from',
                'to',
            ],
        ],
        'sites_allowed',
        'sites_denied',
    ],

    'duration_units' => [
        'n/a' => 'N/A',
        'day' => 'Daily',
        'week' => 'Weekly',
        'month' => 'Monthly',
    ],
];
