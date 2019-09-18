<?php

namespace App\Http\Services;

use App\Http\Repositories\AgentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;

class AgentService
{

    protected $agentRepository;
    protected $userRepository;

    public function __construct(
        AgentRepository $agentRepository,
        UserRepository $userRepository
    ) {
        $this->agentRepository = $agentRepository;
        $this->userRepository = $userRepository;
    }

    // 登录
    public function login(Request $request)
    {
        $agent_info = $this->agentRepository->first(['phone' => $request->phone]);
        if (!$agent_info) {
            throw new Exception('账号密码错误');
        }

        if (!Hash::check($request->password, $agent_info->password)) {
            throw new Exception('账号密码错误');
        }

        // 登录token
        $login_token = encrypt($agent_info->agent_id);
        return $login_token;
    }

    // 代理信息
    public function getAgentInfo(Request $request)
    {
        $agent_info = $request->agent;
        $agent_info->has_user_count = $this->userRepository->belongAgentCount($request->agent->agent_id);
        return $agent_info;
    }

    // 拥有用户
    public function hasUser(Request $request)
    {
        return $this->userRepository->belongAgent($request->agent->agent_id);
    }
}
