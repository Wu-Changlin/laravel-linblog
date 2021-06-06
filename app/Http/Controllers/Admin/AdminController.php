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
     * 新增管理员
     * @return  addAdminUser_add_code  0：默认  1：新增管理员 失败  2：新增管理员成功
     * post
     */
    public function addAdminUser(Request $request)
    {

        dd($request);
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['email'] = isset($input['email']) ? $input['email'] : "";
            $data['password'] = isset($input['password']) ? $input['password'] : "";
            if (empty($data['name'])  ||  empty($data['email'] ) || empty($data['password'])) {
                return redirect()-> back()->withInput()->with('msg', '请填写完整昵称、邮箱和密码');
            }
        }else{
            return redirect()-> back()->withInput()->with('msg', '非法请求');;
        }
        //新管理员邮箱是否已注册
        $count = AdminModel::where('email', $data['email'])->count();
        if($count>0){
            return redirect()-> back()->withInput()->with('msg', '管理员邮箱已注册,新增管理员失败;请更改邮箱');
            //return back()->with('msg', '管理员邮箱已注册,新增管理员失败;请更改邮箱');
        }
        //添加管理员信息到数据库
        $adminModel=new AdminModel();
        $adminModel->name=$data['name'];
        $adminModel->email=$data['email'];
        $adminModel->password=$data['password'];
        $adminModel ->save();
        //获取新管理员id
        $id = $adminModel->admin_id;
        if($id>0){ // $id 大于0 说明新增管理员成功
            return redirect()->route("admin.showAdminUser")->with('msg', "新增管理员id:".$id);
        }else{
            return redirect()-> back()->withInput()->with('msg', '数据写入失败,新增管理员失败');
        }

    }

    /**
     * 显示更改管理员信息模板页面
     *
     *
     */
    public function showUpdateAdminWeb($id)
    {

        //dd('showUpdateAdminWeb.显示更改管理员信息页面');

        return view('admin.admin.admin_update');



    }



    /**
     * 更改管理员信息
     * @param $id 更改管理员信息
     * updateArticle_update_code  0：默认  1：更改管理员信息失败  2：更改管理员信息成功
     */
    public function updateAdminUser(Request $request,$id)
    {
        //dd('updateAdminUser.更改管理员信息');
        return back()->with('msg', '更改管理员信息成功');
    }

//    /**
//     * 彻底删除管理员       清空管理员的所有数据  其下分类、文章 、标签、评论、网站配置
//     * @param $id 管理员 id
//     *deleteAdmin_admin_code  0：默认  1：删除管理员失败  2：删除管理员成功
//     */
//    public function deleteAdminUser($id)
//    {
//        dd('deleteAdmin.删除管理员');
//    }


    /**
     * 彻底删除管理员      清空管理员的所有数据  其下分类、文章 、标签、评论、网站配置
     * @param $admin_user_id 管理员 id
     *deleteAdmin_admin_code  0：默认  1：删除管理员失败  2：删除管理员成功
     */
    public function deleteAdminUser($admin_id)
    {
        //查询数据库中是否存在该管理员  0：没有  1：存在
        $admin_count = AdminModel::where('admin_id','=',$admin_id)->count();
        if($admin_count>0){ //查询结果   $admin_count=1：存在
            $res=AdminModel::where('admin_id','=',$admin_id)->delete(); //执行删除并返回结果 0：删除失败  1：删除成功
            if($res>0){
                return back()->with('msg', '删除管理员成功');
            }else{
                return back()->with('msg', '数据库错误，删除管理员失败');
            }
        }else{//查询结果   $admin_count=0：不存在
            return back()->with('msg', '该管理员已删除');
        }

    }



}
