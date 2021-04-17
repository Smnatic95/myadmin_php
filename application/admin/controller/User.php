<?php

namespace app\admin\controller;

use think\Db;
use think\Request;
use app\base\controller\BaseController;

class User extends BaseController
{

    public function login()
    {
        // 是否为 POST 请求
        if (request()->isPost()) {
            $reqParms = request()->param();
            $sRes = Db::name('admin_user')->where('name', $reqParms['name'])->find();
            if (!$sRes) {
                return $this->myApiRes(0, '用户不存在');
            } else if ($sRes['password'] !=  $reqParms['password']) {
                return $this->myApiRes(0, '密码错误');
            } else {
                return $this->myApiRes(1, '登陆成功');
            }
        }
    }
}
