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
            ->orderBy('articles.created_at', 'desc')
            ->get();
        return  $cate_tag_article;
    }


    /**
     * 获取分类 用于新增文章选择
     * @return \Illuminate\Support\Collection 所有分类
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
     * 获取标签 用于新增文章选择
     * @return \Illuminate\Support\Collection  所有标签
     */
    public  static  function  tags(){
        $tags =DB::table('tags')
            ->select('name as  tag_name','tag_id','is_pull')
            ->get();
        foreach ($tags as $k){
            if($k->is_pull==1){
                $k->tag_name= $k->tag_name.'(已下架)';
            }
        }
        return  $tags;
    }

    /**新增文章
     * @param $data
     * @return int 0：$data为空，1：文章标题已存在，2：成功新增文章
     */

    public  static  function  addArticle($data){
        if(empty($data)){//如果$data为空
           return 0;
        }
        $article_count = self::where('title',$data['title'])->count(); //根据用户输入标题查询数据库文章表标题字段
        if($article_count){//如果有数据说明文章已存在
            return 1;
        }
        if(!empty($data['markdown'])){//如果$data['markdown']有数据，则转html
            $data['html']= Markdown::convertToHtml($data['markdown']);//markdown转html
        }else{
            $data['html']="";
        }
        $res=self::create($data);//使用create新增文章
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
        if(empty($data)){//如果$data为空
            return 0;
        }
        $article_res = self::find($data['article_id'],["category_id","tag_id","article_id","title","author" ,"description","keywords","markdown","is_pull","cover","author_id","is_top"]); //根据文章id查询数据库文章信息
        $article_info=$article_res->toArray(); //集合转数组
        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$article_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
           return 1;
        }
        if(!empty($edit_info['title'])){//如果有新标题
            $article_count = self::where('title',$data['title'])->count(); //根据用户输入标题查询数据库文章表标题字
            if($article_count){//如果有数据说明文章标题已存在
                return 3;
            }
        }
        if(!empty($edit_info['markdown'])){//如果$data['markdown']有数据，则转html
            $edit_info['html']= Markdown::convertToHtml($data['markdown']);//markdown转html
        }
        if(!empty($edit_info['is_pull']) && $edit_info['is_pull']==1){//如果 is_pull=1 下架文章取消置顶
            $edit_info['is_top']= 1;//取消置顶
        }
        self::find($data['article_id'])->update($edit_info);//使用update方法修改文章
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
        preg_match_all($preg, $article_info->markdown, $allImg);//这里匹配指定文章/uploads/images/article/的img
        //多维数组转一维
        $allImg=array_flatten($allImg);

        array_push($allImg,$article_info->cover);//把封面图入栈
        //删除图片
        self::deletedCover($allImg,2);
        self::where('article_id','=',$article_id)->delete();
        //本次删除文章信息写入log
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



