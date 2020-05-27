<?php
declare (strict_types = 1);

namespace app\middleware;
use app\Token;

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
        $request->id=''; 
        $token=new Token($request->header('token'));
        $request->token=$token;        
        if ($token->hasValue()){ //如果存在token, 判断token是否合法
            if (!$token->check())ApiException("无效token");
            $request->id=$token->getId();
        }
        \think\facade\Config::set(['id' => $request->id],'config');//将id存入配置中,目前只会这种办法设置全局变量
        
        //这里回调函数返回response对象
        return $next($request);
    }
}
