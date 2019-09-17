<?php

namespace App\Http\Repositories;

use App\Models\Agent;

class AgentRepository{

    protected $agent;
 
    public function __construct(Agent $agent){
        $this->agent = $agent;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->agent->where($where)->first();
    }
}  