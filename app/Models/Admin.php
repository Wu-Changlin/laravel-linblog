<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $primaryKey = 'admin_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id



    /**管理员登录
     * @param $data 管理员登录信息
     * @return int 0:用户不存在，0:用户密码错误，2：登录成功
     */
    public static function adminLogin ($data) {
        $admin_users = self::where('email',$data['email'])->first(); //根据用户输入邮箱查询数据库用户信息
        if(!$admin_users){
            return 0;
        }else{
            if(!Hash::check($data['password'],$admin_users->password)){ //用户输入密码对比数据库用户密码  $data['password']：字符串 ，$admin_users->password：数据库Hash密码字符串 60
                return 1;
            }
        }
        //本次登录信息写入log
        $admin_log['last_login_ip']=request()->ip();//管理员IP
        $admin_log['admin_id']=$admin_users->admin_id;//管理员id
        $admin_log['exec_object']=6;  //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：登录， 7：退出',
        $admin_log['exec_type']=4;   //执行操作 4：登录
        //写入session
        $admin_session['admin_id']=$admin_users->admin_id;
        $admin_session['email']=$admin_users->email;
        $admin_session['last_login_ip']=request()->ip();
        session(['admin_user'=>$admin_session]);
        //更新管理员登录次数
        return 2;
    }

    /**
     * 新增管理员
     * @param $data array 新增管理员信息
     */
    public static function addAdmin ($data) {

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

    }

}
