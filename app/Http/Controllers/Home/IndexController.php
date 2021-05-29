<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
//        dd('home.....IndexController ....index');
        //dd('博客前台首页');
        return view('home.index');
    }


}
