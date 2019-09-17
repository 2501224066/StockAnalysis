<?php

namespace App\Http\Controllers;

use App\Http\Services\SharesService;
use App\Http\Services\UserService;
use App\Http\Services\UserLevelService;
use Illuminate\Http\Request;

class SharesController extends Controller
{
    protected $sharesService;
    protected $userLevelService;

    public function __construct(
        SharesService $sharesService,
        UserService $userService,
        UserLevelService $userLevelService
    ){
        $this->sharesService = $sharesService;
        $this->userService = $userService;
        $this->userLevelService = $userLevelService;
    }

    // 搜索
    public function select(Request $request)
    {
        $this->verify($request, [
            'keyword' => ['required'],
        ]);

        $select_data = $this->sharesService->select($request);
        return $this->success(['select_data'=>$select_data]);
    }

    // 股票信息
    public function sharesInfo(Request $request)
    {
        $this->verify($request, [
            'shares_code' => ['required'],
        ]);

        $surplus_select_num = $this->userService->selectNumDown($request);
        $share_info = $this->sharesService->shareInfo($request);
        $this->userLevelService->setLevel($request->user->user_id);
        return $this->success([
            'surplus_select_num' => $surplus_select_num,
            'with_invite' => 'i='.$request->user->invite_code,
            'share_info' => $share_info
        ]);
    }
}