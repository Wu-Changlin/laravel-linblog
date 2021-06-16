<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\File;

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
     *  修改文章
     * @return \Illuminate\Support\Collection
     */
    public  static  function  updateArticle($data){
        if(empty($data)){
            return 0;
        }
//
        $article_res = self::find($data['article_id'],["category_id","tag_id","title","author" ,"description","keywords","markdown","is_pull","cover"]); //根据用户输入邮箱查询数据库分类信息
        $article_info=$article_res->toArray(); //集合转数组

        //判断分类父id是否修改
        if($data['title'] ==$article_info['title']){
            array_pull($data, 'title');
        }else{
            $article_count = self::where('title',$data['title'])->count(); //根据用户输入标题查询数据库文章表标题字段
            if($article_count){//如果有数据说明文章已存在
                return 1;
            }
        }
        //判断分类父id是否修改
        if($data['category_id'] ==$article_info['category_id']){
            array_pull($data, 'category_id');
        }
        //判断分类名是否修改
        if($data['tag_id'] == $article_info['tag_id']){
            array_pull($data, 'tag_id');
        }
        //判断分类关键词是否修改
        if($data['author'] == $article_info['author'] ){
            array_pull($data, 'author');
        }
        //判断分类关键词是否修改
        if($data['keywords'] == $article_info['keywords'] ){
            array_pull($data, 'keywords');
        }
        //判断分类描述是否修改
        if($data['description'] == $article_info['description']){
            array_pull($data, 'description');
        }
        //判断分类类型是否修改
        if($data['markdown'] ==$article_info['markdown']){
            array_pull($data, 'markdown');
        }
        //判断分类是否下架
        if($data['is_pull'] == $article_info['is_pull']){
            array_pull($data, 'is_pull');
        }

        //判断是否有需要修改的信息
        if(! isset($data['title']) && ! isset($data['category_id'])   && ! isset($data['tag_id']) && ! isset($data['keywords'])  && ! isset($data['description'])   && ! isset($data['markdown']) && ! isset($data['is_pull']) && ! isset($data['type'])){
            return 2;
        }


        $data['html']= Markdown::convertToHtml($data['markdown']);
        self::find($data['article_id'])->update($data);//使用update方法修改文章

        //本次新增标签信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=3;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员'
        $admin_log['exec_type']=3;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$data['article_id'];        //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 3;

    }

    public static function deleteArticle($article_id)
    {
        if(empty($article_id)){
            return 0;
        }
        //查询数据库中是否存在该分类  0：没有  1：存在
        $article_id_count = self::where('article_id','=',$article_id)->count();
        if(!$article_id_count){ //不存在说明已删除
            return 1;
        }
        $article_info = self::find($article_id,["markdown","cover"]); //查询包含图片路径的信息
        $preg = '/(?<=\()+\/uploads\/images\/article\/+[^\)]+/';// 匹配括号里面的内容的正则表达式 markdown里的图片路径：(/uploads/images/article/20210616/DkCGWaGQTm1623848364.png)
        preg_match_all($preg, $article_info->markdown, $allImg);//这里匹配所有的img

        $result = array_reduce($allImg, function ($result, $value) {
            return array_merge($result, array_values($value));
        }, array());
        $path="dzCyMdhqK21623848377.png";

        File::delete($path);
        dd('dd');
        self::where('article_id','=',$article_id)->delete();
        //本次删除分类信息写入log
        $admin_user=session('admin_user');
        $admin_log['last_login_ip']=$admin_user['last_login_ip'];    //管理员IP
        $admin_log['admin_id']=$admin_user['admin_id'];  //管理员id
        $admin_log['exec_object']=3;                    //执行操作对象 0:默认 1：分类， 2：标签 ，3：文章，4：评论，5：网站配置 ， 6：管理员',
        $admin_log['exec_type']=1;                      //执行操作类型 0:默认 1：删除， 2：添加， 3：修改， 4：登录， 5：退出',
        $admin_log['exec_object_id']=$article_id;       //执行操作对象id
        $admin_log['created_at']=date('Y-m-d H:i:s', time());//执行操作创建时间
        self::addAadminLog($admin_log);
        return 2;



    }


}



