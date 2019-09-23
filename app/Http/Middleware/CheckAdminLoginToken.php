<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

class CheckAdminLoginToken
{

    // 验证后台登录token
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            throw new Exception('鉴权失败，请重新登录');
        }

        $admin_tag = decrypt($token);
        if (!$admin_tag) {
            throw new Exception('鉴权失败，请重新登录');
        }

        if ($admin_tag != 'ADMIN') {
            throw new Exception('信息未找到，请重新登录');
        }

        return $next($request);
    }
}
