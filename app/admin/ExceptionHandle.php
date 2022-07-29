<?php

namespace app\admin;

use app\lib\exception\BaseException;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\HttpResponseException;
use think\exception\ValidateException;
use think\Response;
use Throwable;

/**
 * 应用异常处理类
 */
class ExceptionHandle extends Handle
{
    /**
     * 不需要记录信息（日志）的异常类列表
     * @var array
     */
    protected $ignoreReport = [
        HttpException::class,
        HttpResponseException::class,
        ModelNotFoundException::class,
        DataNotFoundException::class,
        ValidateException::class,
    ];

    /**
     * 记录异常信息（包括日志或者其它方式记录）
     *
     * @access public
     * @param Throwable $exception
     * @return void
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
//        return json(['msg' => '1111']);
        // 添加自定义异常处理机制
        $message = mb_convert_encoding($e->getMessage(), 'UTF-8', 'UTF-8,GBK,GBK2312,BIG5');
        if ($e instanceof BaseException) {
            if (env('APP_DEBUG')) {
                return network_result($e->msg, $e->httpStatus, $e->errorCode);
            } else {
                return network_result('系统内部错误', $e->httpStatus, $e->errorCode);
            }
        }elseif ($e instanceof \Exception) {
            if (env('APP_DEBUG')) {
                return network_result($message, $e->getCode());
            } else {
                return network_result('系统内部错误', $e->getCode());
            }

        }

        return parent::render($request, $e);
    }
}