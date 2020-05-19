<?php
namespace app\controller\user;

use app\model\hustoj_users as Hu;
use app\validate\User;
use think\facade\Request;
class Logout{
    public function out(){
        $userData=Request::param();
        validate(User::class)->scene('logout')->check($userData);
        $user=Hu::where('username',$userData['username'])->find();
        $user->status=0;
        $user->save();
        return showSuccess("","注销成功");
    }
    public function outOld(){
        $username = Request::param("username");
        $user = Hu::where("username",$username)->find();
        if ($user==Null || $user->status==0){
            ApiException("注销失败");
        }
        $user->status=0;
        $user->save();
        return showSuccess("","注销成功");
    }
}