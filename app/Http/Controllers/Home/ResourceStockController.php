<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\AdminsLogs;
use App\Models\ResourceStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class ResourceStocksController   前台资源库
 * @package App\Http\Controllers\Home
 */

class ResourceStockController extends Controller
{

    /**
     * showArticle      前台资源库
     * return  array
     */
    public function showResource()
    {
        //获取顶级资源分类
        $resource_stock_res=ResourceStock::select('resource_stock_id')->where([['pid','=', 0],['is_pull','=',2]])->get();
        $resource_stock_res_ids =array_flatten($resource_stock_res->toArray());
        $resource_stock=ResourceStock::select('resource_stock_id','name')->where([['pid','=', 0],['is_pull','=',2]])->get();
        $s=$resource_stock->toArray();
        $s=array_combine(array_column($s, 'resource_stock_id'), $s);//将数组键换成resource_stock_id
        //统计顶级资源分类的子级资源分类
        $resource_stock_pid_top_res = DB::table('resource_stocks')
            ->select(DB::raw("count(resource_stock_id) as resource_stock_num,pid as resource_id"))
            ->whereIn('pid',$resource_stock_res_ids)
            ->where("is_pull",'=',2)
            ->groupBy("pid")
            ->get();
        foreach ($resource_stock_pid_top_res as $k =>$v ){
            $v->name=$s[$v->resource_id]['name'];
        }
        //中间内容
        $resource_res=ResourceStock::where([['pid','>', 0],['is_pull','=',2]])->get();
        $assign = [

            'resource_stock_top'     => $resource_stock_pid_top_res,
            'resource_stock_all'     => $resource_res,
//            'head'         => $head,
            'category_val'  =>'resource',
            'category_id'  =>0,
            'tag_id'=>0
        ];

        return view('home.resource_stock',$assign);

    }
    //前台添加资源
    public function addResource(Request $request){
        if($request->isMethod('post')){
            $input=$request->except('s');
            $data['pid'] = intval($input['firstType']) ?  intval($input['firstType']) : 0;
            $data['type'] =  1;
            $data['name'] = isset($input['resourceName']) ? $input['resourceName'] : "";
            $data['url'] = isset($input['resourceAddress']) ? $input['resourceAddress'] : "";
            $data['description'] = isset($input['description']) ? $input['description'] : "";
            $data['is_pull'] =  1;
            $data['is_verify'] = 1;
            //检查是否限量值（每日10条）
            $add_count_num=AdminsLogs::isIndexaddMax(7);
            if($add_count_num==2){
                return redirect()->back()->withInput()->with('err', '添加失败,已达到限量');
            }
            //添加
            $res=ResourceStock::addResource($data,6);
            if($res==2){
                return redirect()->back()->withInput()->with('msg', '成功');
            }else{
                return redirect()->back()->withInput()->with('err', '添加失败');
            }
        }else{
            return redirect()->back()->withInput()->with('err', '非法访问');
        }
    }

}
