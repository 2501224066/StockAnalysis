<?php

namespace App\Http\Services;

use App\Http\Repositories\AgentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\CardRepository;
use Exception;

class AgentService
{

    protected $agentRepository;
    protected $userRepository;
    protected $cardRepository;

    public function __construct(
        AgentRepository $agentRepository,
        UserRepository $userRepository,
        CardRepository $cardRepository
    ) {
        $this->agentRepository = $agentRepository;
        $this->userRepository = $userRepository;
        $this->cardRepository = $cardRepository;
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
        $belongAgent = $this->userRepository->belongAgent($request->agent->agent_id);

        foreach($belongAgent as &$v){
            $user_info = $this->userRepository->first(['phone'=>$v->phone]);
            // 添加使用卡获得总次数
            $v->use_card_get_select_num = $this->cardRepository->useCardGetSelectNum($user_info->user_id);
            // 添加邀请人数
            $v->invite_user_num = $this->userRepository->invite_user_num($user_info->user_id);
        }

        return $belongAgent;
    }

    // 所有代理
    public function allAgent()
    {
        $all_agent = $this->agentRepository->allAgent();
        foreach($all_agent as &$agent){
            $agent->has_user_count = $this->userRepository->belongAgentCount($agent->agent_id);
        }

        return $all_agent;
    }

    // 创建代理
    public function create(Request $request)
    {
        $this->agentRepository->create($request->phone, $request->password, $request->weixin, $request->weixin_qr);
    }
}
