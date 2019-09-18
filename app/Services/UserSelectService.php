<?php

namespace App\Http\Services;

use App\Http\Repositories\UserSelectRepository;
use App\Http\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;

class UserSelectService
{

    protected $userSelectRepository;
    protected $userRepository;

    public function __construct(
        UserSelectRepository $userSelectRepository,
        UserRepository $userRepository
    ) {
        $this->userSelectRepository = $userSelectRepository;
        $this->userRepository = $userRepository;
    }

    // 用户查询记录
    public function userSelectRecord(Request $request)
    {
        $user_info = $this->userRepository->first(['phone' => $request->phone]);

        // 判断此用户是否属于该代理
        if($user_info->agent_id != $request->agent->agent_id){
            throw new Exception('用户不存在');
        }

        return $this->userSelectRepository->userSelectRecord($user_info->user_id, config('services.agent.get_user_select_record_num'));
    }
}
