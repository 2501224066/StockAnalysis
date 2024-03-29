<?php

namespace App\Http\Repositories;

use App\Models\SharesTop;

class SharesTopRepository
{
    protected $shares_top;

    public function __construct(SharesTop $shares_top)
    {
        $this->shares_top = $shares_top;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->shares_top->where($where)->first();
    }

    // 创建优质股票数据
    public function createSharesTop($date_grade, $top_content, $industry_count)
    {
        $d = $this->shares_top->create([
            'date_grade' => $date_grade,
            'top_content' => $top_content,
            'industry_count' => $industry_count
        ]);
        if (!$d) {
            throw new Exception('创建失败');
        }
    }

    // 优质股票当前时间档次
    public function nowDateGrade()
    {
        return $this->shares_top->limit(5)->orderBy('date_grade', 'DESC')->get(['shares_top_id', 'date_grade', 'industry_count']);
    }
}
