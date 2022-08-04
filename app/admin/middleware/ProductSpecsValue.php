<?php

namespace app\admin\middleware;


class ProductSpecsValue
{
    public function handle($request, \Closure $next)
    {
        $params = $request->param();
        $action = $request->action();
//        if ($action != 'index') {
//            $scene = validate(ProductCategoryValidate::class)->scene($action);
//            $scene->check($params);
//
//            $params = $scene->getDataByRule($params);
//
//            $request->params = $params;
//        }

        return $next($request);
    }
}