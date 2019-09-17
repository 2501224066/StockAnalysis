<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserSelectRepository;
use App\Http\Services\UserService;
use App\Http\Services\UserLevelService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;
    protected $userLevelService;
    protected $userSelectRepository;

    public function __construct(
        UserService $userService,
        UserLevelService $userLevelService,
        UserSelectRepository $userSelectRepository
    ){
        $this->userService = $userService;
        $this->userLevelService = $userLevelService;
        $this->userSelectRepository = $userSelectRepository;
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

        $user_id = $this->userService->register($request);
        $this->userLevelService->setLevel($user_id);
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

    // 重置密码
    public function resetPass(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/', 'exists:sa_user,phone'],  
            'password' => ['required', 'between:6,16', 'alpha_num', 'confirmed'],
            'password_confirmation' => ['required'],
            'sms_code' => ['required', 'numeric']
        ]);

        $this->userService->resetPass($request);
        return $this->success();
    }
    
    // 用户信息
    public function userInfo(Request $request)
    {
        $request->user->selected_num = $this->userSelectRepository->selectCount($request->user->user_id);
        return $this->success($request->user);
    }
}
