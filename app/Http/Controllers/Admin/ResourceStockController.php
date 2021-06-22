<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ResourceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ResourceStockController extends Controller
{
    /**
     * 显示所有分类
     * @return array
     */
    public function index()
    {

        $data= ResourceStock::all();
        $pid_res=ResourceStock::pid_resources();//
        $pid_data=$this->mate_pid($pid_res);
        //文字替换数字值  前台减少判断
        foreach($data as $key){
            $key->type=$this->mate_type($key->type,0);//资源类型数字替换成文字
            if( $key->pid>0){
                $key->pid=$pid_data[$key->pid];//父级id替换成顶级资源分类名称
            }

            if($key->is_verify == 0){//是否通过验证
                $str='默认';
                $key->is_verify=$str;
            }elseif ($key->is_verify == 1){
                $str='未通过';
                $key->is_verify=$str;
            }elseif ($key->is_verify ==2 ){
                $str='已通过';
                $key->is_verify=$str;
            }

            if($key->is_pull == 1){//是否下架
                $str='是';
                $key->is_pull=$str;
            }elseif ($key->is_pull == 2){
                $str='否';
                $key->is_pull=$str;
            }else{
                $str='默认';
                $key->is_pull=$str;
            }
        }
        $assign=compact('data');

//        dd('index.后台显示所有分类');
        return view('admin.resource_stock.resource_stock_list',$assign);

    }


    /**
     * @param $num    资源类型 数字
     * @param $code   0；1
     * @return string|string[]  $code=0 资源类型数字对应词； $code大于0  词组
     */
    public  function  mate_type($num,$code){
        $data=[0=>'默认(顶级资源)', 1=>'前台用户添加资源（未分配）',2=>'文章类',3=>'书籍类',4=>'刷题类',5=>'图片类',6=>'文件格式转换类',7=>'在线编辑类',8=>'模板类',9=>'在线作图类',10=>'文件传输类',11=>'影视类',12=>'音乐类',13=>'直播类',14=>'设计类',15=>'图标类',16=>'字体类',18=>'编辑器类',19=>'引擎类',20=>'网盘类',21=>'学术资源类',22=>'工具类',23=>'在线图片处理类',24=>'在线文件转换类',25=>'导航类',26=>'视频类',27=>'其他'];
        if($code>0){
            return $data;
        }
        return $data[$num];
    }

    /**
     * 父级id替换成顶级资源分类名称
     * @param $pid_array   顶级资源分类
     * @return array       $res[resource_stock_id=>'name']
     */
    public  function  mate_pid($pid_array){
        $res=[];
        foreach ($pid_array as $k=>$v){
            $res[$v->resource_stock_id]=$v->name;
        }
        return $res;
    }

    /**
     * 显示新增资源分类页
     *
     *
     */
    public function showAddresourceWeb()
    {
        $pid_res=ResourceStock::pid_resources();
        $data=$this->mate_type(0,1);
        $data=array_except($data, array(1));//从数组移除给定的键=1的值对
        uasort($data, function ($a, $b) { //排序按值的长度降序
            return strLen($a) < strLen($b);
        });
//        $assign = [
//            'pid_res' => $pid_res,
//            'data'=>$data
//
//        ];
        $assign=compact( 'pid_res','data');
        return view('admin.resource_stock.resource_stock_add',$assign);
    }


    /**
     * 新增资源分类
     * @return
     *
     */
    public function addResources(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->except('s','_token');
            $data['pid'] = intval($input['pid']) ?  intval($input['pid']) : 0;
            $data['type'] = intval($input['type']) ? intval($input['type']) : 0;
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['url'] = isset($input['url']) ? $input['url'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['cover'] = isset($input['cover']) ? $input['cover'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['is_verify'] = intval($input['is_verify']) ? intval($input['is_verify']) : 0;
            if ($request->hasFile('cover')) {
                $data['cover']=$this->uploadCover($data['cover']);
            }


        }else{
            return redirect()->back()->withInput()->with('msg', '非法访问');
        }
        $res=ResourceStock::addResource($data);
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('msg', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', '资源分类已存在');
                break;
            case 2:
                return redirect()->route("resource.index")->with('msg', "新增资源分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('msg', '数据写入失败,新增资源分类失败');
        }

    }

    /**
     * 显示更改资源分类页
     *@param $resource_stock_id 资源id
     */
    public function showUpdateresourceWeb($resource_stock_id)
    {
        if(empty($resource_stock_id)){
            return redirect()->back()->withInput()->with('msg', '非法访问');
        }
        $pid_res=ResourceStock::pid_resources();
        $data=$this->mate_type(0,1);
        uasort($data, function ($a, $b) { //排序按值的长度降序
            return strLen($a) < strLen($b);
        });
        $resource = ResourceStock::find($resource_stock_id);
        $assign=compact( 'pid_res','data','resource');
        return view('admin.resource_stock.resource_stock_update',$assign);
    }



    /**
     * 更改资源分类    下架顶级资源分类 该分类下的所有子级资源也会下架
     *
     */
    public function updateResource(Request $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            dd($input);
            $data['pid'] = intval($input['pid']) ?  intval($input['pid']) : 0;
            $data['resource_stock_id'] = intval($input['id']) ?  intval($input['id']) : 0;
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['type'] = intval($input['type']) ? intval($input['type']) : 0;
        }else{
            return redirect()->back()->withInput()->with('msg', '非法请求');
        }
        $res=ResourceStock::updateResource($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('msg', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("resource.index")->with('msg', "更改资源分类信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('msg', '资源分类已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('msg', '数据写入失败,更改资源分类信息失败');
        }
//        dd('updateCategory.后台更改分类');
    }


    /**
     * 删除资源分类    删除顶级资源分类 该分类下的所有子级资源也会删除
     * @param $category_id 分类id
     *deleteCategory_delete_code  0：默认 1：删除失败   2：成功删除
     */
    public function deleteResource($resource_stock_id)
    {
        if(empty($resource_stock_id)){
            return redirect()->back()->withInput()->with('msg', '非法访问');
        }
        $res=ResourceStock::deleteResource($resource_stock_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('msg', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', '资源分类不存在');
                break;
            case 2:
                return redirect()->route("resource.index")->with('msg', "删除资源分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('msg', '网络错误,删除资源分类失败');
        }


    }
    /**
     *上传文章封面图
     * @param $file    上传封面图
     * @return string  图片路径
     */


    public function uploadCover ($file)
    {
        //值例如 /uploads/images/resource_stock/20210613
        $folder_name = "uploads/images/resource_stock/".date('Ymd/',time());
        $upload_path = public_path() . "/" . $folder_name;
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        $filename = Str::random(10).time().'.'. $extension;
        //将图片移动到我们目标存储路径中
        $file->move($upload_path , $filename);
        //return "/".$folder_name.$filename;  //   /uploads/images/article/20210613
        $path= "/".$folder_name.$filename;  //   /uploads/images/article/20210613
        return $path;
    }

}
