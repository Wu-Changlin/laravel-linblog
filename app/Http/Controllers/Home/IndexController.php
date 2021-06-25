<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\ResourceStock;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use Maatwebsite\Excel\Concerns\WithDrawings;


/**
 * Class IndexController    前台首页
 * @package App\Http\Controllers\Home
 */
class IndexController extends Controller
{

//    /**
//     * 显示博客前台首页
//     * @return array
//     */
    public function showIndex()
    {

        //dd('博客前台首页');
        //获取置顶的文章
        //获取文章信息
        return view('home.index');
    }







    public function showIndexss (){

//        $cellData[] = ['学号','姓名','年龄','成绩','名次','图片'];
//        $cellData[] = ['10002','罗翔',19,100,1,'/uploads/images/article/20210614/aeXGCypW2C1623674472.png'];
//        $cellData[] = ['10003','花生油',19,100,1,'/uploads/images/article/20210613/NXwFO000x71623584160.jpg'];
//        $cellData[] = ['10004','jeeseliu',19,100,1,'/uploads/images/article/20210613/Z3uMqS3blW1623584246.png'];
//        $cellData[] = ['10005','laravel',19,100,1,'/uploads/images/article/20210615/yjZpx0WVvB1623765154.png'];
//        $cellData[] = ['10006','二维码',19,100,1,'/uploads/images/article/20210620/oneStar1.jpg'];
//        $cellData[] = ['10007','谷歌',19,100,1,'/uploads/images/article/20210616/guge.jpg'];
//        $cellData[] = ['10008','简单',19,100,1,'/uploads/images/article/20210613/image-20201214155526681.png'];
//        dd($cellData);
        $cellData=ResourceStock::where('pid','>',0)->get();
        $data[0] = ["资源名称","资源图片","资源描述","资源地址","资源类型","pid"];
        foreach ($cellData as $k=>$v){
            $k ++;
            $data[$k][0] = $v['name'];
            $data[$k][1] = $v['cover'];
            $data[$k][2] = $v['description'];
            $data[$k][3] = $v['url'];
            $data[$k][4] = $v['type'];
            $data[$k][5] = $v['pid'];

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
        })->store('xls');//   保存在storage下的export
         //->export('xls');  //保存在本地
        //->store('xls')->export('xls'); //直接下载

    }







}
