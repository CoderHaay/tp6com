<?php

namespace app\lib\exception;

class ParameterException extends BaseException
{
    public $httpStatus = 201;
    public $errorCode = 10001;
    public $msg = '参数错误';

}