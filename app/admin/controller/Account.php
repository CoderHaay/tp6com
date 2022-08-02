<?php
namespace app\admin\controller;

use app\BaseController;
use app\Request;
use think\helper\Str;
use app\admin\service\Account as AccountService;

class Account extends BaseController{
    public function login(Request $request){
        $param = $request->params;
        $token = (new AccountService())->getToken($param );
//        halt($token);
        return success(['token' => $token]);
    }
    public function info(Request $request){
        $uid = $request->uid;
        return success(['uid' => $uid]);
    }
}