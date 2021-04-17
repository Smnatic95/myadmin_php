<?php

namespace app\index\model;

use think\Model;

class Students extends Model
{
    protected static function init()
    {
       
    }

    public function mySelect()
    {
        $res = self::select();
        return json($res);
    }

    public function myInsert()
    {
        $insertData = [
            'name' => '小李',
            'signature' => '乌拉',
            'addTime' => date('Y-m-d H:i:s')
        ];
        $res = self::save($insertData);
        return $res;
    }
}
