<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session("admin_user")) { //没有登录缓存，退回到登录页
            return redirect()->route("login.index")->with('msg','请登录');
        }
        return $next($request); //已有登录缓存，自动跳转

    }
}
