<?php

namespace app\admin\model;

use think\Model;

class BaseModel extends Model
{
    /**
     * 自动时间戳类型
     *
     */
    //protected $autoWriteTimestamp = true;
    protected $autoWriteTimestamp = 'datetime';
    /**
     * 添加时间
     *
     */
    protected $createTime = 'create_time';

    /**
     * 更新时间
     *
     */
    protected $updateTime = 'update_time';
}