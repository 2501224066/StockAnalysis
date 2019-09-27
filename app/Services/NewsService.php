<?php

namespace App\Http\Services;

use App\Http\Repositories\NewsRepository;

class NewsService
{

    protected $newsRepository;

    public function __construct(
        NewsRepository $newsRepository
    ) {
        $this->newsRepository = $newsRepository;
    }

    // 获取新闻
    public function getNews()
    {
        return $this->newsRepository->getNews();
    }
}
