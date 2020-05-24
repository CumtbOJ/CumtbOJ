<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;
use app\model\hustoj_users as Hu;
use think\facade\Request;
class user extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'username|用户名' => ['require','max' => '20',],
        'password|密码' => ['require'],
        'nickname|昵称' => ['require','max' => '20'],
        'email|邮箱' => ['require','email'],
    ];

    protected $scene=[
        'register' => ['username','password','nickname','email'],
        'login' => ['username'],
        'logout' => ['username'],
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        
    ];
    public function checkHas($value){//用户名存在报错
        if (Hu::where('username',$value)->find()==Null)
            return true;
        return '用户名已存在';
    }
    public function checkNotHas($value){ //用户名不存在报错
        if (Hu::where('username',$value)->find()==Null)
            return '用户名不存在';
        return true;
    }
    public function checkPassword($value,$rule,$data){ // 验证密码是否正确
        //dump($value);
        //dump($data);return 1;
        $password = Hu::where('username',$data['username'])->value('password');
        if (md5($value)==$password)return true;
        return "密码错误";
    }
    public function checkStatus($value){//验证状态
        if (Hu::where('username',$value)->value('status')==0) 
            return '用户已经注销';
        return true;
    }

    public function sceneRegister(){//注册场景
        $data = $this->append('username','checkHas'); 
        return $data;   
    }
    public function sceneLogin(){//登录场景
        $data = $this->only(['username','password'])->append([
            'username' => 'checkNotHas',
            'password' => 'checkPassword',
        ]);
    }
    public function sceneLogout(){//注销场景
        $data = $this->only(['username'])->append([
            'username'=>'checkNotHas',
            'username'=>'checkStatus',
        ]);
    }

}
