<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserSelectRepository;
use App\Http\Repositories\UserLevelRepository;

class UserLevelService
{
    protected $userRepository;
    protected $userSelectRepository;
    protected $userLevelRepository;

    public function __construct(
        UserRepository $userRepository,
        UserSelectRepository $userSelectRepository,
        UserLevelRepository $userLevelRepository
    ){
        $this->userRepository = $userRepository;
        $this->userSelectRepository = $userSelectRepository;
        $this->userLevelRepository = $userLevelRepository;
    }

    // 设定等级
    public function setLevel($user_id)
    {
        $user_info = $this->userRepository->first(['user_id'=>$user_id]);
        $selected_num = $this->userSelectRepository->selectedCount($user_id);
        $level_info = $this->userLevelRepository->getLevel($selected_num);
        if( ($user_info->level==null) || ($level_info->level != $user_info->level) ){
            $user_info->level = $level_info->level;
            $user_info->select_num = $user_info->select_num + $level_info->reward_select_num;
            $user_info->save();
        }
    }

    // 所有等级
    public function getLevel()
    {
        return $this->userLevelRepository->all();
    }
}