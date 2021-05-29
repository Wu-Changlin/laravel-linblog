<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class CommentController  评论管理
 * @package App\Http\Controllers\Admin
 */

class CommentController extends Controller
{
    /**
     * 显示所有评论   用户自有文章评论所有权+用户评论他人文章或回复他人评论的查看
     * return array （多维数组）
     */
    public function showComment()
    {
        dd('showComment.后台显示所有评论');

    }

    /**
     * 发表或回复评论
     *
     * @return  addComment_add_code  0：默认  1：发表或回复评论失败  2：成功发表或回复评论  3：保存中
     */
    public function addComment()
    {
        dd('addComment.后台发表或回复评论');
    }

    /**
     * 更改评论状态 如果$parent_id评论父项id被屏蔽，子项随父项也被屏蔽
     * @param $comment_id 评论id
     * updateComment_update_code 0：默认  1：更改失败  2：更改成功   3：保存中
     */
    public function updateComment($comment_id)
    {
        dd('updateComment.后台更改评论状态');
    }

    /**
     * 删除评论    如果$parent_id评论父项id被删除，子项随父项也被删除
     * @param $comment_id 评论id
     *deleteComment_delete_code 0：默认  1：删除失败 2：删除成功
     */
    public function deleteComment($comment_id)
    {
        dd('deleteComment.后台删除评论');
    }








}
