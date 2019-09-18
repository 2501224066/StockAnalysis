<?php

namespace App\Http\Services;

use App\Http\Repositories\AgentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentService
{

    protected $agentRepository;
    protected $hash;

    public function __construct(
        AgentRepository $agentRepository
    ){
        $this->agentRepository = $agentRepository;
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
}
