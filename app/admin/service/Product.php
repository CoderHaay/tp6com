<?php

namespace app\admin\service;

use think\Exception;
use app\admin\model\Product as ProductModel;

class Product
{
    /**
     * @throws Exception
     */
    public function deleteByID($id){
        $empty = true;
        if ($empty){
            return ProductModel::destroy($id);
        }else{
            throw new Exception('分类下面有商品，不能删除！');
        }
    }


    public function findByID($id){
        return ProductModel::find($id);
    }
}