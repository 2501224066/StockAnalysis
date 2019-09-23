<?php

namespace App\Http\Services;


use Illuminate\Http\Request;
use Exception;

class AdminService
{
    // 登录
    public function login(Request $request)
    {
       
        if ( ($request->username != config('services.admin.username')) 
        || ($request->password != config('services.admin.password'))) {
            throw new Exception('账号密码错误');
        }

        // 登录token
        $login_token = encrypt('ADMIN');
        return $login_token;
    }
}
