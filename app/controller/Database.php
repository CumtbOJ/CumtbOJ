<?php
namespace app\controller;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
class Database{
    public function index(){
        $user = Hp::where('id','1')->find();
        $user -> status = 2;
        $user -> index = "123";
        $user -> save();
        return json($user);
    }
    public function index2(){
        $user = Hu::where('username','t1')->find();
        $user-> status = 1;
        $user -> save() ;
        return json($user);
    }
}