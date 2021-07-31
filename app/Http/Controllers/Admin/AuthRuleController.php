<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthRule;
use Illuminate\Http\Request;

/**
 * Class AuthController     权限管理
 * @package App\Http\Controllers\Admin
 */

class AuthRuleController extends Controller
{
    /**
     * 权限管理列表
     */
    public function index()
    {
        $res=AuthRule::all(); //执行新增
        $data=AuthRule::getCateTree($res->toArray());
        $assign=compact('data');
        return view('admin.auth_rule.auth_rule_list',$assign);
    }
    

    /**
     * 显示新增权限模板页面
     * @return  showAddadminWeb
     * post
     */
    public function store()
    {

        $res=AuthRule::all(); //执行新增
        $data=AuthRule::getCateTree($res->toArray());
        $assign=compact('data');
        return view('admin.auth_rule.auth_rule_add',$assign);

    }

    /**
     * 新增权限
     * @return  addAdminUser_add_code  0：默认  1：新增权限 失败  2：新增权限成功
     * post
     */
    public function create(Request $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['pid'] = isset($input['pid']) ? intval($input['pid']) : 0;
            $data['title'] = isset($input['title']) ? $input['title'] : "";
            $data['name'] = isset($input['name']) ? $input['name'] : "";
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=AuthRule::addRule($data); //执行新增
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '权限已存在');
                break;
            case 2:
                return redirect()->route("rule.index")->with('msg', "新增权限成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增权限失败');
        }

    }

    /**
     * 显示更改权限信息模板页面
     *
     *@param $admin_id 更改权限信息
     */
    public function edit($rule_id)
    {
        if(empty($rule_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=AuthRule::all();
        $data=AuthRule::getCateTree($res->toArray());
        $rule_res = AuthRule::find($rule_id);
        $rule=$rule_res->toArray();
        $assign=compact('data','rule');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.auth_rule.auth_rule_update',$assign);

    }



    /**
     * 更改权限信息
     * @param $admin_id 更改权限信息
     * updateArticle_update_code  0：默认  1：更改权限信息失败  2：更改权限信息成功
     */
    public function update(Request $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['pid'] = isset($input['pid']) ? intval($input['pid']) : 0;
            $data['rule_id'] = isset($input['rule_id']) ? intval($input['rule_id']) : 0;
            $data['title'] = isset($input['title']) ? $input['title'] : "";
            $data['name'] = isset($input['name']) ? $input['name'] : "";
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=AuthRule::updateRule($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("rule.index")->with('msg', "更改权限成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '权限已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改权限失败');
        }

    }


    /**
     * 彻底删除权限
     * @param $admin_id 权限 id
     * $res  0：数据为空  1：已删除权限  2：删除权限成功
     */
    public function delete($rule_id)
    {
        if(empty($rule_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=AuthRule::deleteRule($rule_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '已删除权限');
                break;
            case 2:
                return redirect()->route("rule.index")->with('msg', "删除权限成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除权限失败');
        }

    }
    

}
