<?php

namespace app\lib\exception;

class ForbiddenException extends BaseException
{
    public $httpStatus = 403;
    public $errorCode = 10002;
    public $msg = 'ζιδΈε€';
}