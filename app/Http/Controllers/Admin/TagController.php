<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Tag as TagModel ;


class TagController extends Controller
{
    /**
     * 显示标签
     * showTag_show_code 1：显示标签失败  2：显示标签成功
     */
    public function showTag()
    {
        $data= TagModel::all();
        $assion=compact('data');
        dd($assion);
        dd('showTag.后台显示标签');
    }

    /**
     * 新增标签
     * @return  addTag_add_code  0：默认  1：新增标签失败  2：新增标签成功  3：保存中
     *
     */
    public function addTag()
    {
        dd('addTag.后台新增标签');
    }

    /**
     * 更改标签
     * @param $tag_id 更改标签id
     * updateArticle_update_code  0：默认  1：更改标签失败  2：更改标签成功  3：保存中
     */
    public function updateTag($tag_id)
    {
        dd('updateTag.后台更改标签');
    }

    /**
     * 删除标签
     * @param $tag_id 标签id
     *deleteArticle_delete_code  0：默认  1：删除标签失败  2：删除标签成功
     */
    public function deleteTag($tag_id)
    {
        dd('deleteTag.后台删除标签');
    }



}
