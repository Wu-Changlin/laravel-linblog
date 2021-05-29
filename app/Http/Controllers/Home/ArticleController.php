<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ArticleController   前台文章
 * @package App\Http\Controllers\Home
 */

class ArticleController extends Controller
{

    /**
     * showArticle      显示文章内容+文章评论
     * @param $article_id 文章id
     * return  array
     */
    public function showArticle($article_id)
    {


        //dd('前台显示文章内容+文章评论');
        return view('home.article');
        //return view('home.article');
    }


}
