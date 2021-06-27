<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
* Class categoryController   显示指定类型下的文章
* @package App\Http\Controllers\Home
*/

class TagController extends Controller
{
    /**
     * 显示指定标签下的文章
     * @param $tag_id 标签id
     * return array
     */
    public function showTag($category_id,$tag_id)
    {

        //获取类型id下的标签和标签下的文章数
        //1:类型id下的标签

        $tag_res=Tag::select('tag_id')->where([['category_id','=', $category_id],['is_pull','=',2]])->get();
        $tag_res_ids =array_flatten($tag_res->toArray());

        //$tag_ids= implode(",",$tag_res_ids);
        //2:标签下的文章数
        $tag_article_res = DB::table('articles')
            ->select(DB::raw("count(article_id) as article_num,linblog_articles.tag_id,linblog_tags.name"))
            ->whereIn('articles.tag_id', $tag_res_ids)
            ->where("articles.is_pull",'=',2)
            ->groupBy("articles.tag_id")
            ->join("tags", "articles.tag_id", '=', "tags.tag_id")
            ->get();

        //$article_res=DB::table('articles')->where('category_id','=', $category_id)->select('title')->paginate(2);
        $article_res = DB::table('articles')
            ->select('articles.tag_id','articles.category_id','articles.article_id','articles.title','articles.description','articles.cover','articles.html','articles.author','articles.created_at','tags.name as tags_name','categorys.name as categorys_name')
            ->where([['articles.category_id','=', $category_id],["articles.is_pull",'=',2],['articles.tag_id','=', $tag_id]])
            ->join("tags", "articles.tag_id", '=', "tags.tag_id")
            ->join('categorys','articles.category_id', '=', 'categorys.category_id')
            ->paginate(1);
        //4:获取类型id的信息 填充网页头部

        $category_res=Category::find($category_id,["name","description","keywords"]);

        $head = [
            'title'       => $category_res->name,
            'keywords'    => $category_res->keywords,
            'description' => $category_res->description,
        ];
        $assign = [
            'tags'         =>$tag_article_res,
            'articles'     => $article_res,
            'head'         => $head,
            'category_id'  =>$category_id,
            'tag_id'  =>$tag_id
        ];
        return view('home.category',$assign);
    }


}
