<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;
use Mockery\Exception;

class Controller extends BaseController
{

    /**
     * 正确返回
     * @param mixed $parm
     * @param int $code
     */
    public function success($parm = [], $code = 200)
    {
        $message = "success";
        $data    = [];

        is_string($parm) ? $message = $parm : $data = $parm;

        return response()->json([
            'code' => $code,
            'msg'  => $message,
            'data' => $data
        ]);
    }

    /**
     * 数据验证错误改写
     * @param Request $request
     * @param array $rule
     */
    public function verify(Request $request, $rule = [])
    {
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
    }
}
