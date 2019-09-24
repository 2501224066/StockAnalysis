<?php

namespace App\Http\Repositories;

use App\Models\Agent;
use Exception;
use Illuminate\Support\Facades\Hash;

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

    // 创建代理
    public function create($phone, $password, $weixin, $weixin_qr)
    {
        $d = $this->agent->create([
            'phone' => $phone,
            'weixin' => $weixin,
            'weixin_qr' => $weixin_qr,
            'password' => Hash::make($password),
            'invite_code' => randStr(30, true),
        ]);
        if (!$d) {
            throw new Exception("保存失败");
        }
    }
}
