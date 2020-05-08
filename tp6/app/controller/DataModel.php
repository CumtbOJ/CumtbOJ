<?php
namespace app\controller;
use app\model\User as UserModel;
use think\facade\Db;
class DataModel{
    public function index(){
        $user=UserModel::select();
        return json($user);
    }
    public function field(){
        //UserModel::select();
        //Db::name('user')->select();
        $user=new UserModel();
        echo $user->getUsername('27');
    }
    public function insert(){
        $user = UserMOdel::create([
            'username' => '李红', 
            'password' => '123', 
            'gender' => '男', 
            'email' => 'libai@163.com', 
            'price' => 100, 
            'details' => '123', 
            'uid' => 1011
        ],['username','password','email','details'],false);
        echo $user->id;
    }
    public function getAttr(){//26.模型的获取器和修改器
        //$user =UserModel::find($id);
        //$user->status;
        //$user->statusNum;
        //$result=$user->getData('status');
        $user = UserModel::WithAttr('status',function($value){
            $status = 
            [
                -3=>'未知',
                -1=>'删除', 
                0=>'禁用', 
                1=>'正常', 
                2=>'待审核',
                3=>'溢出'
            ];
            return $status[$value];
        })->select();
        return json($user);
    }
    public function softDel(){
        UserModel::find(302)->delete();
    }
}
