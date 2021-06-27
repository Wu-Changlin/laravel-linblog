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
        $data= TagModel::lists();
        ////数字转文字 页面减少判断
        foreach($data as $key){
            $key->is_pull=TagModel::mate_is_pull($key->is_pull);//下架数字替换成文字
        }
        $assing=compact('data');
        return view('admin.tag.tag_list',$assing);
    }

    /**
     * 显示新增标签页
     *
     *
     */
    public function showAddtagWeb()
    {
        $data=TagModel::categorys();
        $assing=compact('data');
       // dd('addTag.新增标签');
        return view('admin.tag.tag_add',$assing);
    }

    /**
     * 新增标签
     *
     *
     */
    public function addTag(Request $request)
    {

        if($request->isMethod('post')){
            $input = $request->except('s','_token');
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['category_id'] = intval($input['category_id']) ? intval($input['category_id']) : 0;
        }else{
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=TagModel::addTag($data);
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '标签已存在');
                break;
            case 2:
                return redirect()->route("tag.showTag")->with('msg', "新增标签成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增标签失败');
        }
    }


    /**
     * 显示更改标签页
     * @param $tag_id 更改标签id
     *
     */
    public function showUpdatetagWeb($tag_id)
    {
        if( ! isset($tag_id)){
          return redirect()->back()->with('err', '非法访问');
        }
        $category=TagModel::categorys();
        $data=TagModel::find($tag_id);
        $assing=compact('data','category');
        return view('admin.tag.tag_update',$assing);
    }

    /**
     * 更改标签
     * @param $tag_id 更改标签id
     * updateArticle_update_code  0：默认  1：更改标签失败  2：更改标签成功  3：保存中
     */
    public function updateTag(Request $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['tag_id'] = intval($input['id']) ?  intval($input['id']) : 0;
            $data['category_id'] = intval($input['category_id']) ?  intval($input['category_id']) : 0;
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=TagModel::updateTag($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("tag.showTag")->with('msg', "更改标签信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '标签已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改标签信息失败');
        }
    }

    /**
     * 删除标签
     * @param $tag_id 标签id
     *deleteArticle_delete_code  0：默认  1：删除标签失败  2：删除标签成功
     */
    public function deleteTag($tag_id)
    {
        if(empty($tag_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=TagModel::deleteTag($tag_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '标签不存在');
                break;
            case 2:
                return redirect()->route("tag.showTag")->with('msg', "删除标签成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除标签失败');
        }
    }

}
