<?php

namespace App\Http\Services;

use App\Http\Repositories\CardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mrgoon\AliSms\AliSms;

class SmsService
{

    protected $sms;
    protected $cardRepository;

    public function __construct(
        AliSms $sms,
        CardRepository $cardRepository
    ){
        $this->sms = $sms;
        $this->cardRepository = $cardRepository;
    }

    // 发送短信
    public function send(Request $request)
    {
        $sms_code = randStr(6);
        Cache::put($request->phone . '_SMS_CODE', $sms_code, 300);

        $this->sms->sendSms($request->phone, config('aliyunsms.verify_code_template'), ['code' => $sms_code], [
            'access_key' => config('aliyunsms.access_key'),
            'access_secret' => config('aliyunsms.access_secret'),
            'sign_name' => config('aliyunsms.sign_name')
        ]);
    }
}
