<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('admin.login.login');

    }



    /**
     *博客后台登录操作   (用户或管理员登录) is_admin  0:默认（普通用户）2：管理员
     * 测试用get
     * post  $user_name 用户名称(用户邮箱)  $password 用户密码  $verification _code 登录验证码 动态生成
     */


    public function logIn(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();
            $login_token = isset($input['_token']) ? $input['_token'] : "";
            $login_name = isset($input['name']) ? $input['name'] : "";
            $login_password = isset($input['password']) ? $input['password'] : "";
            if (empty($login_name) || empty($login_password)) {
                return back()->with('msg', '名称和密码都不能为空');
            }
        }else{
            return back()->with('msg', '非法请求');
        }
        //通过输入的用户名去查询数据库是否有此该用户信息
        $users = User::where('name', $login_name)->get();
        if ($users) {
            return back()->with('msg', '用户不存在');

        }
        echo 1111;
//        $article = new User();
//        $r=$article->add();
//        $a=$article-> up();




        $hashStr = Hash::make($login_password);

        //使用check()方法，进行验证，对比当前密码和数据库的密码是否相同。
//        $hashStr = Hash::make($str);
//        $booleanValue = Hash::check($login__password,$hashStr);

        //使用门面Hash中make()方法来将密码进行加密。
        //$hashStr = Hash::make($str);
//        $hashStr ='$2y$10$/yjf7n71LdnrzHXus1YiWORgtkEuRcxRCyoHwRumdapjxIcCkJz1W';
//
//        //使用check()方法，进行验证，对比当前密码和数据库加密之后的密码是否相同。
//        $booleanValue = Hash::check($str,$hashStr);
//        echo $hashStr;
//        dd($booleanValue);

////            $t=bcrypt($login__password);
//        $m=Hash::make($login__password);
//
////            $m=Hash::mack($login__password);
////            echo '$t'.$t."/n";
//            echo '$m'.$m;

        return view('admin.admin.admin_index');
    }

    /**
     * 退出后台管理并返回博客首页，清除用户缓存   (用户或管理员退出)
     * * post  logOut
     */
    public function logOut($user_id){
        dd('logIn.博客(用户或管理员登录)退出后台操作');
    }


}
