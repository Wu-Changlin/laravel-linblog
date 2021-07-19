<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
/**
 * Class IndexController    前台首页
 * @package App\Http\Controllers\Home
 */
class IndexController extends Controller
{

    /**
     * 显示博客前台首页
     * @return array
     */
    public function showIndex()
    {
        //获取置顶的文章
        $article_top_res = Article::select('tag_id','category_id','article_id','title','cover')
            ->where([["is_pull",'=',2],["is_top",'=',2]])
            ->orderByDesc("visits")
            ->limit(4)
            ->get();
        if($article_top_res->count()<4){//如果集合的项目总数小于4 按照访问数降序 从大到小
            $article_top_res = Article::select('tag_id','category_id','article_id','title','cover')
                ->where("is_pull",'=',2)
                ->orderByDesc("visits")
                ->limit(4)
                ->get();
        }
        //获取文章信息 按照时间降序
        $article_res = DB::table('articles')
            ->select('articles.tag_id','articles.category_id','articles.article_id','articles.title','articles.description','articles.cover','articles.html','articles.author','articles.created_at','tags.name as tags_name','categorys.name as categorys_name')
            ->where("articles.is_pull",'=',2)
            ->join("tags", "articles.tag_id", '=', "tags.tag_id")
            ->join('categorys','articles.category_id', '=', 'categorys.category_id')
            ->orderByDesc("articles.created_at")
            ->paginate(10);
        //获取类型id的信息 填充网页头部
        $category_res=Category::find(1,["name","description","keywords"]);
        $head = [
            'title'       => $category_res->name,
            'keywords'    => $category_res->keywords,
            'description' => $category_res->description,
        ];
        $assign = [
            'article_tops'         => $article_top_res,
            'articles'     => $article_res,
            'head'         => $head,
            'category_id'  =>1,
            'category_val'  =>'',
            'tag_id'=>0
        ];
        return view('home.index',$assign);
    }











}
