<?php

namespace app\admin\service;

use think\Exception;
use think\helper\Str;
use app\admin\model\Account as AccountModel;

class Account
{
    public function getToken($params)
    {
        $scope = $params['scope'];
        $uid = $params['id'];
        $values = [
            'scope' => $scope,
            'uid' => $uid
        ];
        $token = $this->saveToCache($values);
        $save_data = [
            'last_ip'=> get_client_ip(),
            'last_time'=> time()
        ];
        AccountModel::where('id', $params['id'])->update($save_data);
        return $token;
    }

    private function saveToCache($values)
    {
        $token = self::generateToken();
        $expire_in = config('secure.token_expire_in');
        $result = cache($token, json_encode($values), $expire_in);
        if (!$result) {
            throw new Exception('服务器缓存异常');
        }
        return $token;
    }

    public static function generateToken()
    {
        $randChar = Str::random(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_dalt');

        return md5($randChar . $timestamp . $tokenSalt);
    }
}