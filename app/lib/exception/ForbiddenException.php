<?php

namespace app\lib\exception;

class ForbiddenException extends \Exception
{
    public $httpStatus = 403;
    public $errorCode = 10002;
    public $msg = '权限不够';
}