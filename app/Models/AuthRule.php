<?php

namespace App\Models;

class AuthRule extends Base
{
    protected $primaryKey = 'rule_id'; //创建的表字段中主键ID的名称不为id，则需要通过 $primaryKey 来指定一下设定主键id

    /**
     * 新增权限
     * @param $data 新增权限数据
     * @return int 0：$data为空，1：权限邮箱已存在，2：成功新增分类
     */
    public static function addRule ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $rule_count = self::where('name',$data['name'])->count(); //根据用户输入权限的控/方查询数据库权限的控/方信息
        if($rule_count){//如果有数据说明权限的控/方已存在
            return 1;
        }
        //如果非顶级权限，那么level=上级权限的level+1
        if($data['pid']!=0){
            $pid_level=self::find($data['pid'],['level']);
            $data['level']=$pid_level->level+1;
        }
        $res=self::create($data);//使用create方法新增权限
        //本次新增权限信息写入log 执行操作对象 9：权限  执行操作类型1：删除， 2：添加， 3：修改，
        self::addAadminLog(6,2,$res->rule_id,$res->created_at);
        return 2;
    }

    /**
     * 修改权限信息
     * @param $data 权限新数据
     * @return int  0：$data为空，1：无需修改，保留原样，2：成功修改分类，3：权限邮箱已存在
     */
    public static function updateRule ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $rule_user = self::find($data['rule_id'],["rule_id","name","email","password"]); //查询该权限信息
        $rule_info=$rule_user->toArray(); //集合转数组

        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$rule_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }
        if(!empty($edit_info['email'])){//如果有新邮箱
            $rule_count = self::where('email',$data['email'])->count();  //根据用户输入权限的控/方查询数据库权限的控/方信息
            if($rule_count){//如果有数据说明权限的控/方已存在
                return 3;
            }
        }
        self::where('rule_id',$data['rule_id'])->update($edit_info);
          //本次新增权限信息写入log 执行操作对象 9：权限  执行操作类型1：删除， 2：添加， 3：修改，
        self::addAadminLog(9,3,$data['rule_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }


    /**
     * 删除权限
     * @param $rule_id 权限id
     * @return int 0：$rule_id为空，1：已删除权限，2：成功删除
     * @throws \Exception
     */
    public static function deleteRule ($rule_id) {
        if(empty($rule_id)){
            return 0;
        }
        //查询数据库中是否存在该权限  0：没有  1：存在
        $rule_count = self::where('rule_id','=',$rule_id)->count();
        if(!$rule_count){ //不存在说明已删除
            return 1;
        }
        //如果删除顶级分类

        self::where('rule_id','=',$rule_id)->delete();//执行删除权限
         //本次新增权限信息写入log 执行操作对象 9：权限  执行操作类型1：删除， 2：添加， 3：修改，
        self::addAadminLog(9,1,$rule_id,date('Y-m-d H:i:s', time()));
        return 2;
    }

    /**
     * 功能:无限级分类
     * 参数:$data 类别查询结果集
     * 返回值:$arr 排序后的数组
     */
    public static function  getCateTree($data) {
        $arr = self::cateSort($data);
        return $arr;
    }

    /**
     * 功能:无限级分类排序
     * 参数:$data 类别查询结果集
     * 返回值:$arr 递归查询排序后的数组
     */
    public static function cateSort($data,$pid=0) {
        static $arr = array();
        foreach($data as $k => $v) {
            if($v['pid'] == $pid) {
                $arr[$k] = $v;
                self::cateSort($data,$v['rule_id']);
            }
        }
        return $arr;
    }
    
}
