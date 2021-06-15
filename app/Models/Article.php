<?php

namespace App\Models;
use GrahamCampbell\Markdown\Facades\Markdown;

use Illuminate\Support\Facades\DB;
class Article extends Base
{
    //
    protected $primaryKey = 'article_id';

    /**
     * 文章列表
     * @return \Illuminate\Support\Collection
     */
    public  static function  lists(){
        $cate_tag_article = DB::table('articles')
            ->join('categorys', 'articles.category_id', '=', 'categorys.category_id')
            ->join('tags', 'articles.tag_id', '=', 'tags.tag_id')
            ->select('categorys.name as  category_name','categorys.category_id', 'tags.tag_id','tags.name as tag_name','articles.article_id','articles.title','articles.author','articles.is_pull','articles.Visits','articles.cover')
            ->get();
        return  $cate_tag_article;
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
     * 获取标签 用于新增
     * @return \Illuminate\Support\Collection
     */
    public  static  function  tags(){
        $tags =DB::table('tags')
            ->select('name as  tag_name','tag_id')
            ->where('is_pull','=',2)
            ->get();
        return  $tags;
    }

    /**
     *  新增文章
     * @return \Illuminate\Support\Collection
     */
    public  static  function  addArticle($data){
        if(empty($data)){
           return 0;
        }
        $article_count = self::where('title',$data['title'])->count(); //根据用户输入标题查询数据库文章表标题字段
        if($article_count){//如果有数据说明文章已存在
            return 1;
        }
        $data['html']= Markdown::convertToHtml($data['markdown']);

        $res=self::create($data);//使用create方法新增标签
        //本次新增标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=3;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员'
        $admin_log['exec_type']=2;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$res->article_id;        //执行操作对象id
        $admin_log['created_at']=$res->created_at;;//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;
    }

    /**
     *  新增文章
     * @return \Illuminate\Support\Collection
     */
    public  static  function  updateArticle($data){
        if(empty($data)){
            return 0;
        }
//        $article_count = self::where('title',$data['title'])->count(); //根据用户输入标题查询数据库文章表标题字段
//        if($article_count){//如果有数据说明文章已存在
//            return 1;
//        }
        $data['html']= Markdown::convertToHtml($data['markdown']);

        $res=self::withTrashed()->find($data['article_id'])->update($data);//使用update方法修改文章
        if(intval($res)>0){
            //本次新增标签信息写入log
            $admin_user=session('admin_user');
            $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
            $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
            $admin_log['exec_object']=3;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员'
            $admin_log['exec_type']=3;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
            $admin_log['exec_object_id']=$data['article_id'];        //执行操作对象id
            $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
            self::addAadminLog($admin_log);
            return 2;
        }else{
            return 1;
        }

    }


}
