<?php
// 应用公共文件

function success($data = [], $msg = "success")
{
    return network_result($msg, 200, 10000, $data);
}

function fail($data = [], $msg = "fail")
{
    return network_result($msg, 200, 10000, $data);
}

/**
 * @description: 其他状态
 * @param {*} $msg
 * @param {*} $data
 * @return {*}
 */
function network_result($msg, $httpStatus = 200, $code = 10000, $data = [])
{
    $data = [
        'code' => $code,
        'msg' => $msg,
        'data' => $data,
    ];
    return json($data, $httpStatus);
}


function get_client_ip()
{
    $ip = false;
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = FALSE;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!preg_match("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}