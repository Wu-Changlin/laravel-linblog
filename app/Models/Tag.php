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
            ->orderBy('tags.created_at', 'desc')
            ->paginate(10);
        return  $cate_tag;
    }



    /**
     * 获取分类 用于新增
     * @return \Illuminate\Support\Collection
     */
    public  static  function  categorys(){
        $categarys =DB::table('categorys')
            ->select('name as  category_name','category_id','is_pull')
            ->get();
        foreach ($categarys as $k){
            if($k->is_pull==1){
                $k->category_name= $k->category_name.'(已下架)';
            }
        }
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
        $tag_count = self::where('name',$data['name'])->count(); //根据用户输入标签名查询数据库标签表标签名
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
        $admin_log['created_at']=$res->created_at;//执行操作创建时间
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
        $tag_res = self::find($data['tag_id'],["tag_id","category_id","name", "keywords" ,"description","is_pull"]); //查询该标签信息
        $tag_info=$tag_res->toArray(); //集合转数组
        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$tag_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }
        //判断标签名是否修改
        if(!empty($edit_info['name'])){
            $tag_name_count = self::where('name',$data['name'])->count(); //根据用户输入标签名查询数据库标签表标签名
            if($tag_name_count){//如果有数据说明标签已存在
                return 3;
            }
        }
        self::where('tag_id',$data['tag_id'])->update($edit_info);
        //本次修改标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=2;                    //执行操作对象 0:默认 1：标签， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=3;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改，4：登录， 5：退出',
        $admin_log['exec_object_id']=$data['tag_id'];    //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
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
