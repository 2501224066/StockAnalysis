<?php

namespace App\Http\Controllers;

use App\Http\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SmsController extends Controller
{

    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function index(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/'],
        ]);

        $this->smsService->send($request);

        return $this->success();
    }
}
