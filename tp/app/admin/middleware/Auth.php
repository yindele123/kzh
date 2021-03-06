<?php
/**
 * Created by PhpStorm.
 * User: kezihang
 * Date: 2020/2/13
 * Time: 14:04
 */
declare (strict_types = 1);
namespace app\admin\middleware;

class Auth
{
    public function handle($request, \Closure $next)
    {
        $adminSession=session(config('admin.admin_session'));
        if (!empty($adminSession) && preg_match('/login/i',$request->pathinfo())){
            return redirect((string) url('index/index'));
        }
        if (empty($adminSession) && !preg_match('/login/i',$request->pathinfo())){
            return redirect((string) url('login/index'));
        }
        return $next($request);
    }
}