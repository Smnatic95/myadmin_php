<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    private static $logoutTime = 1 * 24 * 60 * 60;
    protected $table = 'admin_user';

    public function select1()
    {
        return self::get(1);
    }

    public static function checkLogin($jwt)
    {
        $cuser = User::get(['jwt' => $jwt]);
        if (!$cuser) {
            return json(['code' => 0, 'msg' => 'token错误']);
        }
        $timeCha = time() - strtotime($cuser->data['lrtime']);
        if ($timeCha > User::$logoutTime) {
            return json(['code' => 403, 'msg' => '登陆过期']);
        }
        return json(['code' => 1, 'data' => $cuser->data]);
    }
}
