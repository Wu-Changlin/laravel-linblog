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

    //网站配置视图
    public function configView(){
        return view('admin.web_config.web_config_view');
    }

    /**
     *showWebConfig        显示网站配置列表
     */
    public function showWebconfig()
    {
        $data=WebConfig::paginate(10);
        $assion=compact('data');
        return view('admin.web_config.web_config_list',$assion);
        //dd('showWebConfig.显示网站配置');
    }


    /**
     *显示新增网站配置项页
     */
    public function showAddwebConfig(){
        return view('admin.web_config.web_config_add');
    }


    public function addWebconfig(Request $request)
    {

        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['name']   =   isset($input['cnname']) ? $input['cnname'] : "";
            $data['enname'] =   isset($input['enname']) ? $input['enname'] : "";
            $data['type']   =   isset($input['type']) ? $input['type'] : "";
            $data['values'] =   isset($input['values']) ? $input['values'] : "";
            if($data['values']){
                $data['values']=str_replace('，',',',$data['values']);
            }

        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }

        $res=WebConfig::addConfig($data); //执行新增
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '配置已存在');
                break;
            case 2:
                return redirect()->route("webconfig.index")->with('msg', "新增配置成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增配置失败');
        }


    }

    /**
     * 显示更改网站配置项页
     * @param $web_onfig_id   网站配置项id
     *
     */
    public function showUpdatewebConfig($webConfig_id){
        if(empty($webConfig_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $data = WebConfig::find($webConfig_id);
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.web_config.web_config_update',$assign);
    }

    /**
     * 更改网站配置
     *
     */
    public function updateWebconfig(Request $request){
//判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['name']   =   isset($input['cnname']) ? $input['cnname'] : "";
            $data['enname'] =   isset($input['enname']) ? $input['enname'] : "";
            $data['type']   =   isset($input['type']) ? $input['type'] : "";
            $data['values'] =   isset($input['values']) ? $input['values'] : "";
            $data['config_id'] = intval($input['id']) ? intval($input['id']) : 0;

            if($data['values']){
                $data['values']=str_replace('，',',',$data['values']);
            }

        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }

        $res=WebConfig::updateConfig($data); //执行修改
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("webconfig.index")->with('msg', "更改配置信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '配置已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改配置信息失败');
        }
    }

    /**
     * deleteWebConfig        删除网站配置项
     * @param $webConfig_id   删除网站配置项id
     * @return
     */
    public  function deleteWebConfig($webConfig_id){
        if(empty($webConfig_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=WebConfig::deleteConfig($webConfig_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '配置不存在');
                break;
            case 2:
                return redirect()->route("webconfig.index")->with('msg', "删除配置成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除配置失败');
        }
    }


}
