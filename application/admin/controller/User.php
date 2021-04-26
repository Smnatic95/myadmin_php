<?php
namespace app\admin\controller;

use think\Db;
use think\Request;
use app\base\controller\BaseController;
use app\admin\model\User as userModel;

class User extends BaseController
{
    public function login()
    {
        if (request()->isPost()) {
            $reqParms = request()->param();
            $user = Db::name('admin_user')->where('name', $reqParms['name'])->find();
            if (!$user) {
                return $this->myApiRes(0, '用户不存在');
            }
            if ($user['password'] != $reqParms['password']) {
                return $this->myApiRes(0, '密码错误');
            }
                $jwt = $this->createToken($user['id']);
                Db::name('admin_user')->where('id', $user['id'])->update(['jwt' => $jwt, 'lrtime' => date('Y-m-d H:i:s')]);
                return $this->myApiRes(1, $jwt);
        } else {
            return $this->myApiRes(0, '请求方式错误');
        }
    }

    public function checkLogin(){
        $res = userModel::checkLogin('tO2xzm_c2z7Mfv7Kk0XPTQz4Al41');
        return $res;
    }

}
