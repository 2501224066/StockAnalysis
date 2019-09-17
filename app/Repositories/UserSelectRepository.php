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
}
