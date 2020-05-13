<?php

namespace app\controller\user;

use app\model\hustoj_users as Hu;
use app\model\Hustoj_problem as ProblemModel;
use think\Request;
use think\facade\Db;

class Register
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function insUserOne()
    {//注册一个用户
        $userTable = new Hu();
        //判断用户名是否重复, 用户名、昵称、密码是否为空

        $username = $this->request->param("username");  //获取用户
        $nick = $this->request->param("nickname");   //获取用户昵称
        $password = $this->request->param("password");   //获取密码
        $password = md5($password); //md5加密
        $school = $this->request->param("school");   //获取学校
        $email = $this->request->param("email");     //获取邮箱

        $tp1 = $userTable->where("username", $username)->find(); //在数据库中查找用户名是否已经被注册
        $tp2 = $userTable->where("email", $email)->find(); //在数据库中查找邮箱是否已经被注册
        if ($tp1 == NUll) { //如果用户名没有被注册,就继续判断
            if ($tp2 != NULL) {
                ApiException('邮箱已存在');
            }
            $userTable->save([ //没有问题就储存用户名
                'username' => $username,
                'nick' => $nick,
                'password' => $password,
                'school' => $school,
                'email' => $email,
            ]);
            $data = [
                'token' => '123',
                'userdata' => [
                    'username' => $username,
                    'nickname' => $nick,
                    'school' => $school,
                    'email' => $email,
                ],
            ];
            return showSuccess($data,'注册成功');

        } else {//用户名已经注册,返回错误
            ApiException('用户名已存在');
        }

    }

}
