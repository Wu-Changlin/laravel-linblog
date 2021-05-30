<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.login.login');

    }



    /**
     *博客后台登录操作   (用户或管理员登录) is_admin  0:默认（普通用户）2：管理员
     * 测试用get
     * post  $user_name 用户名称(用户邮箱)  $password 用户密码  $verification _code 登录验证码 动态生成
     */


    public function logIn(Request $request)
    {
        //接收页面传输数据
        $input = $request->all();
        $login__token=isset($input['_token'])?$input['_token']:"";
        $login__email=isset($input['email'])?$input['email']:"";
        $login__pass=isset($input['pass'])?$input['pass']:"";
        //检测输入数据
        $data=[];
        if(empty($login__email) ||  empty($login__pass)){
            return response()->view('admin.login.login',$data, "请输入邮箱地址或密码");
//            sendMSG("请输入邮箱地址或密码!","104014");
        }

        dd(".博客(用户或管理员登录)后台登录操作");
        //判断页面数据是否合法
//        if ($request->isMethod('post')) {
//
//        return response()->view('admin.admin.admin_index',$data, 200);
//        var_dump($input);
//        dd(".博客(用户或管理员登录)后台登录操作");
//        }else{
//            return view('admin.login.login');
//        }

    }

    /**
     * 退出后台管理并返回博客首页，清除用户缓存   (用户或管理员退出)
     * * post  logOut
     */
    public function logOut($user_id){
        dd('logIn.博客(用户或管理员登录)退出后台操作');
    }


}
