<?php

use think\facade\Route;

Route::get('demo', 'DBDemo/index');

//Route::get('account/login', 'account/login');

Route::post('account/login', 'account/login')->middleware(\app\admin\middleware\Account::class);
Route::post('account/info', 'account/info')->middleware(\app\admin\middleware\Auth::class)->allowCrossDomain();


Route::resource('prod_cate', 'ProductCategory')->middleware(\app\admin\middleware\ProductCategory::class);
Route::resource('prod', 'Product')->middleware(\app\admin\middleware\Product::class);

Route::resource('prod_specs_name', 'ProductSpecsName')->middleware(\app\admin\middleware\ProductSpecsName::class);
Route::resource('prod_specs_value', 'ProductSpecsValue')->middleware(\app\admin\middleware\ProductSpecsValue::class);