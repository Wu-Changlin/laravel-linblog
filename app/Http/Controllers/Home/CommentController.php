<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CommentController     博客前台评论文章+回复评论
 * @package App\Http\Controllers\Home
 */

class CommentController extends Controller
{
    /**
     * showArticle      评论文章+回复评论
     * @param $article_id 文章id  $user_id用户id, comment_id 评论id ,$comment_content评论内容  $parent_id评论父项id  0：默认  1：不可见 2：父项
     *a a评论      $article_id=200      结果 $comment_id=99        $parent_id=2 ；
     * b回复 a评论 $article_id=200      结果 $comment_id= 100      $parent_id=99 ；
     * b回复 a评论 $article_id=200      结果 $comment_id= 101      $parent_id=100 ；
     * return  array
     * 成功回复评论，为节约资源使用Ajax局部更新文章评论
     *
     * $article_id,$user_id,$comment_id,$comment_content,$parent_id
     */
    public function showComment()
    {

        dd(' 博客前台评论文章+回复评论');
        //return view('home.article');
        //return view('home.article');
    }
}
