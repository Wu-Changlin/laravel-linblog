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
        self::addAadminLog(9,2,$res->rule_id,$res->created_at);
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
        $rule_res = self::find($data['rule_id'],["rule_id","pid","title","name"]); //查询该权限信息
        $rule_info=$rule_res->toArray(); //集合转数组

        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$rule_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info){//空数组说明没有修改字段值，返回1
            return 1;
        }

        if(!empty($edit_info['name'])){//如果有新权限的控/方
            $rule_count = self::where('name',$data['name'])->count();  //根据用户输入权限的控/方查询数据库权限的控/方信息
            if($rule_count){//如果有数据说明权限的控/方已存在
                return 3;
            }
        }

        if(!empty($edit_info['pid'])){//如果有新上级权限
            if($edit_info['pid']!=0){//如果有新上级权限非顶级权限
                $pid_level=self::find($data['pid'],['level']);
                $edit_info['level']=$pid_level->level+1; //子级权限级别=上级权限级别+1
            }else{
                $edit_info['level']=0;
            }

        }
        
        self::where('rule_id',$data['rule_id'])->update($edit_info);
        //本次修改权限信息写入log 执行操作对象 9：权限  执行操作类型1：删除， 2：添加， 3：修改，
        self::addAadminLog(9,3,$data['rule_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }


    /**
     * 删除权限
     * @param $rule_id 权限rule_id
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
        $rule_ids=self::getchilrenid($rule_id); //获取被删除权限的rule_id子权限数组
        $rule_ids[]=intval($rule_id);//被删除权限rule_id添加进数组
        $rule_ids_count=count($rule_ids);//统计被删除权限rule_id个数
        self::destroy($rule_ids);//执行删除权限
        if($rule_ids_count !=1){//如果权限数组的个数不等于1，需要循环写入删除权限信息
            for ($i=0;$i<$rule_ids_count;$i++){
                //本次删除权限信息写入log 执行操作对象 9：权限  执行操作类型1：删除， 2：添加， 3：修改，
                self::addAadminLog(9,1,$rule_ids[$i],date('Y-m-d H:i:s', time()));
            }
        }else{
            //本次删除权限信息写入log 执行操作对象 9：权限  执行操作类型1：删除， 2：添加， 3：修改，
           self::addAadminLog(9,1,$rule_id,date('Y-m-d H:i:s', time()));
        }
        return 2;
    }


    /**
     * 整理权限数据
     * @param $rule_data 权限数据
     * @return array     已排序和关系链化权限数据
     */
    public static function authRuleTree($rule_data){
        return self::sort($rule_data);
    }


    /**
     * 排序
     * @param $data     需要排序权限数据
     * @param int $pid  权限rule_id的上级权限rule_id
     * @return array    已排序和关系链化权限数据
     */
    public static function sort($data,$pid=0){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$pid){
                $v['dataid']=self::getparentid($v['rule_id']);
                $arr[]=$v;
                self::sort($data,$v['rule_id']);
            }
        }
        return $arr;
    }

    /**
     * 查询权限数据并调用权限关系链函数
     * @param $authRuleid 权限rule_id
     * @return string     权限关系链
     */
    public static function getparentid($authRuleid){
        $AuthRuleRes=self::all();
        return self::_getparentid($AuthRuleRes,$authRuleid,True);

    }

    /**
     * 权限关系链
     * @param $AuthRuleRes 权限数据
     * @param $authRuleid  权限rule_id
     * @param bool $clear
     * @return string     顶级权限-一级权限-二级权限
     */
    public static function _getparentid($AuthRuleRes,$authRuleid,$clear=False){
        static $arr=array();
        if($clear){
            $arr=array();
        }
        foreach ($AuthRuleRes as $k => $v) {
            if($v['rule_id']==$authRuleid){
                $arr[]=$v['rule_id'];
                self:: _getparentid($AuthRuleRes,$v['pid'],False);
            }
        }
        asort($arr);
        $arrStr=implode('-',$arr);
        return $arrStr;
    }

    /**
     * 调用递归查询
     * @param $authRuleid 删除权限rule_id
     * @return array      权限rule_id数组
     */
    public static function getchilrenid($authRuleid){
        $AuthRuleRes=self::all();
        return self::_getchilrenid($AuthRuleRes,$authRuleid);

    }

    /**
     * 递归查询权限rule_id
     * @param $AuthRuleRes   权限查询结果集
     * @param $authRuleid    删除权限rule_id
     * @return array 递归查询的权限rule_id数组
     */
    public static function _getchilrenid($AuthRuleRes,$authRuleId){
        static $arr=array();
        foreach ($AuthRuleRes as $k => $v) {
            if($v['pid']==$authRuleId){
                $arr[]=$v['rule_id'];//找到顶级权限的的子权限
                self::_getchilrenid($AuthRuleRes,$v['rule_id']);//再查找该子权限下的子权限，递归到最后。
            }
        }
        return $arr;//所有子权限的ID
    }


    
}
