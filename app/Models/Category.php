<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Category extends Base
{
    protected $table='categorys';
    protected $primaryKey = 'category_id';

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
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=1;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员'
        $admin_log['exec_type']=2;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$res->category_id;        //执行操作对象id
        $admin_log['created_at']=$res->created_at;;//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

    /**
     * @param $data
     * @return int   0:$data为空 ,1
     */
    public static function updateCategory($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }

        $category_res = self::find($data['category_id'],["pid","name", "keywords" ,"description","is_pull","type"]); //根据用户输入邮箱查询数据库分类信息
        $category_info=$category_res->toArray(); //集合转数组
        //判断分类名是否修改
        if($data['name'] == $category_info['name']){
            array_pull($data, 'name');
        }else{
            $category_name_count = self::where('name',$data['name'])->count(); //根据用户输入分类名查询数据库分类表分类信息
            if($category_name_count){//如果有数据说明分类已存在
                return 1;
            }
        }
        //判断分类父id是否修改
        if($data['pid'] ==$category_info['pid']){
            array_pull($data, 'pid');
        }

        //判断分类关键词是否修改
        if($data['keywords'] == $category_info['keywords'] ){
            array_pull($data, 'keywords');
        }
        //判断分类描述是否修改
        if($data['description'] == $category_info['description']){
            array_pull($data, 'description');
        }
        //判断分类是否下架
        if($data['is_pull'] == $category_info['is_pull']){
            array_pull($data, 'is_pull');
        }
        //判断分类类型是否修改
        if($data['type'] ==$category_info['type']){
            array_pull($data, 'type');
        }
        //判断是否有需要修改的信息
        if(! isset($data['pid']) && ! isset($data['name']) && ! isset($data['keywords'])  && ! isset($data['description']) && ! isset($data['is_pull']) && ! isset($data['type'])){
            return 2;
        }

        self::where('category_id',$data['category_id'])->update($data);
        //本次修改分类信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=1;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=3;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改，4：登录， 5：退出',
        $admin_log['exec_object_id']=$data['category_id'];    //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 3;
    }

    /**
     *删除分类
     * @param $category_id 删除分类id
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
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=1;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=1;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$category_id;       //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

}
