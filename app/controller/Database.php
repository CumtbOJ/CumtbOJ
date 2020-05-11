<?php
namespace app\controller;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
class Database{
    public function showUser(){
        Db::name("hustoj_users");
    }
}