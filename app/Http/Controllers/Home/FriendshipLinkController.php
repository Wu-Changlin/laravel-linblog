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


        //dd('前台显示文章内容+文章评论');
        return view('home.friend_ship_link');
        //return view('home.article');
    }


}
