<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ResourceStock extends Base
{

    protected $primaryKey='resource_stock_id';

    /**
     * 获取顶级资源 用于新增资源分类选择
     * @return \Illuminate\Support\Collection 所有顶级资源
     */
    public  static  function  pid_resources(){
        $resources =DB::table('resource_stocks')
            ->select('name','resource_stock_id','is_pull')
            ->where('pid','=','0')
            ->get();

        foreach ($resources as $k){
            if($k->is_pull==1){
                $k->name= $k->name.'(已下架)';
            }
        }
        return  $resources;
    }

    /**
     * 新增资源分类
     * @param $data  新增资源分类数据
     * @return int   0：$data为空，1：资源分类已存在，2：成功资源分类
     */
    public static function addResource($data,$type){
        if(empty($data)){//如果$data为空
            return 0;
        }
        $resource_count = self::where('name',$data['name'])->count(); //根据用户输入资源名称查询数据库资源库表资源名称字段
        if($resource_count){//如果有数据说明资源分类已存在
            return 1;
        }
        $res=self::create($data);//使用create新增资源分类
        //本次新增资源分类信息写入log
        self::addAadminLog(7,$type,$res->resource_stock_id,$res->created_at);
        return 2;
    }

    /**
     * 修改资源分类
     * @param $data 资源分类新数据
     * @return int 0：数据为空，1：无需修改，保留原样，2：修改成功，3：资源分类名称已存在
     */
    public  static  function  updateResource($data){
        if(empty($data)){//如果$data为空
            return 0;
        }

        $resource_res = self::find($data['resource_stock_id'],["resource_stock_id","pid","type","name","url","description","cover","is_pull", "is_verify"]); //根据资源分类id查询数据库资源分类信息 用于对比字段修改
        $resource_info=$resource_res->toArray(); //集合转数组

        //判断字段是否需要修改
        $edit_info = array_diff_assoc($data,$resource_info); //1:返回[]空数组，说明2个数组相同 2:返回非空数组（数据相同字段已去除，剩下需要修改的字段数据），说明$data数据和数据库数据不一致，需要执行修改
        if (!$edit_info) {//空数组说明没有修改字段值，返回1
            return 1;
        }

        if(!empty($edit_info['name'])){//如果有新资源分类名称
            $resource_name_count = self::where('name',$data['name'])->count(); //根据用户输入新资源分类名称查询数据库新资源分类库表资源分类名称字段
            if($resource_name_count){//如果有数据说明资源分类名称已存在
                return 3;
            }
        }

        //判断是否顶级资源
        if($resource_info['pid']==0){
            if(!empty($edit_info['is_pull'])){//如果下架资源分类
                if($edit_info['is_pull']==1){//下架顶级资源 子级资源pid=顶级资源id  子级资源也下架
                    self::where('pid','=', $resource_info['resource_stock_id'])
                        ->update(['is_pull' => 1]);
                }elseif($edit_info['is_pull']==2){//取消下架顶级资源 子级资源pid=顶级资源id  子级资源也取消下架
                    self::where('pid','=', $resource_info['resource_stock_id'])
                        ->update(['is_pull' => 2]);
                }else{

                }
            }
        }else{//不是顶级资源才有资源分类图片
            if(!empty($edit_info['cover'])){//如果有新资源分类图片
                self::deletedCover($resource_info['cover'],1);//删除资源分类图片
            }
        }
        self::find($data['resource_stock_id'])->update($edit_info);//使用update方法修改资源分类
        //本次修改资源分类信息写入log
        self::addAadminLog(7,3,$data['resource_stock_id'],date('Y-m-d H:i:s', time()));
        return 2;

    }

    /**
     * 删除资源
     * @param $resource_stock_id 资源分类id
     * @return int  0：数据为空，1：分类已删除，2：成功删除
     */
    public static function deleteResource($resource_stock_id)
    {
        if(empty($resource_stock_id)){
            return 0;
        }
        //查询数据库中是否存在该分类  0：没有  1：存在
        $resource_id_count = self::where('resource_stock_id','=',$resource_stock_id)->count();
        if(!$resource_id_count){ //不存在说明已删除
            return 1;
        }
        $is_pid= self::find($resource_stock_id,["pid"]);

        if($is_pid->pid == 0){//判断删除顶级资源分类，子级资源分类也要删除
            $resource_info=self::where('pid','=', $resource_stock_id)->get(['cover']);//获取所有子级id和图片地址
            $down_cover=$resource_info->toArray();
            $allImg=array_flatten($down_cover);//多维数组转一维
            self::deletedCover($allImg,2);//删除子级资源分类图片
            self::where('pid','=',$resource_stock_id)->delete();//删除子级资源分类pid=resource_stock_id 顶级资源分类id
        }else{
            $resource_info = self::find($resource_stock_id,["cover"]); //查询包含图片路径的信息
            self::deletedCover($resource_info->cover,1);
        }

        self::where('resource_stock_id','=',$resource_stock_id)->delete();
        //本次删除资源分类信息写入log
        self::addAadminLog(7,1,$resource_stock_id,date('Y-m-d H:i:s', time()));
        return 2;
    }


    /**
     * @return string[]  资源类型数组
     */
    public  static function  mate_type(){
        $data=[0=>'默认(顶级资源)', 1=>'前台用户添加资源（未分配）',2=>'文章类',3=>'书籍类',4=>'刷题类',5=>'图片类',6=>'文件格式转换类',7=>'在线编辑类',8=>'模板类',9=>'在线作图类',10=>'文件传输类',11=>'影视类',12=>'音乐类',13=>'直播类',14=>'设计类',15=>'图标类',16=>'字体类',18=>'编辑器类',19=>'引擎类',20=>'网盘类',21=>'学术资源类',22=>'工具类',23=>'在线图片处理类',24=>'在线文件转换类',25=>'导航类',26=>'视频类',27=>'其他'];
        return $data;
    }

//    /**
//     *  无极分类(递归)实现代码   继承类的树形
//     * @param $data       无极分类数据
//     * @param int $pid    父类的id （顶级pid=0）
//     * @param int $level  子类的层次
//     * @return array      树形数组 （例如：
//     * 中国（id=1,pid=0）
//     * --北京(id=2,pid=1)、
//     * --天津(id=3,pid=1)、
//     * --河北(id=4,pid=1)等省、自治区
//     * -----石家庄(id=6,pid=4)等地级市
//     * ----------正定县(id=7,pid=6)
//     * ----------无极县(id=8,pid=6)等县）
//     */
//    public  static  function  classtree($data,$pid=0,$level=0){
//        static $arr=array();
//        $arr=collect($arr);
//        foreach ($data as $k => $v) {
////dd($data);
//            if($v['pid']==$pid){
//                $v['level']=$level;
//                if($v['pid']>0){
//                    $v['name']='-------'.$v['name'];
//
//                }
//                $arr=$v;
//
//                self::classtree($data,$v['resource_stock_id'],$level+1);
//            }
//        }
//
//        return $arr;
//
//    }



}
