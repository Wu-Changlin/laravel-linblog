<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ResourceStocksController   前台资源库
 * @package App\Http\Controllers\Home
 */

class ResourceStockController extends Controller
{

    /**
     * showArticle      前台资源库
     * return  array
     */
    public function showResource()
    {
        $category_val='resource';
        $assign = [
//            'tags'         => $tag_article_res,
//            'articles'     => $article_res,
//            'head'         => $head,
            'category_val'  =>$category_val,
            'category_id'  =>0,
            'tag_id'=>0
        ];

        return view('home.resource_stock',$assign);

    }


}
