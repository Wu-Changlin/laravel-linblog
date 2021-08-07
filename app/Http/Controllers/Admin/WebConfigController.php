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
     * 显示网站配置启动项
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function configView(){
        $data=WebConfig::all();
        $assign=compact('data');
        return view('admin.web_config.web_config_view',$assign);
    }

    /**
     * 修改网站配置启动项
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConfigview(Request $request){
        //判断是否post请求
        if ($request->isMethod('post')) {
            $data = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
//dd($data);
        $res=WebConfig::updateConfigview($data); //执行新增
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '配置不存在');
                break;
            case 2:
                return redirect()->route("webconfig.configView")->with('msg', "修改配置值成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,修改配置值失败');
        }

    }

    /**
     * 显示网站配置列表
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View|\think\response\View
     */
    public function index()
    {
        $data=WebConfig::paginate(10);
        foreach ($data as $key){
                $key->type=self::mate_config_type( $key->type);//配置类型数字替换成文字
        }
        $assign=compact('data');
        return view('admin.web_config.web_config_list',$assign);
        //dd('showWebConfig.显示网站配置');
    }


    /**
     *显示新增网站配置项页
     */
    public function store(){
        return view('admin.web_config.web_config_add');
    }


    public function create(Request $request)
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
    public function edit($webConfig_id){
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
    public function update(Request $request){
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
    public  function delete($webConfig_id){
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


    public static function mate_config_type ($num){
        $config_type=[0=>'默认', 1=>'单行文本框',2=>'文本域',3=>'单选按钮',4=>'复选按钮5',5=>'下拉菜单'];
        return $config_type[$num];

    }

}
