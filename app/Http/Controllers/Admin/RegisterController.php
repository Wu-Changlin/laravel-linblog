<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function registerUser()
    {
        dd('registerUser_add_code.注册用户');
    }



}
