<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
* Class CategoryController   显示指定类型下的文章
* @package App\Http\Controllers\Home
*/

class CategoryController extends Controller
{
    /**
     * 显示指定类型下的文章
     * @param $category_id 类型id
     * return array
     */
    public function showCategory($category_id)
    {
        dd('前台显示指定类型下的文章');
        //return view('home.index');
    }


}
