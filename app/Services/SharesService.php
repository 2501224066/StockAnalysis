<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repositories\SharesRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserSelectRepository;

class SharesService
{

    protected $sharesRepository;
    protected $userRepository;
    protected $userSelectRepository;

    public function __construct(
        SharesRepository $sharesRepository,
        UserRepository $userRepository,
        UserSelectRepository $userSelectRepository
    ){
        $this->sharesRepository = $sharesRepository;
        $this->userRepository = $userRepository;
        $this->userSelectRepository = $userSelectRepository;
    }

    // 搜索
    public function select(Request $request)
    {
        $shares_arr = $this->sharesRepository->selectShares(htmlspecialchars($request->keyword));
        $shares_arr = $this->withRealtimeData($shares_arr);
        return $shares_arr;
    }

    // 股票信息
    public function shareInfo(Request $request)
    {
        $shares_info = $this->sharesRepository->first(['code' => $request->shares_code]);
        $this->userSelectRepository->recordSelect($request->user->user_id, $shares_info->name, $shares_info->code);
        return $shares_info;
    }

    // 添加实时数据
    public function withRealtimeData($shares_arr)
    {
        foreach ($shares_arr as &$shares) {
            $shares->today_start = '-';
            $shares->yesterday_end = '-';

            $code = $shares->code;
            $data = file_get_contents('http://hq.sinajs.cn/list=sh' . substr($code, 0, 6));
            if ($data) {
                $data_arr = explode(',', $data);
                $shares->today_start = $data_arr[1]; // 今开
                $shares->yesterday_end = $data_arr[2]; // 昨收
            }
        }
        return $shares_arr;
    }
}
