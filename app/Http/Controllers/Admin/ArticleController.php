<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * 显示所有文章
     * showArticle_show_code 1：显示所有文章失败  2：显示所有文章成功
     */
    public function showArticle()
    {

        dd('showArticle.后台显示所有文章管理');
    }

    /**
     * 发布文章
     * @return  addArticle_add_code  0：默认  1：发布失败  2：发布成功  3：保存中
     * post
     */
    public function addArticle()
    {
        dd('addArticle.后台发布文章');
    }

    /**
     * 更改文章
     * @param $article_id 更改文章
     * updateArticle_update_code  0：默认  1：更改失败  2：更改成功  3：保存中
     */
    public function updateArticle($article_id)
    {
        dd('updateArticle.后台更改文章');
    }

    /**
     * 删除文章     文章下的评论一并删除
     * @param $article_id 文章id
     *deleteArticle_delete_code  0：默认  1：删除失败  2：删除成功
     */
    public function deleteArticle($article_id)
    {
        dd('deleteArticle.后台更改文章');
    }

    /**
     * 排序文章
     *sortArticle__sort_code 1：排序文章失败  2：排序文章成功
     *
     */
    public function sortArticle()
    {
        dd('uploadArticleImage.后台排序文章');
    }

    /**
     * 上传文章图片
     *uploadArticleImage__upload_code 1：上传失败  2：上传成功
     *
     */
    public function uploadArticleImage()
    {
        dd('uploadArticleImage.后台上传文章图片');
    }



}
