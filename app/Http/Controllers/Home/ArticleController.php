<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return view('home.article');
    }


}
