<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;

class CategoryController extends Controller
{
    /**
     * 显示所有分类
     * @return array
     */
    public function index()
    {

        $data= CategoryModel::paginate(10);
        //数字转文字 页面减少判断
        foreach($data as $key){
            $key->type=$this->mate_type($key->type,1);
            $key->is_pull=CategoryModel::mate_is_pull($key->is_pull);//下架数字替换成文字

        }
        $assign=compact('data');
        return view('admin.category.category_list',$assign);

    }

    /**
     * 分类类型数字转分类类型文字
     * @param $num    分类类型数字
     * @return string 分类类型文字
     */
    public function mate_type ($num,$return_type){
       $type=[0=>'默认',1=>'文章列表',2=>'单页栏目',3=>'图片列表',4=>'友好博客',5=>'资源库'];
       if($return_type==1){//返回分类类型文字
           return $type[$num];
       }elseif ($return_type==2){ //返回分类类型英文别名
           $type_enname=[1=>'category',2 =>'about',3=>'picture',4=>'friend',5=>'resource'];
           return $type_enname[$num];
       }else{//返回分类类型文字数组
           return $type;
       }
    }

    /**
     * 显示新增分类页
     */
    public function showAddcategoryWeb()
    {

        $data=$this->mate_type(3,3);
        $data=array_except($data, array(0));//从数组移除给定的键=1的值对
        $assign=compact('data');
        return view('admin.category.category_add',$assign);
    }


    /**
     * 新增分类
     * @return
     *
     */
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->except('s','_token');
            $data['pid'] = intval($input['pid']) ?  intval($input['pid']) : 0;
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['type'] = intval($input['type']) ? intval($input['type']) : 0;
            $data['val']=$this->mate_type($data['type'],2);//分类类型英文别名
        }else{
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=CategoryModel::addCategory($data);
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '分类已存在');
                break;
            case 2:
                return redirect()->route("category.index")->with('msg', "新增分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增分类失败');
        }

    }

    /**
     * 显示更改分类页     下架分类 该分类下的所有文章也会下架
     *@param $category_id 分类id
     */
    public function showUpdatecategoryWeb($category_id)
    {

        if(empty($category_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }

        $data = CategoryModel::find($category_id);
        $data->toArray();
        $type_name=$this->mate_type(3,3);
        $type_name=array_except($type_name, array(0));//从数组移除给定的键=1的值对
        $assign=compact('data','type_name');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
        return view('admin.category.category_update',$assign);
    }



    /**
     * 更改分类     下架分类 该分类下的所有文章也会下架
     *
     */
    public function updateCategory(Request $request)
    {
        //判断是否post请求
        if ($request->isMethod('post')) {
            $input = $request->except('s','_token');  //去除 s：路由地址 ，_token： 表单中包含一个隐藏的 CSRF 令牌字段
            $data['pid'] = intval($input['pid']) ?  intval($input['pid']) : 0;
            $data['category_id'] = intval($input['id']) ?  intval($input['id']) : 0;
            $data['name'] = isset($input['name']) ? $input['name'] : "";
            $data['keywords'] = isset($input['keywords']) ? $input['keywords'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['is_pull'] = intval($input['is_pull']) ? intval($input['is_pull']) : 0;
            $data['type'] = intval($input['type']) ? intval($input['type']) : 0;
            $data['val']=$this->mate_type($data['type'],2);//分类类型英文别名
        }else{
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=CategoryModel::updateCategory($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("category.index")->with('msg', "更改分类信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '分类已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改分类信息失败');
        }
//        dd('updateCategory.后台更改分类');
    }


    /**
     * 删除分类    该分类下的所有文章也会删除
     * @param $category_id 分类id
     *deleteCategory_delete_code  0：默认 1：删除失败   2：成功删除
     */
    public function deleteCategory($category_id)
    {
        if(empty($category_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=CategoryModel::deleteCategory($category_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '分类不存在');
                break;
            case 2:
                return redirect()->route("admin.showAdminUser")->with('msg', "删除分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除分类失败');
        }


    }


    /**
     * 排序分类    后台调整前台分类显示位置   (按字符长度、字母、新建分类时间)
     * @param
     *sortCategory_sort_code
     */
     public function sortCategory(){
         dd('sortCategory.后台调整前台分类显示位置');
     }





}
