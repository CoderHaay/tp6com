<?php

namespace app\admin\validate;

use app\validate\BaseValidate;
use think\Validate;

class Account extends BaseValidate{
    //'weigh'   => 'number|between:1,120',
    //'tel'=>'mobile',
    //'heard_img'=>'url',
    //'enable'=>'integer',
    //'status'=>'integer',
    //'target_num'=>'require|integer',number
    protected $rule = [
        'username' => 'require',
        'password' => 'require'
    ];

    protected $message  =   [
        'username.require' => '用户名不能为空',
        'password.require'     => '密码不能为空'
    ];
    //验证规则，设置后只会校验这两个参数
    protected $scene = [
        'login' => ['username', 'password']
    ];
}