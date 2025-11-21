<?php

return [
    'consumer_key' => env('MPESA_CONSUMER_KEY'),
    'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
    'shortcode' => env('MPESA_SHORTCODE'),
    'lipa_na_mpesa_passkey' => env('MPESA_PASSKEY'),
    'environment' => env('MPESA_ENV', 'sandbox'), // sandbox or production
    'callback_url' => env('MPESA_CALLBACK_URL'),
];
