<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    
    'agent' => [
        'get_user_select_record_num' => env('AGENT_GET_USER_SELECT_RECORD_NUM')
    ],

    'user' => [
        'get_create_card_record_num' => env('USER_GET_CREATE_CARD_RECORD_NUM')
    ]
];
