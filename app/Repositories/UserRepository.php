<?php

namespace App\Http\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->user->where($where)->first();
    }

    // 创建用户
    public function create($phone, $password)
    {
        $user_id = $this->user->insertGetId([
            'phone' => $phone,
            'password' => Hash::make($password),
            'invite_code' => randStr(30, true),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if (!$user_id) {
            throw new Exception('注册失败');
        }

        return $user_id;
    }

    // 查询次数减少
    public function selectNumDown($user_id, $num = 1)
    {
        $user = $this->first(['user_id' => $user_id]);

        if ($user->select_num <= 0) {
            throw new Exception('查询次数不足');
        }

        $surplus_select_num = $user->select_num - $num;
        $user->select_num =  $surplus_select_num;
        $user->save();

        return $surplus_select_num;
    }

    // 查询次数增加
    public function selectNumUp($user_id, $num)
    {
        $user = $this->first(['user_id' => $user_id]);

        $surplus_select_num = $user->select_num + $num;
        $user->select_num =  $surplus_select_num;
        $user->save();
    }

    // 修改密码
    public function editPass($user_id, $password)
    {
        $d = $this->user->where('user_id', $user_id)->update(['password' => Hash::make($password)]);
        if (!$d) {
            throw new Exception('保存失败');
        }
    }

    // 绑定代理
    public function bindAgent($user_id, $agent_id)
    {
        $this->user->where('user_id', $user_id)->update(['agent_id' => $agent_id]);
    }

    // 属于代理用户统计
    public function belongAgentCount($agent_id)
    {
        return $this->user->where('agent_id', $agent_id)->count();
    }

    // 属于代理用户
    public function belongAgent($agent_id)
    {
        return $this->user->where('agent_id', $agent_id)
            ->select('phone', 'created_at')
            ->paginate();
    }

    // 所有用户
    public function allUser()
    {
        return $this->user->where('user_id', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->paginate();
    }
}
