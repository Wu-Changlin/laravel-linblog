<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin as AdminModel;
use Illuminate\Http\Request;

/**
 * Class AdminController     博客后台管理
 * @package App\Http\Controllers\Admin
 */

class AdminController extends Controller
{
    /**
     * 博客后台首页
     * showIndex_show_code   1：博客后台首页失败  2：博客后台首页成功
     */
    public function showIndex()
    {

       //dd('AdminController.showIndex.博客后台首页');
        return view('admin.admin.admin_index');

    }


    /**
     * 管理员列表  判断当前登录用户是否设置为管理员 $is_admin 0:默认（普通用户）2：管理员
     * @return  showAdminUser_show_code
     * post
     */
    public function showAdminUser()
    {
        $data=AdminModel::all();
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
//        dd($assign);
        //dd('showAdminUser.管理员列表');
        return view('admin.admin.admin_list',$assign);
    }

    /**
     * 显示新增管理员模板页面
     * @return  showAddadminWeb
     * post
     */
    public function showAddadminWeb()
    {

        //dd('showAddadminWeb.显示新增管理员模板页面');
        return view('admin.admin.admin_add');
    }

    /**
     * 显示更改管理员信息页面
     *
     *
     */
    public function showUpdateAdminWeb($id)
    {

        //dd('showUpdateAdminWeb.显示更改管理员信息页面');
        return view('admin.admin.admin_update');
    }


    /**
     * 新增管理员
     * @return  addAdminUser_add_code  0：默认  1：新增管理员 失败  2：新增管理员成功  3：保存中
     * post
     */
    public function addAdminUser()
    {
        dd('addAdminUser.新增管理员');
    }

    /**
     * 更改管理员信息
     * @param $admin_user_id 更改管理员信息
     * updateArticle_update_code  0：默认  1：更改管理员信息失败  2：更改管理员信息成功  3：保存中
     */
    public function updateAdminUser($admin_user_id)
    {
        dd('updateAdminUser.更改管理员信息');
    }

   
    /**
     * 删除管理员      清空管理员的所有数据  其下分类、文章 、标签、评论、网站配置
     * @param $admin_user_id 文章id
     *deleteAdmin_admin_code  0：默认  1：删除管理员失败  2：删除管理员成功
     */
    public function deleteAdminUser($admin_user_id)
    {
        dd('deleteAdmin.删除管理员');
    }



}
