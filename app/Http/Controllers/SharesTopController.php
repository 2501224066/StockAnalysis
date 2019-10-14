<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SharesTopService;

class SharesTopController extends Controller
{
    protected $sharesTopService;

    public function __construct(
        SharesTopService $sharesTopService
    ) {
        $this->sharesTopService = $sharesTopService;
    }

    // 优质股票信息
    public function index(Request $request)
    {
        $this->verify($request, [
            'date_grade' => ['required', 'exists:sa_shares_top,date_grade'],
        ]);

        $shares_top_list = $this->sharesTopService->getSharesTop($request);
        return $this->success(['shares_top_list' => $shares_top_list]);
    }

    // 解锁优质股票
    public function unlock(Request $request)
    {
        $this->verify($request, [
            'date_grade' => ['required', 'exists:sa_shares_top,date_grade'],
        ]);

        $this->sharesTopService->unlockSharesTop($request);
        return $this->success();
    }

    // 优质股票解锁记录
    public function unlockRecord(Request $request)
    {
        $unlockRecord = $this->sharesTopService->unlockRecord($request);
        return $this->success(['unlockRecord' => $unlockRecord]);
    }
}
