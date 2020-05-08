<?php 
namespace app\controller;
use app\model\User as UserModel;
use think\facade\Db;

class grace{
    public function index(){
        $user= UserModel::find(21);
        return json($user->profile);
        return $user->profile->hobby;
    }
    public function change(){
        $user=UserModel::find(19);
        $user->profile->save([
            'hobby' => '嘿嘿嘿'   
        ]);
        return json($user->profile);
    }
}