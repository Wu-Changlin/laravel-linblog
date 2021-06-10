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

        $data= CategoryModel::all();
        //文字替换数字值  前台减少判断
        foreach($data as $key){
            if($key->type == 1){
                $str='文章列表';
                $key->type=$str;
            }elseif ($key->type == 2){
                $str='单页栏目';
                $key->type=$str;
            }elseif ($key->type ==3 ){
                $str='图片列表';
                $key->type=$str;
            }
            if($key->is_pull == 1){
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
        return view('admin.category.category_list',$assign);

    }


    /**
     * 显示新增分类页
     *
     *
     */
    public function showAddcategoryWeb()
    {
        return view('admin.category.category_add');
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
            $data['is_pull'] = intval($input['rec_index']) ? intval($input['rec_index']) : 0;
            $data['type'] = intval($input['type']) ? intval($input['type']) : 0;

        }else{
            return redirect()->back()->withInput()->with('msg', '非法访问');
        }
        $res=CategoryModel::addCategory($data);
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('msg', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', '分类已存在');
                break;
            case 2:
                return redirect()->route("category.index")->with('msg', "新增分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('msg', '数据写入失败,新增分类失败');
        }

    }

    /**
     * 显示更改分类页     下架分类 该分类下的所有文章也会下架
     *@param $category_id 分类id
     */
    public function showUpdatecategoryWeb($category_id)
    {

        if(empty($category_id)){
            return redirect()->back()->withInput()->with('msg', '非法访问');
        }
        $data = CategoryModel::find($category_id);
        $data->toArray();
        $assign=compact('data');  // compact() 的字符串可以就是变量的名字  （ data 视图里的变量名）
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
            $data['is_pull'] = intval($input['rec_index']) ? intval($input['rec_index']) : 0;
            $data['type'] = intval($input['type']) ? intval($input['type']) : 0;
        }else{
            return redirect()->back()->withInput()->with('msg', '非法请求');
        }
        $res=CategoryModel::updateCategory($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('msg', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', '分类已存在');
                break;
            case 2:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 3:
                return redirect()->route("category.index")->with('msg', "更改分类信息成功");
                break;
            default:
                return redirect()->back()->withInput()->with('msg', '数据写入失败,更改分类信息失败');
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
            return redirect()->back()->withInput()->with('msg', '非法访问');
        }
        $res=CategoryModel::deleteCategory($category_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('msg', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', '分类不存在');
                break;
            case 2:
                return redirect()->route("admin.showAdminUser")->with('msg', "删除分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('msg', '网络错误,删除分类失败');
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
