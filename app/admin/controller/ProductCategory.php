<?php

namespace app\admin\controller;

use app\BaseController;
use app\Request;
use app\admin\model\ProductCategory as ProductCategoryModel;
use app\admin\service\ProductCategory as ProductCategoryService;


class ProductCategory extends BaseController
{
    public function index($page=1,$size=10){
        $list = (new ProductCategoryModel())->getPageData($page,$size);
        return success($list);
    }


    public function save(Request $request)
    {
        $data = $request->params;
        $res = (new ProductCategoryModel())->save($data);
        if ($res){
            return success();
        }else{
            return fail();
        }
    }

    public function update(Request $request)
    {
        $data = $request->params;
        $exist = !ProductCategoryModel::findOrEmpty($data['id'])->isEmpty();
        if ($exist){
            $res = ProductCategoryModel::update($data);
            if ($res){
                return success();
            }else{
                return fail();
            }
        }else{
            return fail([],'数据不存在');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->params['id'];
        $res = (new ProductCategoryService())->deleteByID($id);
        if ($res){
            return success();
        }else{
            return fail();
        }
    }

    public function read(Request $request)
    {
        $id = $request->params['id'];
        $res = (new ProductCategoryService())->findByID($id);
        if ($res){
            return success($res);
        }else{
            return fail();
        }
    }
}