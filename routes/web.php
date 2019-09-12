<?php

/*
|--------------------------------------------------------------------------
| 项目接口
|--------------------------------------------------------------------------
| restful 接口设计,示例:
|
| 方法  	        路径                 动作         路由名称
| GET 	        /article 	        index 	    article.index
| GET 	        /article/create 	create 	    article.create
| POST 	        /article 	        store 	    article.store
| GET 	        /article/{id} 	    show 	    article.show
| GET 	        /article/{id}/edit 	edit 	    article.edit
| PUT/PATCH     /article/{id} 	    update 	    article.update
| DELETE 	    /article/{id} 	    destroy 	article.destroy
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/user', 'UserController@createUser');

    $router->get('/sms', 'SmsController@index');
});
