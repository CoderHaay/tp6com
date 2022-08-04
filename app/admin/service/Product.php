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

    public function edit($data){
        $model = new ProductModel();
        // 启动事务
        // 当闭包中的代码发生异常会自动回滚
        $model->startTrans();
        try {
            //执行具体的操作


            // 提交事务
            $model->commit();
        }catch (\Exception $e){
            // 回滚事务
            $model->rollback();
        }
    }
}