<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
* Class categoryController   显示指定类型下的文章
* @package App\Http\Controllers\Home
*/

class CategoryController extends Controller
{
    /**
     * 显示指定类型下的标签、文章
     * @param $category_id 类型id
     * return array
     */
    public function showCategory($category_id)
    {

        //获取类型id下的标签和标签下的文章数
        //1:类型id下的标签

        $tag_res=Tag::select('tag_id')->where([['category_id','=', $category_id],['is_pull','=',2]])->get();





        $tag_res_ids =array_flatten($tag_res->toArray());

        //$tag_ids= implode(",",$tag_res_ids);

        $sss= DB::table('articles')
            ->select(DB::raw('count(article_id) as article_num,tag_id'))
            ->whereIn('tag_id', $tag_res_ids)
            ->where('is_pull','=',2)
            ->groupBy("tag_id")
            ->get();

        dd($sss);
        $sql="select count(article_id) as article_num ,tag_id from articles   WHERE articles.tag_id in(1,2) and articles.is_pull=2   group by tag_id";
        $s = DB::query($sql);



        //获取类型id的文章和分页
        $article_res=DB::table('articles')->where('category_id','=', $category_id)->select('title')->paginate(2);
        dd($article_res->toArray());
//        $head = [
//            'title'       => $category->name,
//            'keywords'    => $category->keywords,
//            'description' => $category->description,
//        ];
//        $assign = [
//            'category_id'  => $category->id,
//            'articles'     => $articles,
//            'tagName'      => '',
//            'title'        => $category->name,
//            'head'         => $head,
//        ];
        return view('home.category');
    }


}
