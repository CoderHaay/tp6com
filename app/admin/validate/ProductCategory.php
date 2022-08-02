<?php

namespace app\admin\validate;

use app\validate\BaseValidate;

class ProductCategory extends BaseValidate{
    //'weigh'   => 'number|between:1,120',
    //'tel'=>'mobile',
    //'heard_img'=>'url',
    //'enable'=>'integer',
    //'status'=>'integer',
    //'target_num'=>'require|integer',number
    protected $rule = [
        'id' => 'require|number',
        'name' => 'require',
        'pid' => 'number',
        'pic' => 'canBeEmpty',
        'sort' => 'canBeEmpty',
    ];

    protected $message  =   [
        'name.require' => '分类名不能为空'
    ];
    //验证规则，设置后只会校验这个数组里面的参数
    protected $scene = [
        'save' => ['name', 'pid', 'pic', 'sort'],
        'delete' => ['id'],
        'update' => ['id','name', 'pid', 'pic', 'sort'],
        'read' => ['id'],
    ];
}