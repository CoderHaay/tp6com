<?php

namespace app\lib\exception;

class   NotFoundException extends BaseException
{
    public $httpStatus = 404;
    public $errorCode = 10002;
    public $msg = '数据未找到';

}