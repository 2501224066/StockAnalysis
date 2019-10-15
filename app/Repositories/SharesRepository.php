<?php

namespace App\Http\Repositories;

use App\Models\Shares;

class SharesRepository
{
    protected $shares;

    public function __construct(Shares $shares)
    {
        $this->shares = $shares;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->shares->where($where)
            ->with(['profit' => function ($query) {
                $query->orderBy('time_node', 'DESC')->limit(12);
            }])
            ->with(['profitGrowthRate' => function ($query) {
                $query->orderBy('time_node', 'DESC')->limit(12);
            }])
            ->with(['revenue' => function ($query) {
                $query->orderBy('time_node', 'DESC')->limit(12);
            }])
            ->with(['revenueGrowthRate' => function ($query) {
                $query->orderBy('time_node', 'DESC')->limit(12);
            }])
            ->with(['salesGrossMargin' => function ($query) {
                $query->orderBy('time_node', 'DESC')->limit(12);
            }])
            ->first();
    }

    // 搜索股票
    public function selectShares($keyword)
    {
        return $this->shares
            ->whereRaw('(code like ? or simple_code like ? or name like ?)', ["%{$keyword}%", "%{$keyword}%", "%{$keyword}%"])
            ->limit(10)
            ->get(['name', 'code']);
    }

    // 优质股票内容
    public function topContent($offset, $limit)
    {
        $top =  $this->shares
            ->orderBy('score', 'DESC')
            ->offset($offset)
            ->limit($limit)
            ->get(['name', 'code', 'score']);
        return json_encode($top);
    }
}
