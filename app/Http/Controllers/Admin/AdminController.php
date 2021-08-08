<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
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
     */
    public function showIndex()
    {
        return view('admin.admin.admin_index');
    }



    /**
     * 管理员列表
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function index()
    {
        $data=AdminModel::paginate(10);
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.admin.admin_list',$assign);
    }


    /**
     * 显示新增管理员模板页面
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function store()
    {

        return view('admin.admin.admin_add');

    }


    /**
     * 新增管理员
     * @param AdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(AdminRequest $request)
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
                return redirect()->route("adminUser.index")->with('msg', "新增管理员成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增管理员失败');
        }

    }

    /**
     * 显示更改管理员信息模板页面
     *
     *@param $admin_id 更改管理员信息
     */
    public function edit($admin_id)
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
     * 更改管理员信息
     * @param AdminRequest $request 需要修改管理员信息
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request)
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
                return redirect()->route("adminUser.index")->with('msg', "更改管理员信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '邮箱已注册');
                break;
            case 4:
                AdminModel::adminlogOut();//执行退出
                return redirect()->route("login.index")->with('msg','重置密码，注销登录');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改管理员信息失败');
        }

    }



    /**
     * 彻底删除管理员      清空管理员的所有数据  其下分类、文章 、标签、评论、网站配置
     * @param $admin_id 管理员 id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception  0：数据为空  1：已删除管理员  2：删除管理员成功
     */
    public function delete($admin_id)
    {
        if(empty($admin_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $admin_user=session('admin_user');
        if($admin_user['admin_id'] == $admin_id){ //判断删除管理员id是不是当前登录的管理员id
            return redirect()->back()->withInput()->with('err', '请勿自残');
        }
        $res=AdminModel::deleteAdmin($admin_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '已删除管理员');
                break;
            case 2:
                return redirect()->route("adminUser.index")->with('msg', "删除管理员成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除管理员失败');
        }

    }

    /**
     * 管理员退出
     * @return 返回登录页
     */
    public function logOut(){
        AdminModel::adminlogOut();////执行退出
        return redirect()->route("login.index")->with('msg','注销登录');
    }


}
