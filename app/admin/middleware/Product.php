<?php

namespace app\admin\middleware;

use app\admin\validate\Product as ProductValidate;
use think\Exception;

class Product
{
    /**
     * @throws Exception
     */
    public function handle($request, \Closure $next)
    {
        $params = $request->param();
        $action = $request->action();
        if ($action != 'index') {
            $scene = validate(ProductValidate::class)->scene($action);
            $scene->check($params);

            $params = $scene->getDataByRule($params);
            $request->params = $params;
        }

        return $next($request);
    }
}