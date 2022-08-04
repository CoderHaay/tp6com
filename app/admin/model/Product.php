<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class Product extends BaseModel
{
    use SoftDelete;

    protected $deleteTime = 'delete_time';

    public function getPageData($page, $size)
    {
        return self::paginate($size, false, [
            'page' => $page
        ]);
    }
}