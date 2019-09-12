<?php

namespace App\Http\Services;

use Mrgoon\AliSms\AliSms;

class SmsService
{

    private $sms;

    public function __construct()
    {
        $sms = new AliSms();
        $this->sms = $sms;
    }

    // 发送短信
    public function send($phone, $code)
    {
        $this->sms->sendSms($phone, config('aliyunsms.verify_code_template'), ['code' => $code], [
            'access_key' => config('aliyunsms.access_key'),
            'access_secret' => config('aliyunsms.access_secret'),
            'sign_name' => config('aliyunsms.sign_name')
        ]);
    }
}
