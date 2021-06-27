<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Category extends Base
{
    protected $table='categorys';
    protected $primaryKey = 'category_id';

    /**
     * 新增分类
     * @param $data 新增分类数据
     * @return int 0：$data为空，1：分类已存在，2：成功新增分类
     */
    public static function addCategory($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $category_count = self::where('name',$data['name'])->count(); //根据用户输入分类名查询数据库分类表分类信息
        if($category_count){//如果有数据说明分类已存在
            return 1;
        }
        $res=self::create($data);//使用create方法新增分类
        //本次新增分类信息写入log
        self::addAadminLog(1,2,$res->category_id,$res->created_at);
        return 2;
    }

    /**
     * 修改分类
     * @param $data   分类新数据
     * @return int   0：$data为空，1：没有有需要修改的，保留原有数据，2：成功修改分类，3：分类名已存在
     */
    public static function updateCategory($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $category_res = self::find($data['category_id'],["category_id","pid","name", "keywords" ,"description","is_pull","type","val"]); //根据分类id查询数据库分类信息
        $category_info=$category_res->toArray(); //集合转数组
        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$category_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }
        if(!empty($edit_info['name'])){
            $category_name_count = self::where('name',$data['name'])->count(); //根据用户输入分类名查询数据库分类表分类信息
            if($category_name_count){//如果有数据说明分类已存在
                return 3;
            }
        }
        self::where('category_id',$data['category_id'])->update($edit_info); //执行修改分类操作
        //本次修改分类信息写入log
        self::addAadminLog(1,3,$data['category_id'],date('Y-m-d H:i:s', time()));
        return 2;
    }


    /**
     * 删除分类
     * @param $category_id    分类id
     * @return int   0：$data为空，1：分类不存在，2：成功删除分类
     */
    public static function deleteCategory ($category_id) {
        if(empty($category_id)){
            return 0;
        }
        //查询数据库中是否存在该分类  0：没有  1：存在
        $category_count = self::where('category_id','=',$category_id)->count();
        if(!$category_count){ //不存在说明已删除
            return 1;
        }
        self::where('category_id','=',$category_id)->delete();
        //本次删除分类信息写入log
        self::addAadminLog(1,1,$category_id,date('Y-m-d H:i:s', time()));
        return 2;
    }

}
