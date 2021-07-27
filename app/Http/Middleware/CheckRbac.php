<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use DB;

class CheckRbac
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

        //RBAC鉴权
        //1.获取用户所属角色
        $admin_user=session('admin_user');

        $admin_group_id=DB::table('auth_group_access')->where('uid','=',$admin_user['admin_id'])->get(['group_id']);

        if(intval($admin_group_id[0]->group_id) !=1){
            //2.获取当前访问的路由   "App\Http\Controllers\Admin\AdminController@showAdminUser"
            $route_action = Route::currentRouteAction();
            //按反斜杠截取
            $actions=explode('\\',$route_action);
            //取截取结果最后的值
            $action=end($actions);
            $action_id=DB::table('auth_rules')->where('name','=',$action)->get(['rule_id']);

            if($action_id->count()>0){
                //select * from linblog_auth_groups where  $admin_group_id[0]->group_id and  rules in (1);
                $group_rule=DB::table('auth_groups')->where('group_id','=',$admin_group_id[0]->group_id)->get(['rules']);
                $group_rule=explode(',',$group_rule[0]->rules); //按，（逗号）切割字符串为数组
                //当前访问权限比对角色权限



                //return redirect()->back()->with('err', '您没有权限执行此次操作');

            }else{
                return redirect()->back()->with('err', '权限不存在');

            }

        }
        //后续
        return $next($request);
    }
}
