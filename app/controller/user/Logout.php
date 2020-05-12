<?php
namespace app\controller\user;

use app\model\hustoj_users as Hu;
use app\model\hustoj_problem as Hp;
use think\facade\Request;
class Logout{
    public function Index(){
        return 'index';
    }
    public function out(){

        $username = Request::param('username');
        $user = Hu::where("username",$username)->find();
        if ($user==Null || $user->status==0){
            ApiException('注销失败');
        }
        $user->status=0;
        $user->save();
        return showSuccess('','注销成功');
    }
}