<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AuthController     角色管理
 * @package App\Http\Controllers\Admin
 */

class AuthGroupController extends Controller
{
    /**
     * 角色管理列表
     */
    public function showIndex()
    {
        return view('admin.admin.admin_index');
    }


    /**
     * 角色列表  判断当前登录用户是否设置为角色 $is_admin 0:默认（普通用户）2：角色
     * @return  showAdminUser_show_code
     * post
     */
    public function showAdminUser()
    {
        $data=AdminModel::paginate(10);
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.admin.admin_list',$assign);
    }

    /**
     * 显示新增角色模板页面
     * @return  showAddadminWeb
     * post
     */
    public function showAddadminWeb()
    {

        return view('admin.admin.admin_add');

    }

    /**
     * 新增角色
     * @return  addAdminUser_add_code  0：默认  1：新增角色 失败  2：新增角色成功
     * post
     */
    public function addAdminUser(AdminRequest $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['email'] = isset($input['email']) ? $input['email'] : "";
            $data['password'] = isset($input['password']) ? $input['password'] : "";
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=AdminModel::addAdmin($data); //执行新增
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '邮箱已注册');
                break;
            case 2:
                return redirect()->route("admin.showAdminUser")->with('msg', "新增角色成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增角色失败');
        }

    }

    /**
     * 显示更改角色信息模板页面
     *
     *@param $admin_id 更改角色信息
     */
    public function showUpdateAdminWeb($admin_id)
    {
        if(empty($admin_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $data = AdminModel::find($admin_id);
        $data->toArray();
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.admin.admin_update',$assign);

    }



    /**
     * 更改角色信息
     * @param $admin_id 更改角色信息
     * updateArticle_update_code  0：默认  1：更改角色信息失败  2：更改角色信息成功
     */
    public function updateAdminUser(AdminRequest $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['email'] = isset($input['email']) ? $input['email'] : "";
            $data['password'] = isset($input['password']) ? $input['password'] : "";
            $data['admin_id'] = isset($input['id']) ? $input['id'] : 0;
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=AdminModel::updateAdmin($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("admin.showAdminUser")->with('msg', "更改角色信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '邮箱已注册');
                break;
            case 4:
                return redirect()->route("login.index")->with('msg','重置密码，注销登录');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改角色信息失败');
        }

    }


    /**
     * 彻底删除角色      清空角色的所有数据  其下分类、文章 、标签、评论、网站配置
     * @param $admin_id 角色 id
     * $res  0：数据为空  1：已删除角色  2：删除角色成功
     */
    public function deleteAdminUser($admin_id)
    {
        if(empty($admin_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $admin_user=session('admin_user');
        if($admin_user['admin_id'] == $admin_id){ //判断删除角色id是不是当前登录的角色id
            return redirect()->back()->withInput()->with('err', '请勿自残');
        }
        $res=AdminModel::deleteAdmin($admin_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '已删除角色');
                break;
            case 2:
                return redirect()->route("admin.showAdminUser")->with('msg', "删除角色成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除角色失败');
        }

    }
    

}
