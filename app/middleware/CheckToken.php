<?php
declare (strict_types = 1);

namespace app\middleware;
use app\Token;
use app\model\hustoj_users as Hu;
class CheckToken //检查token的正确性, 以设置为全局中间件 , 可在 app\middleware 中修改
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        $tokenValue=$request->header('token');
        if($tokenValue==Null ) $tokenValue=$request->param('token');
        $token=new Token($tokenValue);
        $uid=$token->getId();
        //halt($token);
        $data=[
            'token' => $token, 
            'uid' => $uid,
        ];
        $request->data=array_merge($data,$request->param()); //将前端信息全部存放到data数组.
        //halt($request->data);
        if ($token->hasValue() && !$token->check()) // 如果有token就验证token
            ApiException("无效token",10000);

        $user=Hu::find($uid);
        if ($user) 
            $user=$user->problem;
        \think\facade\Config::set([
            'uid' => $uid,
            'problem' => $user,
        ],'config');//将uid存入配置中,目前只会这种办法设置全局变量

        return $next($request);
    }
}
