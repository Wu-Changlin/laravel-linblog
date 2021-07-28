<?php

namespace App\Models;

class AuthRule extends Base
{
   // protected $primaryKey = 'rule_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id
//
//
//    /**权限登录
//     * @param $data 权限登录数据
//     * @return int 0:用户不存在，0:用户密码错误，2：登录成功
//     */
//    public static function adminLogin ($data) {
//        if(empty($data)){ //如果$data为空直接返回
//            return 0;
//        }
//
//        $rule_users = self::where('email',$data['email'])->first(); //根据用户输入邮箱查询数据库权限信息
//        if(!$rule_users){
//            return 0;
//        }else{
//
//            if(!Hash::check($data['password'],$rule_users->password)){ //用户输入密码对比数据库权限密码  $data['password']：字符串 ，$rule_users->password：数据库Hash密码字符串 60
//                return 1;
//            }
//        }
//        //写入session
//        $rule_session['admin_id']=$rule_users->admin_id;
//        $rule_session['email']=$rule_users->email;
//        $rule_session['name']=$rule_users->name;
//        $rule_session['last_login_ip']=request()->ip();
//        session(['admin_user'=>$rule_session]);
//        //更新权限登录次数+1
//        $rule_users->login_number +=1;
//        $rule_users->last_login_ip=request()->ip();
//        $rule_users->last_login_time=date('Y-m-d H:i:s', time());
//        $rule_users->save();
//        //本次登录信息写入log
//        self::addAadminLog(6,4,$rule_users->login_number,date('Y-m-d H:i:s', time()));
//        //登录成功状态
//        return 2;
//    }
//
//
//    /**
//     * 新增权限
//     * @param $data 新增权限数据
//     * @return int 0：$data为空，1：权限邮箱已存在，2：成功新增分类
//     */
//    public static function addAdmin ($data) {
//        if(empty($data)){ //如果$data为空直接返回
//            return 0;
//        }
//        $rule_count = self::where('email',$data['email'])->count(); //根据用户输入邮箱查询数据库权限邮箱信息
//        if($rule_count){//如果有数据说明邮箱已注册
//            return 1;
//        }
//        $data['password']=Hash::make($data['password']); //对字符串密码hash加密
//        $res=self::create($data);//使用create方法新增权限
//        //本次新增权限信息写入log
//        self::addAadminLog(6,2,$res->admin_id,$res->created_at);
//        return 2;
//    }
//
//    /**
//     * 修改权限信息
//     * @param $data 权限新数据
//     * @return int  0：$data为空，1：无需修改，保留原样，2：成功修改分类，3：权限邮箱已存在
//     */
//    public static function updateAdmin ($data) {
//        if(empty($data)){ //如果$data为空直接返回
//            return 0;
//        }
//        $rule_user = self::find($data['admin_id'],["admin_id","name","email","password"]); //查询该权限信息
//        $rule_info=$rule_user->toArray(); //集合转数组
//
//        //判断字段是否需要修改
//        $edit_info = array_diff_assoc($data,$rule_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
//        if (!$edit_info) {//空数组说明没有修改字段值，返回1
//            return 1;
//        }
//        if(!empty($edit_info['email'])){//如果有新邮箱
//            $rule_count = self::where('email',$data['email'])->count(); //根据用户输入邮箱查询数据库权限邮箱信息
//            if($rule_count){//如果有数据说明邮箱已注册
//                return 3;
//            }
//        }
//
//
//        if(!empty($edit_info['password'])){//如果有新密码
//            if (Hash::check($data['password'],$rule_info['password'])){
//                array_pull($edit_info, 'password');
//                array_pull($data, 'password');
//            }else{
//                $edit_info['password']=Hash::make($data['password']); //对字符串密码hash加密
//            }
//        }
//        //如果没有值，说明保留
//        if(count($edit_info)<1){
//            return 1;
//        }
//        self::where('admin_id',$data['admin_id'])->update($edit_info);
//        self::addAadminLog(6,3,$data['admin_id'],date('Y-m-d H:i:s', time()));
//        //如果当前登录权限修改本权限的基本信息则更新session
//        $rule_user=session('admin_user');
//        if(intval($data['admin_id']) === intval($rule_user['admin_id'])){
//            if(isset($edit_info['password'])){
//               return 4;
//            }
//            $rule_new_info = self::find($data['admin_id'],['admin_id',"name","email"]); //根据用户输入邮箱查询数据库用户信息
//            //重新写入session
//            $rule_session['admin_id']=$rule_new_info->admin_id;
//            $rule_session['email']=$rule_new_info->email;
//            $rule_session['name']=$rule_new_info->name;
//            $rule_session['last_login_ip']=request()->ip();
//            session(['admin_user'=>$rule_session]);
//        }
//        return 2;
//    }
//
//
//    /**
//     * 删除权限
//     * @param $rule_id 权限id
//     * @return int 0：$rule_id为空，1：已删除权限，2：成功删除
//     * @throws \Exception
//     */
//    public static function deleteRule ($rule_id) {
//        if(empty($rule_id)){
//            return 0;
//        }
//        //查询数据库中是否存在该权限  0：没有  1：存在
//        $rule_count = self::where('admin_id','=',$rule_id)->count();
//        if(!$rule_count){ //不存在说明已删除
//            return 1;
//        }
//        self::where('admin_id','=',$rule_id)->delete();//执行删除权限
//        //本次删除权限信息写入log
//        self::addAadminLog(6,1,$rule_id,date('Y-m-d H:i:s', time()));
//        return 2;
//    }

    
}
