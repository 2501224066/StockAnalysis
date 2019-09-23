<?php

namespace App\Http\Repositories;

use App\Models\Agent;

class AgentRepository
{

    protected $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->agent->where($where)->first();
    }

    // 所有代理
    public function allAgent()
    {
        return $this->agent->where('agent_id', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->paginate();
    }
}
