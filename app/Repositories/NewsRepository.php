<?php

namespace App\Http\Repositories;

use App\Models\News;

class NewsRepository
{

    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    // 获取新闻
    public function getNews()
    {
        return $this->news
            ->select('title', 'content', 'created_at')
            ->orderBy('created_at', 'DESC')
            ->paginate();
    }
}
