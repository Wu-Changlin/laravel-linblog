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
        //文字替换数字值  前台减少判断
        foreach($data as $key){
            if($key->is_pull == 1){
                $str='是';
                $key->is_pull=$str;
            }elseif ($key->is_pull == 2){
                $str='否';
                $key->is_pull=$str;
            }else{
                $str='默认';
                $key->is_pull=$str;
            }
        }
        $assion=compact('data');
        return view('admin.tag.tag_list',$assion);

    }

    /**
     * 显示新增标签页
     *
     *
     */
    public function showAddtagWeb()
    {
       // dd('addTag.新增标签');
        return view('admin.tag.tag_add');
    }

    /**
     * 新增标签
     *
     *
     */
    public function addTag()
    {

        return view('admin.tag.tag_add');
    }


    /**
     * 显示更改标签页
     * @param $tag_id 更改标签id
     *
     */
    public function showUpdatetagWeb($tag_id)
    {
        dd('updateTag.后台更改标签');
        return view('admin.tag.tag_update');
    }

    /**
     * 更改标签
     * @param $tag_id 更改标签id
     * updateArticle_update_code  0：默认  1：更改标签失败  2：更改标签成功  3：保存中
     */
    public function updateTag()
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
