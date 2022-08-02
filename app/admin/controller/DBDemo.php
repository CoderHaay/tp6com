<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\Db;
use app\admin\model\User;
use app\admin\model\Account;

class DBDemo extends BaseController
{
    public function index()
    {
        // 增
//        $res = Db::name('user')->insert([
//            'name' => '王四',
//            'phonenum' => 12333333333
//        ]);
//        echo $res;
        // 改
//        $res = Db::name('user')->where('id', 25)->update([
//            'name' => '王四25',
//            'phonenum' => 33333333333
//        ]);
        // 查 返回二维数组
//        $res = Db::name('user')->select()->toArray();
        // 查 返回一维数组
//        $res = Db::name('user')->find('2');

        // 删 delete（"主键"）
//        $res = Db::name('user')->delete('25');

        // *********************************************************** //
        // 增
//        $user = new User;
//        $user->name = '王四2';
//        $user->phonenum = 13300000000;
//        $res = $user->save();

        // 改
//        $user = User::find(3);
//        $user->name = '张哈哈';
//        $res = $user->save();
        // 删除
//        $user = User::find(26);
//        $res =$user->delete();
        //查询
        $res = User::find(4)->toArray();
        dump($res);

//        $res = Account::where('username', 'admin', 'password': 123456)->toArray();
//        dump($res);

//        $list = User::select([1,2,3])->toArray();
//        dump($list);
    }
}