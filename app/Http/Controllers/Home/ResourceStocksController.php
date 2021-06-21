<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ResourceStocksController   前台资源库
 * @package App\Http\Controllers\Home
 */

class ResourceStocksController extends Controller
{

    /**
     * showArticle      前台资源库
     * return  array
     */
    public function showResource()
    {

        return view('home.resource_stocks');

    }


}
