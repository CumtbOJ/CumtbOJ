<?php


namespace app\controller\user;

use app\model\hustoj_users as Hu;
use app\validate\User;
use think\facade\Request;

class Login
{
    public function authenticate()//登录验证
    {
        $userData = Request::param();
        validate(User::class)->scene('login')->check($userData);   //调用验证类进行验证      
        $user=Hu::where('username',$userData['username'])->find(); //从数据库查找用户的信息, 类型为object
        $user->status ='1'; //更改状态
        $user->save();
        $data=[
            'token' => '123',
            'userdata' =>$user->hidden(['password','id']), //返回信息时隐藏密码,ID
        ]; 
        return showSuccess($data,'登录成功');
    }


    public function authenticateOld()
    {
        $username = Request::param('username');
        $password = Request::param('password');
        $password = md5($password);
        $userTable = new Hu();
        $user = $userTable->where("username",$username)->find();
        
        
        
        if ($user==Null){
            ApiException('用户名不存在');
        }
        if($user["password"]==$password){
            /*if ($user['status']==1){
                return json(['msg' => '你的账号已经在别处登录',"code" => 4]);
            }*/
            $user->status ='1';
            $user->save();
            $data=[
                'token' => '123',
                'userdata' =>$user
            ];
            return showSuccess($data,'登录成功');
        }else {
            ApiException('密码错误');
        }
    }
}