<?php

namespace app\admin\controller;

use app\admin\model\Product as ProductModel;
use app\admin\service\Product as ProductService;
use app\BaseController;
use app\Request;

class Product extends BaseController
{
    public function index($page=1,$size=10){
        $list = (new ProductModel())->getPageData($page,$size);
        return success($list);
    }


    public function save(Request $request)
    {
        $data = $request->params;
        $model = new ProductModel();
        $res = $model->save($data);
        if ($res){
            return success();
        }else{
            return fail();
        }
    }

    public function update(Request $request)
    {
        $data = $request->params;
        $id = $data['id'];
        $exist = !ProductModel::findOrEmpty($id)->isEmpty();
        if ($exist){
            $res = ProductModel::update($data);
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
        $res = (new ProductService())->deleteByID($id);
        if ($res){
            return success();
        }else{
            return fail();
        }
    }

    public function read(Request $request)
    {
        $id = $request->params['id'];
        $res = (new ProductService())->findByID($id);
        if ($res){
            return success($res);
        }else{
            return fail();
        }
    }
}