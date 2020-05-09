<?php


namespace app\controller;


/*use app\model\Users as UsersModel;*/

use app\model\Users;
use think\facade\Request;

class Login
{
    public function Index()
    {
        return '1';
    }
    public function get()
    {
        $tmp = Request::param('username');
        $user = Users::find($tmp);
        $tmp = Request::param('password');
        if($user['password']==$tmp)
            return json($user);
        return json($tmp);
    }
    public function getParam()
    {
         $user = Request::param();
         return json($user);
    }
}