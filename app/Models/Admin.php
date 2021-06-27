<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;

class Admin extends Base
{
    protected $primaryKey = 'admin_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id


    /**管理员登录
     * @param $data 管理员登录数据
     * @return int 0:用户不存在，0:用户密码错误，2：登录成功
     */
    public static function adminLogin ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }

        $admin_users = self::where('email',$data['email'])->first(); //根据用户输入邮箱查询数据库管理员信息
        if(!$admin_users){
            return 0;
        }else{

            if(!Hash::check($data['password'],$admin_users->password)){ //用户输入密码对比数据库管理员密码  $data['password']：字符串 ，$admin_users->password：数据库Hash密码字符串 60
                return 1;
            }
        }
        //写入session
        $admin_session['admin_id']=$admin_users->admin_id;
        $admin_session['email']=$admin_users->email;
        $admin_session['name']=$admin_users->name;
        $admin_session['last_login_ip']=request()->ip();
        session(['admin_user'=>$admin_session]);
        //更新管理员登录次数+1
        $admin_users->login_number +=1;
        $admin_users->save();
        //本次登录信息写入log
        self::addAadminLog(6,4,$admin_users->login_number,date('Y-m-d H:i:s', time()));
        //登录成功状态
        return 2;
    }


    /**
     * 新增管理员
     * @param $data 新增管理员数据
     * @return int 0：$data为空，1：管理员邮箱已存在，2：成功新增分类
     */
    public static function addAdmin ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $admin_count = self::where('email',$data['email'])->count(); //根据用户输入邮箱查询数据库管理员邮箱信息
        if($admin_count){//如果有数据说明邮箱已注册
            return 1;
        }
        $data['password']=Hash::make($data['password']); //对字符串密码hash加密
        $res=self::create($data);//使用create方法新增管理员
        //本次新增管理员信息写入log
        self::addAadminLog(6,2,$res->admin_id,$res->created_at);
        return 2;
    }

    /**
     * 修改管理员信息
     * @param $data 管理员新数据
     * @return int  0：$data为空，1：无需修改，保留原样，2：成功修改分类，3：管理员邮箱已存在
     */
    public static function updateAdmin ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $admin_user = self::find($data['admin_id'],["admin_id","name","email","password"]); //查询该管理员信息
        $admin_info=$admin_user->toArray(); //集合转数组
        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$admin_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }
        if(!empty($edit_info['email'])){//如果有新邮箱
            $admin_count = self::where('email',$data['email'])->count(); //根据用户输入邮箱查询数据库管理员邮箱信息
            if($admin_count){//如果有数据说明邮箱已注册
                return 3;
            }
        }
        if(!empty($edit_info['password'])){//如果有新密码
            if (Hash::check($data['password'],$admin_info['password']) ){
                array_pull($edit_info, 'password');
            }else{
                $edit_info['password']=Hash::make($data['password']); //对字符串密码hash加密
                }
        }
        self::where('admin_id',$data['admin_id'])->update($edit_info);

        //如果当前登录管理员修改本管理员的基本信息则更新session
        if(intval($data['admin_id']) === $admin_user['admin_id']){
            if(isset($data['password'])){
               return 4;
            }
            $admin_new_info = self::find($data['admin_id'],['admin_id',"name","email"]); //根据用户输入邮箱查询数据库用户信息
            //重新写入session
            $admin_session['admin_id']=$admin_new_info->admin_id;
            $admin_session['email']=$admin_new_info->email;
            $admin_session['name']=$admin_new_info->name;
            $admin_session['last_login_ip']=request()->ip();
            session(['admin_user'=>$admin_session]);
        }
        self::addAadminLog(6,3,$data['admin_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }


    /**
     * 删除管理员
     * @param $admin_id 管理员id
     * @return int 0：$admin_id为空，1：已删除管理员，2：成功删除
     * @throws \Exception
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
        self::addAadminLog(6,1,$admin_id,date('Y-m-d H:i:s', time()));
        return 2;
    }

    //退出后台管理并返回后台登录页，清除用户缓存
    public static function adminlogOut(){
        $admin_user=session('admin_user');
        $admin_user['admin_id'];  //管理员id
        $admin_user = self::find( $admin_user['admin_id'],["login_number"]);
        self::addAadminLog(6,5,$admin_user->login_number,date('Y-m-d H:i:s', time()));
        session()->flush(); // 清空session
    }
    
}
