<?php


namespace app\controller;


use app\model\Problem;
use app\model\Problem as ProblemModel;
use app\model\Users;
use think\facade\Db;

class DataModel
{
    public  function  index()
    {
        //$user = Db::table('db')->select();
        return '1';
        //return json($user);
    }
    public  function  test()
    {
        //$user = Db::table('db')->select();
        echo 2;
        $user = Db::connect('mysql')->table('hustoj_users')->select();
        return json($user);
        //return json($user);
    }
    public  function  insert()
    {
        $problem = new ProblemModel("hustoj_problem");
        $problem -> name= 'test';
        $problem -> level = 'test';
        $problem -> save();
    }
    public  function  select()
    {
        /*$problem = new ProblemModel();
        $tmp = ProblemModel::where('id','1')->select();*/
        $tmp = ProblemModel::where('id','1')->select();
        return json($tmp);
    }
    public  function  update()
    {
        //$problem = new ProblemModel("hustoj_problem");
        //$tmp = ProblemModel::where('id','1')->select();
        $tmp = Users::update([
                'status' => true
            ],['id'=>2]);
        //return $tmp->getLastSql();
        return json($tmp);
        //return json($tmp);
    }
    public  function  getDifficulty()
    {
        $user = ProblemModel::find(1000);
        return  json($user->difficulty);
    }
}
