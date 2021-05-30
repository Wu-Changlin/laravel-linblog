<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

/**
 * Class AdminController     用户注册
 * @package App\Http\Controllers\Admin
 */

class RegisterController extends Controller
{
    /**
     * 显示注册页
     * showRegisterUserIndex
     */
    public function showRegisterUserIndex()
    {
        //dd('showRegisterUserIndex.showRegisterUserIndex.显示注册页');
        return view('admin.register.register');
    }


    /**
     * 注册用户
     * @param
     *registerUser_add_code
     */
    public function registerUser(Request $request)
    {

        //接收页面传输数据
        $input = $request->all();
        $login__token=isset($input['_token'])?$input['_token']:"";
        $login__email=isset($input['email'])?$input['email']:"";
        $login__pass=isset($input['pass'])?$input['pass']:"";
        $login__cpass=isset($input['cpass'])?$input['cpass']:"";
//       if(!($login__pass===$login__cpass)){
//            //dd($login__pass===$login__cpass);
//            return back()->withErrors('success','账户/密码错误');
//           // $this->success('输入密码不一致','');
//            //return back()->withErrors('账户/密码错误');
//            //return view("输入密码不一致");
//        }
//
//        //检测输入数据
//        if(empty($login__email) ||  empty($login__pass)  || empty($login__cpass) ){
//
//            //return "请输入邮箱地址或密码";
//        }
//        //dump($input);



    }



}
