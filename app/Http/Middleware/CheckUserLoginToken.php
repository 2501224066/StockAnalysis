<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Http\Repositories\UserRepository;

class CheckUserLoginToken
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    // 验证用户登录token
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            throw new Exception('鉴权失败，请重新登录');
        }

        $user_id = decrypt($token);
        if (!$user_id) {
            throw new Exception('鉴权失败，请重新登录');
        }

        $user_info = $this->userRepository->first(['user_id' => $user_id]);
        if (!$user_info) {
            throw new Exception('信息未找到，请重新登录');
        }

        $request->merge(['user' => $user_info]);

        return $next($request);
    }
}
