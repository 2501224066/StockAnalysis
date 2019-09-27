<?php


namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

// 爬取新闻
class GetNews extends Command
{
    protected $signature = 'news:get';

    protected $description = 'get news other website';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 目标地址  时间减少10秒，获取10秒区间内容
        $url = "https://news.10jqka.com.cn/tapp/news/push/stock/?page=1&tag=&track=website&ctime=". (time()-10);
        //伪造浏览器UA
        $headers = [
            'user-agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36',
        ];
        $client = new Client([
            'timeout' => 20,
            'headers' => $headers
        ]);
        //发送请求获取页面内容
        $response = $client->request('GET', $url)->getBody()->getContents();
        $response = json_decode($response);
        $list = $response->data->list;
    
        foreach($list as $v) {
            News::updateOrCreate([
                'seq' => $v->seq
            ],[
                'title' => $v->title,
                'content' => $v->digest
            ]);
        }
    }
}
