<?php


namespace app\controller;


use app\model\Problem;
use app\model\Problem as ProblemModel;

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
        return '2';
        //return json($user);
    }
    public  function  insert()
    {
        $problem = new ProblemModel();
        $problem -> title= 'test';
        $problem -> description = 'test';
        $problem -> save();
    }
    public  function  getDifficulty()
    {
        $user = ProblemModel::find(1000);
        return  json($user->difficulty);
    }
}
