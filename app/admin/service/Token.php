<?php

namespace app\admin\service;

use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;

class Token
{
    private static $token = '';

    /**
     * @throws ForbiddenException
     * @throws TokenException
     */
    public static function checkPrimaryScope(string $token):int{
        self::$token = $token;
        $scope = self::getCurrentToken('scope');
        if ($scope){
            if ($scope >= config('scope.user')){
                return self::getCurrentToken('uid');
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    /**
     * @throws TokenException
     */
    public static function getCurrentToken(string $key){
        $vars = cache(self::$token);
        if (!$vars){
            throw new TokenException();
        }else{
            if (!is_array($vars)){
                $vars = json_decode($vars, true);
            }
            if (array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new TokenException(['msg' => '权限查询失败']);
            }
        }
    }
}