<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FriendshipLink as FriendshipLinkModel ;

class FriendshipLinkController extends Controller
{

    /**
     * 显示所有友好博客
     * @return array
     */
    public function index()
    {
        $data= FriendshipLinkModel::paginate(10);
        //数字转文字 页面减少判断
        foreach($data as $key){
            $key->is_verify=FriendshipLinkModel::mate_is_pull( $key->is_verify); //下架数字替换成文字
            $key->is_pull=FriendshipLinkModel::mate_is_verify($key->is_pull);//验证数字替换成文字
        }
        $assign=compact('data');
        return view('admin.friend_ship_link.friend_ship_link_list',$assign);
    }


    /**
     * 显示新增友好博客页
     */
    public function showAddfriendWeb()
    {
        return view('admin.friend_ship_link.friend_ship_link_add');
    }
    
    /**
     * 新增友好博客
     * @return
     *
     */
    public function addFriend(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->except('s','_token');
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['url'] = isset($input['url']) ? $input['url'] : "";
            $data['cover'] = isset($input['cover']) ? $input['cover'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['is_verify'] = intval($input['is_verify']) ? intval($input['is_verify']) : 0;
        }else{
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=FriendshipLinkModel::addFriend($data,2);
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '友好博客已存在');
                break;
            case 2:
                return redirect()->route("friendshipLink.index")->with('msg', "新增友好博客成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增友好博客失败');
        }

    }

    /**
     * 显示更改友好博客页     下架友好博客 该友好博客下的所有文章也会下架
     *@param $link_id 友好博客id
     */
    public function showUpdatefriendWeb($link_id)
    {

        if(empty($link_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $data = FriendshipLinkModel::find($link_id);
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.friend_ship_link.friend_ship_link_update',$assign);
    }

    

    /**
     * 更改友好博客
     * @param $tag_id 更改友好博客id
     * updateArticle_update_code  0：默认  1：更改友好博客失败  2：更改友好博客成功  3：保存中
     */
    public function updateFriend(Request $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段

            $data['link_id'] = intval($input['id']) ? intval($input['id']) : 0;
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['url'] = isset($input['url']) ? $input['url'] : "";
            $data['cover'] = isset($input['cover']) ? $input['cover'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['is_verify'] = intval($input['is_verify']) ? intval($input['is_verify']) : 0;
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=FriendshipLinkModel::updateFriend($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', "保留");
                break;
            case 2:
                return redirect()->route("friendshipLink.index")->with('msg', "更改友好博客信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '友好博客已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改友好博客信息失败');
        }
    }


    /**
     * 删除友好博客    该友好博客下的所有文章也会删除
     * @param $link_id 友好博客id
     *deleteFriend_delete_code  0：默认 1：删除失败   2：成功删除
     */
    public function deleteFriend($link_id)
    {
        if(empty($link_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=FriendshipLinkModel::deleteFriend($link_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '友好博客不存在');
                break;
            case 2:
                return redirect()->route("friendshipLink.index")->with('msg', "删除友好博客成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除友好博客失败');
        }


    }

}
