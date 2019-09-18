<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Http\Repositories\AgentRepository;

class CheckUserLoginToken
{

    protected $agentRepository;

    public function __construct(AgentRepository $agentRepository)
    {
        $this->agentRepository = $agentRepository;
    }


    // 验证代理登录token
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            throw new Exception('鉴权失败，请重新登录');
        }

        $agent_id = decrypt($token);
        if (!$agent_id) {
            throw new Exception('鉴权失败，请重新登录');
        }

        $agent_info = $this->agentRepository->first(['agent_id' => $agent_id]);
        if (!$agent_info) {
            throw new Exception('信息未找到，请重新登录');
        }

        $request->merge(['agent' => $agent_info]);

        return $next($request);
    }
}
