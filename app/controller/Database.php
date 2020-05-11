<?php
namespace app\controller;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\facade\Db;
class Database{
    public function showUser(){
        $user=Db::name("hustoj_users")->select();
        return json($user);
    }
    public function showProblem(){
        $user=Db::name("hustoj_problem")->select();
    }
}