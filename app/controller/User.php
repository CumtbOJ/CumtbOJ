<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\BaseController;
use app\Token;
use app\model\hustoj_users as Hu;

class User extends BaseController
{
    /**
     * 调用全局中间件验证token,没有token这一步自动跳过
     * 验证注册信息, 交给register中间件
     * 创建账号
     * 返回用户信息
     */ 
    public function register(Request $request){//注册用户
        $userdata=$request->param();
        $user=Hu::create($userdata)->hidden(['password']);
        $token=new token('',(string)$user['id']);
        $data=[
            'userdata' => $userdata,
            'token' => $token->build(3600),
        ];
        return(showSuccess($data,'注册成功'))   ;
    }

    /**
     * 验证token, 交给全局中间件
     * 验证登录信息, 交给user中间件
     * 创建token, 生成一个随机函数
     * 将token存入cache, 存入id即可, 设置token有效时间
     * 返回用户信息
     */
    public function login(Request $request){//用户登录
        $user=Hu::where("username",$request->param('username'))->find(); //通过用户名查找用户
        $user->status=1; 
        $user->save(); //改变状态

        $token=new Token('',(string)$user['id']); 
        $data=[ 
            'token' => $token->build('3600'),
            'userdata' => $user->hidden(["password"]),
        ];
        return showSuccess($data,'登录成功');
    }
    /** 
     * 验证token
     * 验证信息
     * 删除token
     * 返回信息
     */
    public function logout(Request $request){//
        $user=Hu::find($request->id);
        if($user->status==0) ApiException("",'用户未登录');
        $user->status=0;
        $user->save();
        $request->token->delete();
        return showSuccess("",'注销成功');
    }
}
