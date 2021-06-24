<?php

namespace App\Models;



class FriendshipLink extends Base
{
    //
    protected $primaryKey='link_id';

    public static function addFriend($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $friend_count = self::where('name',$data['name'])->count(); //根据用户输入友好博客名查询数据库友好博客表友好博客名
        if($friend_count){//如果有数据说明友好博客已存在
            return 1;
        }
        $res=self::create($data);//使用create方法新增友好博客
        //本次新增友好博客信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=8;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员， 7：资源库，8：友链'
        $admin_log['exec_type']=2;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$res->link_id;      //执行操作对象id
        $admin_log['created_at']=$res->created_at;      //执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }


    /**
     * @param $data
     * @return int   0:$data为空 ,1
     */
    public static function updateFriend($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $feiend_res = self::find($data['link_id'],["link_id","name","is_pull","is_verify"]); //查询该友好博客信息
        $friend_info=$feiend_res->toArray(); //集合转数组
        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$friend_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }
        //判断友好博客名是否修改
        if(!empty($edit_info['name'])){
            $friend_name_count = self::where('name',$data['name'])->count(); //根据用户输入友好博客名查询数据库友好博客表友好博客名
            if($friend_name_count){//如果有数据说明友好博客名已存在
                return 3;
            }
        }
        self::where('link_id',$data['link_id'])->update($edit_info);
        //本次修改友好博客信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=8;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员， 7：资源库，8：友链'
        $admin_log['exec_type']=3;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改，4：登录， 5：退出',
        $admin_log['exec_object_id']=$data['link_id'];    //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }





    /**
     *
     * @param $link_id 删除友链id
     */
    public static function deleteFriend ($link_id) {
        if(empty($link_id)){
            return 0;
        }
        //查询数据库中是否存在该友链  0：没有  1：存在
        $friend_count = self::where('link_id','=',$link_id)->count();
        if(!$friend_count){ //不存在说明已删除
            return 1;
        }
        self::where('link_id','=',$link_id)->delete();
        //本次删除标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=8;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员， 7：资源库，8：友链'
        $admin_log['exec_type']=1;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$link_id;       //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }
}
