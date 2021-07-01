<?php

namespace App\Models;



class FriendshipLink extends Base
{
    //
    protected $primaryKey='link_id';

    /**
     * 新增友好博客
     * @param $data 友好博客数据
     * @return int  0：数据为空，1：已存在，2：新增成功
     */
    public static function addFriend($data,$type){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $friend_count = self::where('name',$data['name'])->count(); //根据用户输入友好博客名查询数据库友好博客表友好博客名
        if($friend_count){//如果有数据说明友好博客已存在
            return 1;
        }
        $res=self::create($data);//使用create方法新增友好博客
        //本次新增友好博客信息写入log
        self::addAadminLog(8,$type,$res->link_id,$res->created_at);
        return 2;
    }


    /**
     * 修改友好博客
     * @param $data 友好博客新数据
     * @return int 0：数据为空，1：无需修改，保留原样，2：修改成功，3：友好博客名已存在
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
        self::addAadminLog(8,1,$data['link_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }

    
    /**
     * 删除友好博客
     * @param $link_id  友好博客id
     * @return int      0：数据为空，1：友好博客已删除，2：成功删除
     * @throws \Exception
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
        //本次删除友好博客信息写入log
        self::addAadminLog(8,1,$link_id,date('Y-m-d H:i:s', time()));
        return 2;
    }
}
