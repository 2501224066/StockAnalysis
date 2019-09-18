<?php

/*
|--------------------------------------------------------------------------
| 项目接口
|--------------------------------------------------------------------------
| restful 接口设计
*/

use Illuminate\Support\Facades\Artisan;

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/sms', 'SmsController@index'); // 发送手机验证码

    $router->get('/user/checkPhone', 'UserController@checkPhone'); // 检查手机号
    $router->post('/user', 'UserController@createUser'); // 注册
    $router->post('/user/login', 'UserController@login'); // 登录
    $router->post('/user/resetPass', 'UserController@resetPass'); // 重置密码

    $router->get('/user_level', 'UserLevelController@index'); // 等级权益

    $router->post('/agent/login', 'AgentController@login'); // 代理登录

    $router->post('/card/{grade}/{count}', function ($grade, $count) {
        Artisan::call('card:create', ['grade' => $grade, 'count' => $count]);
    }); // 创建卡

    $router->group(['middleware' => 'checkLoginToken'], function () use ($router) {
        $router->get('/user', 'UserController@userInfo'); // 用户信息

        $router->get('/shares/select', 'SharesController@select'); // 搜索股票
        $router->get('/shares', 'SharesController@sharesInfo'); // 股票信息

        $router->get('/card', 'CardController@useCard'); // 使用卡
    });
});
