<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

class Tag extends Base
{

    protected $primaryKey='tag_id';

    /**
     * 标签列表
     * @return \Illuminate\Support\Collection
     */
    public  static  function  lists(){
        $cate_tag =DB::table('tags')
            ->join('categorys', 'tags.category_id', '=', 'categorys.category_id')
            ->select('categorys.name as  category_name','categorys.category_id', 'tags.tag_id','tags.name','tags.keywords','tags.description','tags.is_pull')
            ->get();
        return  $cate_tag;
    }



    /**
     * 获取分类 用于新增
     * @return \Illuminate\Support\Collection
     */
    public  static  function  categorys(){
        $categarys =DB::table('categorys')
            ->select('name as  category_name','category_id')
            ->where('is_pull','=',2)
            ->get();
        return  $categarys;
    }


    /**
     * @param $data
     * @return int 0: $data为空 1: 标签已存在 2:新增标签成功
     */
    public static  function  addTag($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $tag_count = self::where('name',$data['name'])->count(); //根据用户输入标签查询数据库用户信息
        if($tag_count){//如果有数据说明标签已存在
            return 1;
        }
        $res=self::create($data);//使用create方法新增标签
        //本次新增标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=2;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员'
        $admin_log['exec_type']=2;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$res->tag_id;        //执行操作对象id
        $admin_log['created_at']=$res->created_at;;//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

    /**
     * @param $data
     * @return int   0:$data为空 ,1
     */
    public static function updateTag($data){
        if(empty($data)){ //如果$data为空直接返回
            return 0;
        }
        $tag_res = self::find($data['tag_id'],["category_id","name", "keywords" ,"description","is_pull"]); //根据用户输入标签查询数据库标签信息
        $tag_info=$tag_res->toArray(); //集合转数组
        //判断分类id是否修改
        if($data['category_id'] ==$tag_info['category_id']){
            array_pull($data, 'category_id');
        }
        //判断标签名是否修改
        if($data['name'] == $tag_info['name']){
            array_pull($data, 'name');
        }else{
            $tag_name_count = self::where('name',$data['name'])->count(); //根据用户输入标签查询数据库用户信息
            if($tag_name_count){//如果有数据说明标签已注册
                return 1;
            }
        }
        //判断标签关键词是否修改
        if($data['keywords'] == $tag_info['keywords'] ){
            array_pull($data, 'keywords');
        }
        //判断标签描述是否修改
        if($data['description'] == $tag_info['description']){
            array_pull($data, 'description');
        }
        //判断标签是否下架
        if($data['is_pull'] == $tag_info['is_pull']){
            array_pull($data, 'is_pull');
        }
        //判断是否有需要修改的信息
        if(! isset($data['category_id']) && ! isset($data['name']) && ! isset($data['keywords'])  && ! isset($data['description']) && ! isset($data['is_pull']) ){
            return 2;
        }

        self::where('tag_id',$data['tag_id'])->update($data);
        //本次修改标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=2;                    //执行操作对象 0:默认 1：标签， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=3;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改，4：登录， 5：退出',
        $admin_log['exec_object_id']=$data['tag_id'];    //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 3;
    }

    /**
     *删除标签
     * @param $tag_id 删除标签id
     */
    public static function deleteTag ($tag_id) {
        if(empty($tag_id)){
            return 0;
        }
        //查询数据库中是否存在该标签  0：没有  1：存在
        $tag_count = self::where('tag_id','=',$tag_id)->count();
        if(!$tag_count){ //不存在说明已删除
            return 1;
        }
        self::where('tag_id','=',$tag_id)->delete();
        //本次删除标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=2;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=1;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$tag_id;       //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

}
