<?php

namespace App\Http\Repositories;

use App\Models\UserSharesTop;

class UserSharesTopRepository
{
    protected $userSharesTop;

    public function __construct(UserSharesTop $userSharesTop)
    {
        $this->userSharesTop = $userSharesTop;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->userSharesTop->where($where)->first();
    }

    // 添加解锁记录
    public function addUnlockRecord($user_id, $shares_top_id)
    {
        $this->userSharesTop->updateOrCreate([
            'user_id' => $user_id,
            'shares_top_id' => $shares_top_id
        ],[]);
    }

    // 用户解锁记录
    public function unlockRecord($user_id)
    {
        return $this->userSharesTop->where('user_id', $user_id)->get();
    }
}
