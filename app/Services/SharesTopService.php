<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repositories\SharesTopRepository;
use App\Http\Repositories\UserSharesTopRepository;
use App\Http\Repositories\SystemSettingRepository;
use App\Http\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SharesTopService
{

    protected $sharesTopRepository;
    protected $userSharesTopRepository;
    protected $systemSettingRepository;
    protected $userRepository;

    public function __construct(
        SharesTopRepository $sharesTopRepository,
        UserSharesTopRepository $userSharesTopRepository,
        SystemSettingRepository $systemSettingRepository,
        UserRepository $userRepository
    ) {
        $this->sharesTopRepository = $sharesTopRepository;
        $this->userSharesTopRepository = $userSharesTopRepository;
        $this->systemSettingRepository = $systemSettingRepository;
        $this->userRepository = $userRepository;
    }

    // 获取优质股票
    public function getSharesTop(Request $request)
    {
        $shares_top = $this->sharesTopRepository->first(['date_grade' => $request->date_grade]);

        // 查询是否已解锁
        $d = $this->userSharesTopRepository->first(['user_id' => $request->user->user_id, 'shares_top_id' => $shares_top->shares_top_id]);
        if (!$d) {
            throw new Exception("未解锁此项数据");
        }

        // json 转数组
        return json_decode($shares_top->top_content, true);
    }

    //解锁优质股票
    public function unlockSharesTop(Request $request)
    {
        $shares_top = $this->sharesTopRepository->first(['date_grade' => $request->date_grade]);

        // 查询是否已解锁
        $d = $this->userSharesTopRepository->first(['user_id' => $request->user->user_id, 'shares_top_id' => $shares_top->shares_top_id]);
        if ($d) {
            throw new Exception("已解锁此项数据");
        }

        // 档次
        $grade = substr($request->date_grade, 9);
        // 解锁该档次数据所需查询次数
        $depele_select_num = $this->systemSettingRepository->val('shares_top_grade_' . $grade . '_depele_select_num');
        // 判断查询次数是否足够
        if ($request->user->select_num < $depele_select_num) {
            throw new Exception("解锁此项数据所需查询次数不足");
        }

        DB::transaction(function () use ($request, $depele_select_num, $shares_top) {
            try {
                // 扣除查询次数
                $this->userRepository->selectNumDown($request->user->user_id, $depele_select_num);
                // 添加解锁记录
                $this->userSharesTopRepository->addUnlockRecord($request->user->user_id, $shares_top->shares_top_id);
            } catch (Exception $e) {
                Log::info('用户解锁优质股票失败：' . $e->getMessage());
                throw new Exception('操作失败');
            }
        });
    }

    // 全部解锁优质股票
    public function unlockAllSharesTop(Request $request)
    {
        // 全部解锁所需查询次数
        $depele_select_num = $this->systemSettingRepository->val('all_shares_top_depele_select_num');
        // 判断查询次数是否足够
        if ($request->user->select_num < $depele_select_num) {
            throw new Exception("解锁此项数据所需查询次数不足");
        }

        // 当前所有时间档次 id
        $nowDateGrade = $this->sharesTopRepository->nowDateGrade('shares_top_id');

        // 查询是否已解锁
        foreach ($nowDateGrade as $shares_top_id) {
            $d = $this->userSharesTopRepository->first(['user_id' => $request->user->user_id, 'shares_top_id' => $shares_top_id]);
            if ($d) {
                throw new Exception("已有数据解锁过，不可使用此操作");
            }
        }

        DB::transaction(function () use ($request, $depele_select_num, $nowDateGrade) {
            try {
                // 扣除查询次数
                $this->userRepository->selectNumDown($request->user->user_id, $depele_select_num);
                // 添加解锁记录
                foreach ($nowDateGrade as $shares_top_id) {
                    $this->userSharesTopRepository->addUnlockRecord($request->user->user_id, $shares_top_id);
                }
            } catch (Exception $e) {
                Log::info('用户解锁全部优质股票失败：' . $e->getMessage());
                throw new Exception('操作失败');
            }
        });
    }

    // 优质股票解锁记录
    public function unlockRecord(Request $request)
    {
        $user_shares_top = $this->userSharesTopRepository->unlockRecord($request->user->user_id);
        $record = [];
        foreach ($user_shares_top as $v) {
            $record[] = $this->sharesTopRepository->first(['shares_top_id' => $v->shares_top_id])->date_grade;
        }
        return $record;
    }

    // 优质股票当前时间档次
    public function nowDateGrade()
    {
        return array_reverse($this->sharesTopRepository->nowDateGrade('shares_top')->toArray());
    }
}
