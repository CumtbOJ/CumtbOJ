<?php


namespace app\controller;

/*use app\model\Users as UsersModel;*/

use app\model\Hustoj as Hs;
use app\model\Hustoj_users as Hu;
use app\model\Hustoj_problem as Hp;
use think\facade\Db;
use think\facade\Request;
//use think\Request;
class Login
{
    public function Index()
    {
        return 'index';
    }
    public function authenticate()
    {
        $username = Request::param('username');
        $password = Request::param('password');
        $password = md5($password);
        $userTable = new Hu();
        $user = $userTable->where("username",$username)->find();
        if ($user==Null){
            return json(["msg" => $username.'用户名不存在',"code" =>123]);
        }
        if($user["password"]==$password){
            if ($user['status']==1){
                return json(['msg' => '你的账号已经在别处登录',"code" => 124]);
            }
            $user->status ='1';
            $user->save();
            return json(["msg" => '登录成功'.$user->status,"code" => 100]);            
        }else 
            return json(["msg" => '密码错误',"code" => 125]);

    }
}