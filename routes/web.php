<?php

/*
|--------------------------------------------------------------------------
| 项目接口
|--------------------------------------------------------------------------
| restful 接口设计
*/

use Illuminate\Support\Facades\Artisan;

// 外部接口
$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/sms', 'SmsController@index'); // 发送手机验证码

    $router->get('/user/checkPhone', 'UserController@checkPhone'); // 检查手机号
    $router->post('/user', 'UserController@createUser'); // 注册
    $router->post('/user/login', 'UserController@login'); // 登录
    $router->post('/user/resetPass', 'UserController@resetPass'); // 重置密码

    $router->get('/shares/select', 'SharesController@select'); // 搜索股票

    $router->get('/user_level', 'UserLevelController@index'); // 等级权益

    $router->post('/agent/login', 'AgentController@login'); // 代理登录

    $router->group(['middleware' => 'checkUserLoginToken'], function () use ($router) {
        $router->get('/user', 'UserController@userInfo'); // 用户信息

        $router->get('/shares', 'SharesController@sharesInfo'); // 股票信息

        $router->get('/card', 'CardController@useCard'); // 用户使用卡
        $router->post('/card', 'CardController@createCard'); // 用户创建卡
        $router->get('/card/createCardRecord', 'CardController@createCardRecord'); // 用户创建卡记录
    });

    $router->group(['middleware' => 'checkAgentLoginToken'], function () use ($router) {
        $router->get('/agent', 'AgentController@agentInfo'); // 代理信息
        $router->get('/agent/hasUser', 'AgentController@hasUser'); // 代理拥有用户

        $router->get('/user_select', 'UserSelectController@index'); // 代理获取用户查询记录
    });
});



//内部接口
$router->group(['prefix' => 'system'], function () use ($router) {

    $router->post('/card/{grade}/{count}', function ($grade, $count) { // 系统创建卡
        Artisan::call('card:create', ['grade' => $grade, 'count' => $count]);
    });
});
