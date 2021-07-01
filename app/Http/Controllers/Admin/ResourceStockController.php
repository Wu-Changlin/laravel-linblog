<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ResourceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;



class ResourceStockController extends Controller
{
    /**
     * 显示所有分类
     * @return array
     */
    public function index()
    {
        $data= ResourceStock::paginate(10);
        $pid_res=ResourceStock::pid_resources();// 获取顶级资源分类
        $pid_data=$this->mate_pid($pid_res); //顶级资源分类
        $type_data=ResourceStock::mate_type();       //资源类型数组
        if(!empty($data)){
            foreach($data as $key){
                $key->type=$type_data[$key->type];//资源类型数字替换成文字
                $key->is_pull=ResourceStock::mate_is_pull($key->is_pull);//下架数字替换成文字
                $key->is_verify=ResourceStock::mate_is_verify($key->is_verify);//验证数字替换成文字
                if( $key->pid == 0){ //判断是否顶级资源分类
                    $key->pid='顶级资源';
                }else{
                    $key->pid=isset($pid_data[$key->pid])?$pid_data[$key->pid]:'';//父级id替换成顶级资源分类名称
                }
            }
        }
        $assign=compact('data');

        return view('admin.resource_stock.resource_stock_list',$assign);
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
     */
    public function showAddresourceWeb()
    {
        $pid_res=ResourceStock::pid_resources();
        $data=ResourceStock::mate_type();
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
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=ResourceStock::addResource($data,2);
        switch ($res) { //判断新增返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '资源分类已存在');
                break;
            case 2:
                return redirect()->route("resource.index")->with('msg', "新增资源分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,新增资源分类失败');
        }

    }

    /**
     * 显示更改资源分类页
     *@param $resource_stock_id 资源id
     */
    public function showUpdateresourceWeb($resource_stock_id)
    {
        if(empty($resource_stock_id)){
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $pid_res=ResourceStock::pid_resources();
        $data=ResourceStock::mate_type();
        uasort($data, function ($a, $b) { //排序按值的长度降序 用于页面显示标签
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
            $data['resource_stock_id'] = intval($input['resource_stock_id']) ?  intval($input['resource_stock_id']) : 0;
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
            return redirect()->back()->withInput()->with('err', '非法请求');
        }
        $res=ResourceStock::updateResource($data);   //执行修改
        switch ($res) { //判断修改返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('msg', "保留");
                break;
            case 2:
                return redirect()->route("resource.index")->with('msg', "更改资源分类信息成功");
                break;
            case 3:
                return redirect()->back()->withInput()->with('err', '资源分类已存在');
                break;
            default:
                return redirect()->back()->withInput()->with('err', '数据写入失败,更改资源分类信息失败');
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
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
        $res=ResourceStock::deleteResource($resource_stock_id);//执行删除
        switch ($res) { //判断删除返回值
            case 0:
                return redirect()->back()->withInput()->with('err', '数据为空');
                break;
            case 1:
                return redirect()->back()->withInput()->with('err', '资源分类不存在');
                break;
            case 2:
                return redirect()->route("resource.index")->with('msg', "删除资源分类成功");
                break;
            default:
                return redirect()->back()->withInput()->with('err', '网络错误,删除资源分类失败');
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

    /**
     * 导入
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PHPExcel_Exception
     */
    public static function importResource(Request $request){
        if (!$request->hasFile('excel')) {
            return redirect()->back()->withInput()->with('err', '文件上传失败');
        }

        $excel_file=$request->file('excel');//获取上传的excel
        $upload_path=storage_path()."/".'import';//存放excel的路径
        $excel_name=$excel_file->getClientOriginalName();//获取excel表格名
        $excel_file->move($upload_path , $excel_name);//移动excel到/storage/import/
//        $filePath = 'storage/import/'.$excel_name;//
        $filePath = $upload_path."/".$excel_name;//

        $objPHPExcel = Excel::load($filePath);

        $a = $objPHPExcel->getsheet(0);//去除表头

        //设置一个存放图片的路径
        $imgPath = "/uploads/images/resource_stock/".date('Ymd/',time());
        $imageFilePath = public_path() . $imgPath;//图片保存目录
        if(!file_exists($imageFilePath)){//文件夹不存在
            mkdir($imageFilePath);//创建文件夹
        }

        foreach($a->getDrawingCollection() as $img){
            list ($startColumn, $startRow) = \PHPExcel_Cell::coordinateFromString($img->getCoordinates());//获取列与行号
            $imageFileName=Str::random(10).time();
            /*表格解析后图片会以资源形式保存在对象中，可以通过getImageResource函数直接获取图片资源然后写入本地文件中*/
            switch ($img->getMimeType()){//处理图片格式
                case 'image/jpg':
                case 'image/jpeg':
                    $imageFileName.='.jpg';
                    imagejpeg($img->getImageResource(),$imageFilePath.$imageFileName);
                    break;
                case 'image/gif':
                    $imageFileName.='.gif';
                    imagegif($img->getImageResource(),$imageFilePath.$imageFileName);
                    break;
                case 'image/png':
                    $imageFileName.='.png';
                    imagepng($img->getImageResource(),$imageFilePath.$imageFileName);
                    break;
            }
            $data[$startRow-2]['cover']=$imgPath.$imageFileName; //图片地址追加到数组中去；$startRow=图片所在列，  $startRow-2  数组的键从0开始
        }
        $excel_array=$a->toArray();
        array_shift($excel_array);  //删除第一个数组(标题);
        $i=0;
        foreach($excel_array as $k=>$v) {
            $data[$k]['name'] = $v[0];
            $data[$k]['description'] = $v[2];
            $data[$k]['url'] = $v[3];
            $data[$k]['type'] = intval($v[4]);
            $data[$k]['pid'] = intval($v[5]);
            $data[$k]['is_pull'] = intval($v[6]);
            $data[$k]['is_verify'] = intval($v[7]);
            $res=ResourceStock::create($data[$k]);

            if($res){
                echo $res->resource_stock_id.'数据写入成功,新增资源分类';
                ResourceStock::addAadminLog(7,2,$res->resource_stock_id,$res->created_at);
            }else{
                echo '数据写入失败,新增资源分类失败';
            }

            //入库(资源库)
        }
        //dd($data);
    }

    /**
     * 导出资源库
     */
    public function exportResource (){
        $cellData=ResourceStock::where('pid','>',0)->get();
        $data[0] = ["资源名称","资源图片","资源描述","资源地址","资源类型","父级资源","下架","验证"];
        foreach ($cellData as $k=>$v){
            $k ++;
            $data[$k][0] = $v['name'];
            $data[$k][1] = $v['cover'];
            $data[$k][2] = $v['description'];
            $data[$k][3] = $v['url'];
            $data[$k][4] = $v['type'];
            $data[$k][5] = $v['pid'];
            $data[$k][6] = $v['is_pull'];
            $data[$k][7] = $v['is_verify'];

        }
        //$cellData=$cellData->toArray();
//        dd($data);
        Excel::create("resourceStock",function ($excel) use ($data){
            $excel->sheet('score',function ($sheet) use ($data) {
                //init列
                $title_array = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q',
                    'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH'];
                //遍历数据
                for($i=0;$i<sizeof($data);$i++){
                    foreach($data[$i] as $k=>$v){
                        //设置图片列高度
                        $i>0 && $sheet->setHeight($i+1, 78);
                        //设置图片列宽度
                        $sheet->setWidth(array($title_array[$k]=>15));
                        //判断图片列，如果是则放图片
                        if($k == 1 && $i>0){
                            $objDrawing = new \PHPExcel_Worksheet_Drawing;
                            $objDrawing->setPath(public_path().$v);//图片路径
                            $objDrawing->setCoordinates($title_array[$k] . ($i+1));//图片在excel的位置
                            $objDrawing->setHeight(100);//图片高度
                            $objDrawing->setWidth(100);//图片宽度
                            $objDrawing->setOffsetX(1);
                            $objDrawing->setRotation(1);
                            $objDrawing->setWorksheet($sheet);
                            continue;
                        }
                        //否则放置文字数据
                        $sheet->cell($title_array[$k] . ($i+1), function ($cell) use ($v) {
                            $cell->setValue($v);
                        });
                    }
                }
            });
        })->store('xls');//   保存在/storage/exports/
        //->export('xls');  //保存在本地
        //->store('xls')->export('xls'); //直接下载

    }


}
