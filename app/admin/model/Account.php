<?php

namespace app\admin\model;

class Account extends BaseModel
{
    public function check($username, $password){
        $res = self::where(['username' => $username, 'password' => $password]);
        return $res;
    }
}