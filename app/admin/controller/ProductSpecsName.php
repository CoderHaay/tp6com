<?php

namespace app\admin\controller;

use app\admin\model\ProductSpecsName as ProductSpecsNameModel;
use app\admin\service\ProductCategory as ProductCategoryService;
use app\BaseController;
use app\Request;

class ProductSpecsName extends BaseController
{
    public function index($page=1,$size=10){
        $list = (new ProductSpecsNameModel())->getPageData($page,$size);
        return success($list);
    }


    public function save(Request $request)
    {
        $data = $request->params;
        $res = (new ProductSpecsNameModel())->save($data);
        if ($res){
            return success();
        }else{
            return fail();
        }
    }

    public function update(Request $request)
    {
        $data = $request->params;
        $exist = !ProductSpecsNameModel::findOrEmpty($data['id'])->isEmpty();
        if ($exist){
            $res = ProductSpecsNameModel::update($data);
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