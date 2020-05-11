<?php
namespace app\controller;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\facade\Request;
use think\facade\Db;
//这个文件测试用的,定制mysql图像化界面


class Database{
    public function showUser(){ //显示所有用户信息
        $user=Db::name("hustoj_users")->select();
        return json($user);
    }
    public function showProblem(){//显示所有题目信息
        $user=Db::name("hustoj_problem")->select();
        return json($user);
    }
    public function useMd5(){ //将所有密码进行md5加密
        $users=Hu::select();
        foreach($users as $user){
            $user->password=md5($user->password);
            $user->save();
        }
    }
    public function delUser(){//删除指定用户
        $user=Hu::where("username",Request::param("username"));
        $tp=$user->delete();
        if ($tp==1)return json("删除成功");
        else return json("删除失败");
    }
    public function chPassword(){//更改密码
        $username = Request::param('username');
        $password = Request::param('password');
        $password = md5($password);
        $user=Hu::where("username",$username)->find();
        if($user == Null)return json("更改失败");
        $user->password=$password;
        $user->save();
        return json("更改成功");
    }
}