<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class UsersController    个人信息管理
 * @package App\Http\Controllers\Admin
 */

class UsersController extends Controller
{
    /**
     * updeteUserPassword     显示个人信息
     * @param $user_id        用户id
     * @return  array         showUserInfo_show_code    1：显示个人信息失败   2：显示个人信息成功
     */
    public function showUserInfo()
    {
        dd('showUserInfo.显示个人信息');
    }

    /**
     * updeteUserPassword     更新头像
     * @param $user_id        用户id
     * @return updeteUserPhoto_updete_code  0：默认   1：更新头像失败   2：更新头像成功
     */
    public function updateUserPhoto($user_id)
    {
        dd('updeteUserPhoto.更新头像');
    }

    /**
     * updeteUserPassword     更改登录密码
     * @param $user_id        用户id
     * @return updeteUserPassword_updete_code  0：默认   1：失败   2：成功
     */
    public function updateUserPassword($user_id)
    {
        dd('updeteUserPassword.更改登录密码');
    }

}
