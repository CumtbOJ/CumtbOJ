<?php


namespace app\controller;


use app\model\hustoj_users as Hu;
use app\model\hustoj_problem as Hp;
use think\facade\Db;
use think\facade\Request;

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
            return json(["msg" => '用户名不存在',"code" =>1]);
        }
        if($user["password"]==$password){
            if ($user['status']==1){
                return json(['msg' => '你的账号已经在别处登录',"code" => 4]);
            }
            $user->status ='1';
            $user->save();
            $data=[
                'token' => '123',
                'userdata' =>[
                    'username' => $user->username,
                    'nickname' => $user->nick,
                    'school' => $user->school,
                    'email' => $user->email,
                    'thers' =>[
                        "others" => '1',
                    ],
                ],
            ];

            return json(["msg" => '登录成功',"code" => 3,"data" => $data]);            
        }else 
            return json(["msg" => '密码错误',"code" => 2]);

    }
}