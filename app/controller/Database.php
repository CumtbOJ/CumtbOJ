<?php
namespace app\controller;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use app\model\hustoj_access as Ha;
use app\controller\name;
use think\facade\Request;
use think\facade\Db;
use think\facade\Cache;
//这个文件测试用的,定制mysql图像化界面


class Database{
    public function delDir($dir=__DIR__."/../../runtime") {
        $dh=@opendir($dir);
        //dump($dir);
        //unlink($dir);
        
        while ($file=@readdir($dh)) {
            //dump($file);
            if($file!="." && $file!="..") {
                $fullpath=$dir."/".$file;
                if(!is_dir($fullpath)) {
                    @unlink($fullpath);  
                } else {
                    self::delDir($fullpath);
                }
            }  
        } 
        @rmdir($dir);
        return json("清理完毕");
    }


    public function showUser(){ //显示所有用户信息
        $user = Hu::where('id','>','-1')->select();
        return json($user);
    }
    public function showProblem(){//显示所有题目信息
        $problem = Hp::where('number','>','-1')->select();
        return json($problem);
    }
    public function showAccess(){//显示所有access信息
        $access = Ha::where('id','>','-1')->select();
        return json($access);
    }
    public function delUser(){//清空用户
        $sql = 'TRUNCATE `' .'hustoj_users`';
        Hu::query($sql);
        return json("清除成功");
    }
    public function delProblem(){//清空题库
        $sql = 'TRUNCATE `' .'hustoj_problem`';
        Hu::query($sql);
        return json("清除成功");
    }
    public function delAccess(){//清空access
        $sql = 'TRUNCATE `' .'hustoj_access`';
        Hu::query($sql);
        return json("清除成功");
    }
    public function delAll(){
        $this->delUser();
        $this->delProblem();
        $this->delAccess();
        return json('清除成功');
    }
    public function chPassword(){//更改密码
        $username = Request::param('username');
        $password = Request::param('password');
        $user=Hu::where("username",$username)->find();
        if($user == Null)return json("更改失败");
        $user->password=$password;//
        $user->save();
        return json("更改成功");
    }
    public function insProblem(){ //自动添加题目
        $num=Request::param("num");
        $num=$num?$num:10;
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
                'timeLimit' => 1.5,
                'memoryLimit' => 256,
                'content' => '这是题目描述',
                'inputFormat' => '这是输入格式',
                'outputFormat' => '这是输出格式',
                'sampleInput' => '这是输入样例',
                'sampleOutput' => '这是输出样例',
                'hint' => '这是提示',
                'provider' => '这是题目提供者',
            ];
            $problem->save($data);
            //return json($problem->difficulty);
        }
        return json("添加成功".$num."个题目");
    }
    public function insUser(){//自动添加用户
        $num=Request::param("num");
        $num=$num?$num:10;    
        $name=new name();
        for($i=1;$i<=$num;$i++){
            $user=new Hu();
            $data=[
                'username' => "test".$i,
                'nickname' => $name->randnick(),
                'password' => $i,
                'school' => $name->randschool(),
                'email' => mt_rand(10000,100000)."@163.com", 
            ];
            $user->save($data);
            //dump($user);
        }
        return json("成功添加".$num."个用户,密码是用户名的数字部分");
    }
    public function insUserProblem(){//自动添加用户刷题数量
        $user = Hu::column('id');
        $problem = Hp::column('number');
        $userSize=sizeof($user);
        $problemSize=sizeof($problem);
        foreach($user as $uid){
            $arr=range(0,$problemSize-1);
            shuffle($arr);
            $randSize=mt_rand(0,5);
            for($i=0;$i<$randSize;$i++){
                Ha::create([
                    'pid' => $problem[$arr[$i]],
                    'uid' => $uid,
                ]);
            }
        }
        return json('添加成功');
    }
    public function insAll(){
        $this->delAll();
        $this->insUser();
        $this->insProblem();
        $this->insUserProblem();
        return json("自动添加完毕");
    }
    public function test(){
    }
    public function many(){
        $user = Hu::find(3);
        $problem = $user->problem;
        //$problem = $user->problem()->where('number','>',5)->select();
        dump($problem);
    }

    
}