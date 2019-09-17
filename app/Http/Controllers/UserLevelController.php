<?php

namespace App\Http\Controllers;

use App\Http\Services\UserLevelService;

class UserLevelController extends Controller
{

    protected $userLevelService;

    public function __construct(
        UserLevelService $userLevelService
    ){
        $this->userLevelService = $userLevelService;
    }

    // 等级权益
    public function index()
    {
        $level = $this->userLevelService->getLevel();
        return $this->success($level);
    }
}