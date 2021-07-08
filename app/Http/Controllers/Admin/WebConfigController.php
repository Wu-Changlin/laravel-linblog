<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\WebConfig;
use Illuminate\Http\Request;


/**
 * Class WebController      网站配置  （网站标题、关键字、描述）
 * @package App\Http\Controllers\Admin
 */

class WebConfigController extends Controller
{
    /**
     *showWebConfig        显示网站配置
     * @return  array      showWebConfig_show_code     1：显示网站配置失败   2：显示网站配置成功
     */
    public function showWebconfig()
    {
        $data=WebConfig::paginate(10);
        $assion=compact('data');

        return view('admin.web_config.web_config_list',$assion);
        //dd('showWebConfig.显示网站配置');
    }

    //网站配置视图
    public function configView(){
        return view('admin.web_config.web_config_view');
    }

    /**
     *显示新增网站配置项页
     */
    public function showAddwebConfig(){
        return view('admin.web_config.web_config_add');
    }


    public function addWebconfig(Request $request){

    }

    /**
     * 显示更改网站配置项页
     * @param $web_onfig_id   网站配置项id
     *
     */
    public function showUpdatewebConfig($webConfig_id){

        return view('admin.web_config.web_config_update');
    }

    /**
     * 更改网站配置
     *
     */

    public function updateWebconfig(Request $request){

    }

    /**
     * deleteWebConfig        删除网站配置项
     * @param $webConfig_id   删除网站配置项id
     * @return
     */
    public  function deleteWebConfig($webConfig_id){
        dd('deleteWebConfig.删除网站配置项');
    }


}
