<?php


namespace app\controller;


use app\model\Problem;
use app\model\Problem as ProblemModel;
use app\model\Hustoj_users as Hu;
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
    public function status(){
        $user = Hu::where('username','t1')->find();
        $user-> status = 1;
        $user -> save() ;
        return json($user);
    }
}
