<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Article;


use Illuminate\Support\Facades\DB;
/**
* Class categoryController   显示文章内容
* @package App\Http\Controllers\Home
*/

class ArticleController extends Controller
{
    /**
     * 显示文章内容
     * @param $article_id 文章id
     * return array
     */
    public function showArticle($article_id)
    {
        //获取文章信息
        $article_res =Article::join("tags", "articles.tag_id", '=', "tags.tag_id")                                   ->find($article_id,['articles.tag_id','articles.category_id','article_id','title','articles.description','cover','html','author','visits','articles.created_at','tags.name as tags_name']);
        //填充网站头部
        $head = [
            'title'       => $article_res->title,
            'keywords'    => $article_res->keywords,
            'description' => $article_res->description,
        ];
        //分配页面数据
        $assign = [
            'article'     => $article_res,
            'head'         => $head,
            'category_id'  =>$article_res->category_id,
            'category_val'  =>'',
            'tag_id'  =>$article_res->tag_id,
        ];
        return view('home.article',$assign);
    }


}
