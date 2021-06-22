<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ResourceStock extends Base
{
    //
    protected $primaryKey='resource_stock_id';

    public static function addResource($data){
        if(empty($data)){//如果$data为空
            return 0;
        }
        $resource_count = self::where('name',$data['name'])->count(); //根据用户输入资源名称查询数据库资源库表资源名称字段
        if($resource_count){//如果有数据说明资源分类已存在
            return 1;
        }
        $res=self::create($data);//使用create新增资源分类
        //本次新增标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=7;                    //执行操作对象  0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员， 7：资源库，8：友链
        $admin_log['exec_type']=2;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出，6：前台添加
        $admin_log['exec_object_id']=$res->resource_stock_id;        //执行操作对象id
        $admin_log['created_at']=$res->created_at;;//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

    /**
     * 获取顶级资源 用于新增资源分类选择
     * @return \Illuminate\Support\Collection 所有顶级资源
     */
    public  static  function  pid_resources(){
        $resources =DB::table('resource_stocks')
            ->select('name','resource_stock_id','is_pull')
            ->where('pid','=','0')
            ->get();

        foreach ($resources as $k){
            if($k->is_pull==1){
                $k->name= $k->name.'(已下架)';
            }
        }
        return  $resources;
    }
}
