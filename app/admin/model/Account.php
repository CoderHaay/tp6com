<?php

namespace app\admin\model;

class Account extends BaseModel
{
//    protected $name = 'account';
    public function check($username, $password){
        $res = self::where(['username' => $username, 'password' => $password])->find()->toArray();
        return $res;
    }
}