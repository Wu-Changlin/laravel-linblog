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
        //dd('RBAC鉴权');
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
            //dd($action_id);
            if($action_id->count()>0){
                //select * from linblog_auth_groups where  $admin_group_id[0]->group_id and  rules in (1);
                $group_rule=DB::table('auth_groups')->where('group_id','=',$admin_group_id[0]->group_id)->get(['rules']);
                $group_rule_string=$group_rule[0]->rules;
                //当前访问的路由权限比对角色权限
                $action_id_string=strval($action_id[0]->rule_id);//数字转字符串
                $is_action_in_rule=strpos($group_rule_string,$action_id_string);//查找当前访问的路由权限在角色权限字符串中第一次出现的位置;
                if($is_action_in_rule===false){
                    return redirect()->back()->with('err', '您没有权限执行此次操作');
                }
                //$data['rules']=implode(',',$data['rules']);
            }else{
                return redirect()->back()->with('err', '权限不存在');

            }
        }
        //后续
        return $next($request);
    }
}
