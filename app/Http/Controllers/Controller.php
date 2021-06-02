<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 接口返回数据
     * @param $msg         自定义提示信息
     * @param int $code    xiang
     * @param array $data
     */
    public function sendMSG($msg, $code=0, $data = []) {
        $arr = array(
            'msg' => $msg,
            'code' => $code,
            'data' => empty($data) ? "" : $data
            // 'data' => empty($data) ? "" : enGzip($data)
        );
        exit(json_encode($arr,320));
    }

}
