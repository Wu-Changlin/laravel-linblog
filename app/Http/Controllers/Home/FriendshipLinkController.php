<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class FriendshipLinkController   前台友好博客
 * @package App\Http\Controllers\Home
 */

class FriendshipLinkController extends Controller
{

    /**
     * showFirend      前台友好博客
     * return  array
     */
    public function showFirend()
    {


        //dd('前台友好博客
        //     * return  array');
        $category_val='friend';
        $assign = [
//            'tags'         => $tag_article_res,
//            'articles'     => $article_res,
//            'head'         => $head,
            'category_val'  =>$category_val,
            'category_id'  =>0,
            'tag_id'=>0
        ];

        return view('home.friend_ship_link',$assign);
        //return view('home.article');
    }


}
