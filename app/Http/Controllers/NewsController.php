<?php

namespace App\Http\Controllers;

use App\Http\Services\NewsService;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    // 获取新闻
    public function index()
    {
        $news_list = $this->newsService->getNews();
        return $this->success(['news_list' => $news_list]);
    }
}
