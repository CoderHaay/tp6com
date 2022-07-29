<?php

namespace app\admin\controller;

use think\facade\Db;
use app\BaseController;
use app\common\model\User;
use think\facade\View;

class Logindemo extends BaseController
{
    public function index()
    {
        // 判断有没有post过来的数据
        if (request()->post()) {
            $data = input('post.');
            //验证验证码
            if(!captcha_check($data['verifycode'])){
                halt($data);
            }

        } else {
            return view('login');
        }

    }


    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
}
