<?php

namespace App\Models;


class WebConfig extends Base
{
    //
    protected $primaryKey='config_id';


    /**
     * 新增配置
     * @param $data 新增配置数据
     * @return int 0：$data为空，1：配置邮箱已存在，2：成功新增分类
     */
    public static function addConfig ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $config_count = self::where('name',$data['name'])->count(); //根据用户输入标签名查询数据库标签表标签名
        if($config_count){//如果有数据说明标签已存在
            return 1;
        }

        $res=self::create($data);//使用create方法新增标签
        //本次新增标签信息写入log
        self::addAadminLog(5,2,$res->config_id,$res->created_at);
        return 2;
    }

    /**
     * 修改配置信息
     * @param $data 配置新数据
     * @return int  0：$data为空，1：无需修改，保留原样，2：成功修改分类，3：配置邮箱已存在
     */
    public static function updateConfig ($data) {
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }

        $config_res = self::find($data['config_id'],["config_id","name","enname","type","values"]); //查询该配置信息
        $config_info=$config_res->toArray(); //集合转数组

        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$config_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }
        if(!empty($edit_info['name'])){//如果有新配置名称
            $admin_count = self::where('name',$data['name'])->count(); //根据用户输入配置查询数据库配置表配置名称信息
            if($admin_count){//如果有数据说明配置已存在
                return 3;
            }
        }
        self::where('config_id',$data['config_id'])->update($edit_info);
        self::addAadminLog(5,3,$data['config_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }


    /**
     * 删除配置
     * @param $admin_id 配置id
     * @return int 0：$admin_id为空，1：已删除配置，2：成功删除
     * @throws \Exception
     */
    public static function deleteConfig ($config_id) {
        if(empty($config_id)){
            return 0;
        }
        //查询数据库中是否存在该配置  0：没有  1：存在
        $admin_count = self::where('config_id','=',$config_id)->count();
        if(!$admin_count){ //不存在说明已删除
            return 1;
        }
        self::where('config_id','=',$config_id)->delete();
        //本次删除配置信息写入log
        self::addAadminLog(5,1,$config_id,date('Y-m-d H:i:s', time()));
        return 2;
    }


}
