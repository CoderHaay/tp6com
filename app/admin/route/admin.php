<?php

use think\facade\Route;

Route::get('demo', 'dbdemo/index');

//Route::get('account/login', 'account/login');

Route::post('account/login', 'account/login')->middleware(\app\admin\middleware\Account::class);
Route::post('account/info', 'account/info')->middleware(\app\admin\middleware\Auth::class)->allowCrossDomain();