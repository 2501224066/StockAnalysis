<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminService;
use App\Http\Services\UserService;
use App\Http\Services\AgentService;
use App\Http\Services\CardService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;
    protected $userService;
    protected $agentService;
    protected $cardService;

    public function __construct(
        AdminService $adminService,
        UserService $userService,
        AgentService $agentService,
        CardService $cardService
    ) {
        $this->adminService = $adminService;
        $this->userService = $userService;
        $this->agentService = $agentService;
        $this->cardService = $cardService;
    }

    // 登录
    public function login(Request $request)
    {
        $this->verify($request, [
            'username' => ['required'],
            'password' => ['required', 'between:6,16', 'alpha_num'],
        ]);

        $login_token = $this->adminService->login($request);
        return $this->success(['login_token' => $login_token]);
    }

    // 所有用户
    public function allUser()
    {
        $all_user = $this->userService->allUser();
        return $this->success(['all_user' => $all_user]);
    }

    // 所有代理
    public function allAgent()
    {
        $all_agent = $this->agentService->allAgent();
        return $this->success(['all_agent' => $all_agent]);
    }

    // 所有卡片
    public function allCard()
    {
        $all_card = $this->cardService->allCard();
        return $this->success(['all_card' => $all_card]);
    }
}
