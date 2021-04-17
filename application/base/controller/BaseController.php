<?php

namespace app\base\controller;

use think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        //处理跨域问题
        header('Content-Type:application/json; charset=utf-8');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Max-Age:86400'); // 允许访问的有效期
        header('Access-Control-Allow-Headers:*');
        header('Access-Control-Allow-Methods:OPTIONS, GET, POST, DELETE');
    }
    public function myApiRes($code, $data)
    {
        return json([
            'code' => $code,
            "data" => $data
        ]);
    }
}
