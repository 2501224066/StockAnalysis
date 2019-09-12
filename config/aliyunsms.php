<?php


return [
    'access_key'        => env('ALIYUN_SMS_AK'), // accessKey
    'access_secret'     => env('ALIYUN_SMS_AS'), // accessSecret
    'sign_name'         => env('ALIYUN_SMS_SIGN_NAME'), // 签名
    'verify_code_template' => env('ALIYUN_SMS_VERIFY_CODE_TEMPLATE') // 验证码模板名称
];
