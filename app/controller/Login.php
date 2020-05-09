<?php


namespace app\controller;


/*use app\model\Users as UsersModel;*/

use app\model\Hustoj as Hs;
use think\facade\Request;

class Login
{
    public function Index()
    {
        return '1';
    }
    public function get()
    {
        $username = Request::param('username');
        $password = Request::param('password');
        $user = Hs::find($username);
        dump($user);
        if ($user==Null){
            //return 0;
            return json(["msg" => $username.'用户名不存在',"code" =>123]);
        }
        if($user['password']==$tmp){
            if ($user['status']==1){
                return json(['msg' => '你的账号已经在别处登录',"code" => 124]);
            }
            Hs::update(["status" => 1]);
            return json(["msg" => '登录成功',"code" => 100]);            
        }else 
            return json(["msg" => '密码错误',"code" => 125]);

    }
    public function getParam()
    {
         $user = Request::param();
         return json($user);
    }
}