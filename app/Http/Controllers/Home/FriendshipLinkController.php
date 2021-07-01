<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\Models\AdminsLogs;
use App\Models\FriendshipLink;
use Illuminate\Http\Request;

/**
 * Class FriendshipLinkController   前台友好博客
 * @package App\Http\Controllers\Home
 */

class FriendshipLinkController extends Controller
{

    /**
     * showFirend      前台友好博客
     * return  array
     */
    public function showFirend()
    {

        $friends=FriendshipLink::where([['is_pull','=',2],['is_verify','=',2]])->get();
        $assign = [
            'friends'         => $friends,

//            'head'         => $head,
            'category_val'  =>'friend',
            'category_id'  =>0,
            'tag_id'=>0
        ];

        return view('home.friend_ship_link',$assign);

    }

    /**
     * 前台添加友链
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addFriend(Request $request){
        if($request->isMethod('post')){
            $input = $request->except('s','_token');
            $data['name'] = isset($input['blogname']) ? $input['blogname'] : "";
            $data['url'] = isset($input['blogaddress']) ? $input['blogaddress'] : "";
            $data['cover'] = isset($input['pictureaddress']) ? $input['pictureaddress'] : "";
            $data['is_pull'] =  1;
            $data['is_verify'] =  1;
            //检查是否限量值（每日10条）
            $add_count_num=AdminsLogs::isIndexaddMax(8);
            if($add_count_num==2){
                return redirect()->back()->withInput()->with('err', '添加失败,已达到限量');
            }
            $res=FriendshipLink::addFriend($data,6);
            if($res==2){
                return redirect()->back()->with('msg','添加成功');
            }else{
                return redirect()->back()->with('err','添加失败');
            }
        }else{
            return redirect()->back()->with('err','非法访问');
        }

    }


}
