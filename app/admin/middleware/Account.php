<?php

namespace app\admin\middleware;

use app\admin\validate\Account as AccountValidate;
use app\lib\exception\BaseException;
use app\lib\exception\ParameterException;
use think\Exception;
use think\exception\ValidateException;
use app\admin\model\Account as AccountModel;
use app\lib\exception\NotFoundException;

class Account
{
    /**
     * @throws Exception
     */
    public function handle($request, \Closure $next)
    {
        $params = $request->param();
        // 校验登录参数
        try {
            validate(AccountValidate::class)->scene('login')->check($params);
        } catch (ValidateException $e) {
//            throw new Exception("参数错误");
            $message = $e->getMessage();
            throw new ParameterException(
                [
                    'msg' => $message
                ]
            );
        }
        $account_model = new AccountModel();
        $exist = $account_model->check($params['username'], $params['password']);
        if(!$exist){
            throw new NotFoundException();
        }else{
            echo 'True';
        }
        return $next($request);
    }
}