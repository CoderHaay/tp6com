<?php
// 应用公共文件

/**
 * @description: 其他状态
 * @param {*} $msg
 * @param {*} $data
 * @return {*}
 */
function network_result($msg,$httpStatus = 200, $code = 10000, $data = [])
{
    $data = [
        'code' => $code,
        'msg' => $msg,
        'data' => $data,
    ];
    return json($data, $httpStatus);
}