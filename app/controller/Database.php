<?php
namespace app\controller;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use app\controller\name;
use think\facade\Request;
use think\facade\Db;
use think\facade\Cache;
//这个文件测试用的,定制mysql图像化界面


class Database{
function deldir($dir=__DIR__) {
    $dir=$dir."/../../runtime/";
    $dh=@opendir($dir);
    dump($dir);
    while ($file=@readdir($dh)) {
        dump($file);
        if($file!="." && $file!="..") {
        $fullpath=$dir."/".$file;
        if(!is_dir($fullpath)) {
            unlink($fullpath);  
        } else {
            deldirall($fullpath);
        }
    }
}
@closedir($dh);
}

    public function showUser(){ //显示所有用户信息
        $user = Hu::where('id','>','-1')->select();
        return json($user);
    }
    public function showProblem(){//显示所有题目信息
        $problem = Hp::where('number','>','-1')->select();
        return json($problem);
    }
    public function useMd5(){ //将所有密码进行md5加密
        $users=Hu::select();
        foreach($users as $user){
            $user->password=md5($user->password);
            $user->save();
        }
    }
    public function delUser(){//清空用户
        $user=Hu::where("id",'>','-1');
        $tp=$user->delete();
        if ($tp>0)return json("清空完毕");
        else return json("清空失败,请检查是否已经清空");
    }
    public function delProblem(){//清空题库
        $user=Hp::where('number','>','-1');
        if (Hp::where('number','>','-1')->find() == Null) 
            return json("题目已空,无法再次清空");
        $tp=$user->delete();
        if ($tp>0)return json("清空完毕");
        else return json("清空失败");
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
    public function insProblem(){ //自动添加题目
        $num=Request::param("num");
        for($i=1;$i<=$num;$i++){
            $problem=new Hp();
            $tag=["数据结构","贪心","搜索","动态规划","二分","数论","图论"];
            $submitTime = mt_rand(0,50);
            $data=[
                'difficulty' => mt_rand(0,2),
                'title' => 'test'.$i,
                'tag' => [$tag[mt_rand(0,1)],$tag[mt_rand(2,3)],$tag[mt_rand(4,6)]], 
                'submitTime' => $submitTime,
                'ACTime' => mt_rand(0,50)+$submitTime,
            ];
            $problem->save($data);
            //return json($problem->difficulty);
        }
        return json("添加成功");
    }
    public function insUser(){
        $num=Request::param("num");
        $name=new name();
        for($i=1;$i<=$num;$i++){
            $user=new Hu();
            $data=[
                'username' => "test".$i,
                'nick' => $name->randnick(),
                'password' => md5($i),
                'school' => $name->randschool(),
                'email' => mt_rand(1000,10000)."@163.com", 
            ];
            $user->save($data);
            //dump($user);
        }
        return json("成功添加".$num."个用户,密码是用户名的数字部分");
    }
    public function find(){
        $problem = Hp::where('number','<','100000')->find();
        return json($problem);
    }
}