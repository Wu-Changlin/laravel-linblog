<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin as AdminModels ;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;




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
     *博客后台登录操作   (用户或管理员登录)
     * post  $user_name 用户名称(用户邮箱)  $password 用户密码  $verification _code 登录验证码 动态生成
     */
    public function logIn(loginRequest $request)
    {
        if ($request->isMethod('post')) {//判断请求方式是post
            $input = $request->except('s','_token'); //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $login['email'] = isset($input['email']) ? $input['email'] : "";
            $login['password'] = isset($input['password']) ? $input['password'] : "";
        }else{
            return redirect()-> back()->withInput()->with('msg', '非法请求');
        };
        $res=AdminModels::adminLogin($login); //执行登录
        switch ($res) { //判断登录返回值
            case 0:
                return redirect()-> back()->withInput()->with('msg', '用户不存在');
                break;
            case 1:
                return redirect()-> back()->withInput()->with('msg', '密码错误');
                break;
            case 2:
                return redirect()->route('admin.index')->with('msg', '登录成功');
                break;
            default:
                return redirect()->route('admin.index')->with('msg', '网络错误');
        }

    }


    /**
     * 退出后台管理并返回博客首页，清除用户缓存   (用户或管理员退出)
     * * post  logOut
     */
    public function logOut($user_id){
        dd('logIn.博客(用户或管理员登录)退出后台操作');
    }


}
