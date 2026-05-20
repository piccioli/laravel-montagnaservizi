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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'typeform' => [
        'form_id'  => env('TYPEFORM_FORM_ID', 'PLACEHOLDER'),
        'base_url' => env('TYPEFORM_BASE_URL', 'https://form.typeform.com/to'),
        'url'      => rtrim(env('TYPEFORM_BASE_URL', 'https://form.typeform.com/to'), '/') . '/' . env('TYPEFORM_FORM_ID', 'PLACEHOLDER'),
    ],

    'gtm' => [
        'container_id' => env('GTM_CONTAINER_ID'),
    ],

    'brevo' => [
        'embed_code' => env('BREVO_EMBED_CODE'),
        'api_key'    => env('BREVO_API_KEY'),
        'list_id'    => env('BREVO_LIST_ID'),
    ],

    'cookie_banner_enabled' => env('COOKIE_BANNER_ENABLED', true),

];
