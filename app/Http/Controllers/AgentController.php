<?php

namespace App\Http\Controllers;

use App\Http\Services\AgentService;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    protected $agentService;

    public function __construct(
        AgentService $agentService
    ) {
        $this->agentService = $agentService;
    }

    // 登录
    public function login(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/', 'exists:sa_agent,phone'],
            'password' => ['required', 'between:6,16', 'alpha_num'],
        ]);

        $login_token = $this->agentService->login($request);
        return $this->success(['login_token' => $login_token]);
    }

    // 用户信息
    public function agentInfo(Request $request)
    {
        $agent_info = $this->agentService->getAgentInfo($request);
        return $this->success($agent_info);
    }

    // 拥有用户
    public function hasUser(Request $request)
    {
        $has_user = $this->agentService->hasUser($request);
        return $this->success(['has_user' => $has_user]);
    }

    // 创建代理
    public function create(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'regex:/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/', 'unique:sa_agent,phone'],
            'password' => ['required', 'between:6,16', 'alpha_num', 'confirmed'],
            'password_confirmation' => ['required'],
            'weixin' => ['required'],
            'weixin_qr' => ['required']
        ]);

        $this->agentService->create($request);
        return $this->success();
    }
}
