<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class ProductCategory extends BaseModel
{
    protected $autoWriteTimestamp = true;

    use SoftDelete;

    protected $deleteTime = 'delete_time';
}