<?php


namespace app\controller;

/*use app\model\Users as UsersModel;*/

use app\model\Hustoj as Hs;
use app\model\Hustoj_users as Hu;
use app\model\Hustoj_problem as Hp;
use think\facade\Db;
use think\facade\Request;
//use think\Request;
class Login
{
    public function Index()
    {
        return '1';
    }
    public  function  update()
    {
        //$problem = new ProblemModel("hustoj_problem");
        //$tmp = ProblemModel::where('id','1')->select();
        $user = Db::name("hustoj_users1")->where("id","1")->find();
        return 1;
  
    }
    public function get()
    {
        $username = Request::param('username');
        $password = Request::param('password1');
        $userTable = new Hu();
        $user = $userTable->where("username",$username)->find();
        $user->status = 1;
        $user->save();
        return json($user);
        //$user = Hs::select();
        //return json($user);
        //dump($user); return ;
        if ($user==Null){
            //return 0;
            return json(["msg" => $username.'用户名不存在',"code" =>123]);
        }
        //return json($user->select());
        //return $user["password"]." ".$password;
        if($user["password"]==$password){
            /*if ($user['status']==1){
                return json(['msg' => '你的账号已经在别处登录',"code" => 124]);
            }*/
            //dump($user);
            //echo json($user);
            $user->nick = "a2";
            $user->password = 1233;
            $user->status ='1';
            //$user->password=5;
            $user->save();
            return $user->getLastSql();
            dump($user);
            return ;
            //$user->update(["status" => 1]);
            return  json($user);
            return json(["msg" => '登录成功'.$user->status,"code" => 100]);            
        }else 
            return json(["msg" => '密码错误',"code" => 125]);

    }
    public function getParam()
    {
         $user = Request::param();
         return json($user);
    }
}