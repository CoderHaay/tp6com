<?php

namespace app\admin\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        echo 'hello';
        halt('hello');
    }
}

