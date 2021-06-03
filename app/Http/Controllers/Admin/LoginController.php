<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin as AdminModels ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




/**
 * Class LoginController  博客后台登录和退出   保证用户信息安全用psot请求
 * @package App\Http\Controllers\Admin
 */

class LoginController extends Controller
{
    /**
     *显示博客后台登录页面
     */
    public function index(){
       // $this->sendMSG('你好',200);
        return view('admin.login.login');

    }



    /**
     *博客后台登录操作   (用户或管理员登录) is_admin  0:默认（普通用户）2：管理员
     * 测试用get
     * post  $user_name 用户名称(用户邮箱)  $password 用户密码  $verification _code 登录验证码 动态生成
     */


    public function logIn(Request $request)
    {
        //判断
        if ($request->isMethod('post')) {
            $input = $request->all();
            $login_token = isset($input['_token']) ? $input['_token'] : "";
            $login_email = isset($input['email']) ? $input['email'] : "";
            $login_password = isset($input['password']) ? $input['password'] : "";
            if (empty($login_email) || empty($login_password)) {
                return back()->with('msg', '请填写完整邮箱和密码');
            }
        }else{
            return back()->with('msg', '非法请求');
        };
        //通过输入的用户名去查询数据库是否有此该用户信息
        $admin_users = AdminModels::where('email',$login_email)->get();

        if (!count($admin_users)) {
            return back()->with('msg', '用户不存在');
        }
        //用户输入密码对比数据库用户密码  $login_password：字符串 ，$users[0]->password：数据库Hash密码字符串 60
        if (! Hash::check($login_password,$admin_users[0]->password)) {
            return back()->with('msg', '密码错误');
        }
        return redirect()->route('admin.index')->with('msg', '登录成功');
        //return view('admin.index');

    }

    /**
     * 退出后台管理并返回博客首页，清除用户缓存   (用户或管理员退出)
     * * post  logOut
     */
    public function logOut($user_id){
        dd('logIn.博客(用户或管理员登录)退出后台操作');
    }


}
