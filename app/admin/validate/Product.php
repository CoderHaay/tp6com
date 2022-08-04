<?php

namespace app\admin\validate;

use app\validate\BaseValidate;

class Product extends BaseValidate
{
    //'weigh'   => 'number|between:1,120',
    //'tel'=>'mobile',
    //'heard_img'=>'url',
    //'enable'=>'integer',
    //'status'=>'integer',
    //'target_num'=>'require|integer',number
    /***
     *  "specs":[
     *              {"specs_value_id":"2,4","price":1,"stock":1}
     *          ]
     */
    protected $rule = [
        'cat_id' => 'require',
        'name' => 'require',
        'image' => 'require',
        'price' => 'require',
        'slide_image' => 'require',
        'stock' => 'require',
        'is_hot' => 'in:0,1',
        'spec_type' => 'in:0,1',
        'specs' => 'require'
    ];

    protected $message = [
        'cat_id.require' => '商品分类未选择',
        'name.require' => '商品名称不能为空',
        'image.require' => '商品图片不能为空',
        'price.require' => '商品价格不能为空',
        'slide_image.require' => '商品轮播图不能为空',
        'stock.require' => '商品库存不能为空',
    ];

    protected function checkSpecs($value, $rule = '', $data = '', $field = '')
    {
        if (isset($value) && !is_array($value)) {
            return $field . "规格类型错误";
        }
    }


    //验证规则，设置后只会校验这个数组里面的参数
    protected $scene = [
        'save' => ['cat_id', 'name', 'image', 'price', 'slide_image', 'stock', 'is_hot', 'spec_type', 'specs'],
        'update' => ['id', 'cat_id', 'name', 'image', 'price', 'slide_image', 'stock', 'is_hot', 'spec_type',
            'specs'],
        'read' => ['id'],
        'delete' => ['id']
    ];
}