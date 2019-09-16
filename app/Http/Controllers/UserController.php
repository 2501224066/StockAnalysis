<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // 检查手机号
    public function checkPhone(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/'],
            'sms_code' => ['required', 'numeric', 'regex:/^[0-9]{6}/']
        ]);

        $register_token = $this->userService->checkPhone($request);
        return $this->success(['register_token' => $register_token]);
    }

    // 注册
    public function createUser(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/', 'unique:sa_user,phone'],
            'register_token' => ['required'],
            'password' => ['required', 'between:6,16', 'alpha_num', 'confirmed'],
            'password_confirmation' => ['required'],
            'invite_code' => ['nullable', 'present']
        ]);

        $this->userService->register($request);
        return $this->success();
    }

    // 登录
    public function login(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/', 'exists:sa_user,phone'],
            'password' => ['required', 'between:6,16', 'alpha_num'],           
        ]);

        $login_token = $this->userService->login($request);
        return $this->success(['login_token' => $login_token]);
    }
}
