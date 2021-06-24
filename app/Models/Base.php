<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;


class Base extends Model
{
    /**
     * 禁止被批量赋值的字段
     * @var array
     */
    protected $guarded = [];

    /**
     * 记录管理员操作
     * @param $data  array 日志数据
     */
    public static function addAadminLog($data){
        if(!empty($data['created_at'])){       //创建记录
            DB::table('admins_logs')->insert($data);
        }elseif (!empty($data['updated_at'])){ //修改记录
            DB::table('admins_logs')->insert($data);
        }elseif (!empty($data['deleted_at'])){ //删除记录
            DB::table('admins_logs')->insert($data);
        }else{

        }
    }

    /**
     * 删除图片
     * @param $path  图片地址
     * @param $num   图片地址数据类型  1： 字符串，2：数组
     */
    public static  function  deletedCover($path,$num)
    {
        if(!empty($path)){//判断是否有图片路径
            if($num==1){//图片路径是字符串
                if(file_exists(public_path().$path)){//如果存在图片路径
                    //echo '1'.public_path().$path."</br>";
                    unlink(public_path().$path); //删除资源分类图片
                }
            }elseif($num==2){//图片路径是数组
                $path=array_filter($path);//去除数组中空值的方法
                if(!empty($path)){//数组有值
                    foreach ($path as $k=>$v){
                        if(file_exists(public_path().$v)){
                            unlink(public_path().$v);
                            //echo '2'.public_path().$v."</br>";
                        }
                    }
                }else{
                    //echo '数组空';
                }
            }
        }else{
            // echo '空';
        }
    }

    public static function mate_is_verify ($num){
        $is_verify=[0=>'默认', 1=>'未通过',2=>'已通过',];
        return $is_verify[$num];

    }

    public static function mate_is_pull ($num){
        $is_pull=[0=>'默认', 1=>'是',2=>'否',];
        return $is_pull[$num];
    }
}