<?php

namespace App\Http\Repositories;

use App\Models\UserSelect;

class UserSelectRepository
{
    protected $userSelect;

    public function __construct(UserSelect $userSelect)
    {
        $this->userSelect = $userSelect;
    }

    // 添加记录
    public function recordSelect($user_id, $shares_name, $shares_code)
    {
        $this->userSelect->create([
            'user_id' => $user_id,
            'shares_name' => $shares_name,
            'shares_code' => $shares_code
        ]);
    }

    // 用户已查询次数
    public function selectedCount($user_id)
    {
        return $this->userSelect->where('user_id', $user_id)->count();
    }

    // 用户查询记录
    public function userSelectRecord($user_id, $len)
    {
        $query = $this->userSelect->where('user_id', $user_id)
        ->orderBy('created_at', 'DESC')
        ->select('shares_name', 'shares_code', 'created_at');
        
        if($len){
            return $query->paginate();
        }else{
            return $query->limit($len)->get();
        }
    }
}
