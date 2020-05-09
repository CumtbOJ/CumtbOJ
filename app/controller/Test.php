<?php


namespace app\controller;


use think\facade\Db;

class Test
{
    public function Index()
    {
        return 'Index';
    }
    public function  find1()
    {
        $user_id = Db::table('users')->where('user_id','12')->find();
        return json($user_id);
    }
    public function conn()
    {
        return Db::name('users')->select();
    }

}