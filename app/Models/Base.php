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
}