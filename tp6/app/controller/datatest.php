<?php

namespace app\controller;
use app\model\User;
//use think\model;
use app\BaseController;
use think\facade\Db;

class DataTest //extends BaseController
{
      public function index(){
        //$user=Db::name('user')->select();
        //$user=Db::connect('mysql')->table('tp_user')->select();
        //$user=Db::table('tp_user')->select();
        //$user = Db::connect('demo')->table('mqd')->select();
        //$user = Db::table('tp_user')->where('id',27)->findOrEmpt();
        //$user = Db::name('user')->select();
        //$user = Db::name('user')->where('id',27)->value('password');
        //$user = Db::connect('demo')->name('mqd')->select();
        //$user = Db::name('user')->column('password','username');
        /*$num=1;
        Db::table('tp_user')->chunk(3,function($users)use(&$num){
            dump($users);
            echo $num."<br>";
            $num++;
        });
        echo $num.'a';*/
        echo __FILE__;
        $users = Db::name('user')->cursor();
        //return ($user);
        //dump($user);

    }

    public function getUser(){
        $user = User::select();
        return json($user);
    }
    public function ins(){
        $data = [
            'username' => '斑', 
            'password' => '123', 
            'gender' => '男', 
            'email' => 'huiye@163.com', 
            'price' => 90, 
            'details' => '123'
        ];
        return Db::name("user")->replace()->insert($data);
    }
    public function change(){
        $data = [
            "username" => '小乔'
        ];
        //return Db::name('user')->where('id',302)->update($data);
        Db::name('user')->where('id',302)
                //->exp('email','upper(email)')
                ->exp('price','price+1')
                ->update();
    }
    public function del(){
        Db::name('user')->delete(304);
    } 
    public function time(){
        $user = Db::name('user')
        ->where('create_time','>','2018-4-5')
        ->select();
        return json($user);
    }
    public function poly(){
        //$result = Db::name('user')->count();
        /*
        $subResult = Db::name('two')->where("gender",'男')
        ->field('uid')->buildSql(true);
        $result = Db::name('one')
        ->where('id','exp','in'.$subResult)->select();
        */
        
        $result= Db::name('one')->where('id','in',function($query){
                      $query->name('two')->where('gender','男')->field('uid');
        })->select();
        

        //$result=Db::name("user")->select(); 
        //return Db::getLastSql();
        return json($result);

    }
    public function getter(){//19.数据库的事务和获取器
        /*Db::transaction(function(){
            Db::name('user')->where('id',19)
            ->save(['price'=>Db::raw('price+3')]);
            Db::name('user')->where('id',20)
            ->save(['price'=>Db::raw('price-3')]);
        });*/     
        /*Db::startTrans();
        try{
            Db::name('user')->where('id',19)
            ->save(['price'=>Db::raw('price+3')]);
            Db::name('user1')->where('id',20)
            ->save(['price'=>Db::raw('price-3')]);
        }catch(\Exception $e){
            echo '执行SQL失败';
            Db::rollback();
        }*/
        $user = Db::name('user')->
        withAttr('email',function($value,$data){
            return strtoupper($value);
        })->select();
        dump($user);
    }
    public function collection(){
        $user=Db::name('user')->select();
        dump($user->toArray());
    }
}