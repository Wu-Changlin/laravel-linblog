<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;

class Admin extends Base
{
    protected $primaryKey = 'admin_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id



    /**管理员登录
     * @param $data 管理员登录信息
     * @return int 0:用户不存在，0:用户密码错误，2：登录成功
     */
    public static function adminLogin ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $admin_users = self::where('email',$data['email'])->first(); //根据用户输入邮箱查询数据库用户信息
        if(!$admin_users){
            return 0;
        }else{
            if(!Hash::check($data['password'],$admin_users->password)){ //用户输入密码对比数据库用户密码  $data['password']：字符串 ，$admin_users->password：数据库Hash密码字符串 60
                return 1;
            }
        }
        //本次登录信息写入log
        $admin_log['last_login_ip']=request()->ip();    //管理员IP
        $admin_log['admin_id']=$admin_users->admin_id;  //管理员id
        $admin_log['exec_object']=6;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=4;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$admin_users->admin_id;        //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        //写入session
        $admin_session['admin_id']=$admin_users->admin_id;
        $admin_session['email']=$admin_users->email;
        $admin_session['last_login_ip']=request()->ip();
        session(['admin_user'=>$admin_session]);
        //更新管理员登录次数+1
        $admin_users->login_number +=1;
        $admin_users->save();
        //登录成功状态
        return 2;
    }

    /**
     * 新增管理员
     * @param $data array 新增管理员信息
     */
    public static function addAdmin ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $admin_count = self::where('email',$data['email'])->count(); //根据用户输入邮箱查询数据库用户信息
        if($admin_count){//如果有数据说明邮箱已注册
            return 1;
        }
        $data['password']=Hash::make($data['password']); //对字符串密码hash加密
        $res=self::create($data);//使用create方法新增管理员
        //本次新增管理员信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=6;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=2;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$res->admin_id;        //执行操作对象id
        $admin_log['created_at']=$res->created_at;;//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

    /**
     *更改管理员
     * @param $data array 更改管理员信息
     */
    public static function updateAdmin ($data) {

    }

    /**
     *删除管理员
     * @param $admin_id 删除管理员id
     */
    public static function deleteAdmin ($admin_id) {
        if(empty($admin_id)){
            return 0;
        }
        //查询数据库中是否存在该管理员  0：没有  1：存在
        $admin_count = self::where('admin_id','=',$admin_id)->count();
        if(!$admin_count){ //不存在说明已删除
            return 1;
        }
        self::where('admin_id','=',$admin_id)->delete();
        //本次删除管理员信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=6;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=1;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$admin_id;        //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

}
