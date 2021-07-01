<?php

namespace App\Models;



class AdminsLogs extends Base
{

    protected $primaryKey='admin_log_id';

    //前台添加每天最大为10条  7：资源库，8：友链,
    public static function isIndexaddMax($exec_object){
        $start_time=date("Y-m-d",time())." 00:00:00";
        $end_time=date("Y-m-d",time())." 23:59:59";
        $count_num=self::where([['created_at','>',$start_time],['created_at','<',$end_time],['exec_object','=',$exec_object],['exec_type','=',6]])->count();
        if(intval($count_num)<11){
            return 2;
        }

    }

}
