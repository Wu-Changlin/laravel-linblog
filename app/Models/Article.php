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
            ->paginate(10);
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

    /**
     * 新增文章
     * @param $data 新增文章数据
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
        //本次新增文章信息写入log
        self::addAadminLog(3,2,$res->article_id,$res->created_at);
        return 2;
    }

    /**
     * 修改文章
     * @param $data 文章新数据
     * @return int  0：数据为空，1：无需修改，保留原样，2：修改成功，3：文章标题已存在
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
        if(!empty($edit_info['is_pull'])){//如果下架文章有数据
            $tag_is_pull_res=DB::table('tags')->where('tag_id', '=',$data['tag_id'])->get(['is_pull']); //文章所属标签
            $tag_is_pull_data = json_decode($tag_is_pull_res,true);//使用true，转数组
            $tag_is_pull['is_pull'] = $tag_is_pull_data[0]['is_pull'];
            if(intval($tag_is_pull['is_pull'])===1){ //如果文章所属标签已下架
                return 4;
            }else{//如果文章所属标签未下架
                if($edit_info['is_pull']==1){//下架文章同时取消置顶
                    $edit_info['is_top']= 1;//取消置顶
                }
            }

        }
        self::find($data['article_id'])->update($edit_info);//使用update方法修改文章
        //本次修改文章信息写入log
        self::addAadminLog(3,3,$data['article_id'],date('Y-m-d H:i:s', time()));
        return 2;

    }

    /**
     *删除文章
     * @param $article_id  文章id
     * @return int        0：数据为空，1：文章已删除，2：成功删除
     * @throws \Exception
     */
    public static function deleteArticle($article_id)
    {
        if(empty($article_id)){
            return 0;
        }
        //查询数据库中是否存在该文章  0：没有  1：存在
        $article_id_count = self::where('article_id','=',$article_id)->count();
        if(!$article_id_count){ //不存在说明已删除
            return 1;
        }
        $article_info = self::find($article_id,["markdown","cover"]); //查询包含图片路径的信息
        $preg = '/(?<=\()+\/uploads\/images\/article\/+[^\)]+/';// 匹配括号里面的内容的正则表达式 markdown里的图片路径：(/uploads/images/article/20210616/DkCGWaGQTm1623848364.png)
        preg_match_all($preg, $article_info->markdown, $allImg);//这里匹配指定文章/uploads/images/article/的img
        $allImg=array_flatten($allImg); //多维数组转一维
        array_push($allImg,$article_info->cover);//把封面图入栈
        self::deletedCover($allImg,2); //删除图片
        self::where('article_id','=',$article_id)->delete();
        //本次删除文章信息写入log
        self::addAadminLog(3,1,$article_id,date('Y-m-d H:i:s', time()));
        return 2;
    }


}



