<?php

namespace app\admin\service;

use think\Exception;
use app\admin\model\ProductCategory as ProductCategoryModel;

class ProductCategory
{
    public function deleteByID($id){
        $empty = true;
        if ($empty){
            return ProductCategoryModel::destroy($id);
        }else{
            throw new Exception('分类下面有商品，不能删除！');
        }
    }
}