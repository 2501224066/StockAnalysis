<?php

namespace App\Http\Repositories;

use App\Models\UserLevel;

class UserLevelRepository
{
    protected $userLevel;

    public function __construct(UserLevel $userLevel)
    {
        $this->userLevel = $userLevel;
    }

    // 所有等级
    public function all()
    {
        return $this->userLevel->orderBy('trigger_condition', 'ASC')->get();
    }

    // 获取用户当前等级
    public function getLevel($selected_num)
    {
        return $this->userLevel->where('trigger_condition', '<=', $selected_num)
            ->orderBy('trigger_condition', 'DESC')
            ->first();
    }
}
