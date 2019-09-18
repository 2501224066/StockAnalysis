<?php

namespace App\Http\Controllers;

use App\Http\Services\UserSelectService;
use Illuminate\Http\Request;

class UserSelectController extends Controller
{

    protected $userSelectService;

    public function __construct(
        UserSelectService $userSelectService
    ) {
        $this->userSelectService = $userSelectService;
    }

    // 用户查询记录
    public function index(Request $request)
    {
        $this->verify($request, [
            'phone' => ['required', 'numeric', 'exists:sa_user,phone']
        ]);

        $user_select_record = $this->userSelectService->userSelectRecord($request);
        return $this->success(['user_select_record' => $user_select_record]);
    }
}
