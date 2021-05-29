<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class WebController      网站配置  （网站标题、关键字、描述）
 * @package App\Http\Controllers\Admin
 */

class WebController extends Controller
{
    /**
     *showWebConfig        显示网站配置
     * @return  array      showWebConfig_show_code     1：显示网站配置失败   2：显示网站配置成功
     */
    public function showWebConfig()
    {
        dd('showWebConfig.显示网站配置');
    }

    /**
     *
     *addWebConfig          新增网站配置项
     * @return   addWebConfig_add_code   0：默认   1：新增网站配置项   2：新增网站配置项  3：保存
     */
    public function addWebConfig(){
        dd('addWebConfig.新增网站配置');
    }


    /**
     *updateWebConfig         更改网站配置项
     * @param $web_onfig_id   网站配置项id
     * @rerurn   updateWebConfig_update_code   0：默认   1：更改网站配置项失败   2：更改网站配置项成功 3：保存
     */
    public function updateWebConfig($webConfig_id){
        dd('updateWebConfig.更改网站配置项');
    }

    /**
     * deleteWebConfig        删除网站配置项
     * @param $webConfig_id   删除网站配置项id
     * @return deleteWebConfig_delete_code  0：默认   1：删除网站配置项失败   2：删除网站配置项成功
     */
    public  function deleteWebConfig($webConfig_id){
        dd('deleteWebConfig.删除网站配置项');
    }


}
