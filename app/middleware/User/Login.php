<?php
declare (strict_types = 1);

namespace app\middleware\User;

//use app\validate\User;
use think\exception\ValidateException;

class Login
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)// 检测登录
    {
        try{
            validate(\app\validate\User::class)->scene('login')->check($request->param());
        }catch(ValidateException $e){
            ApiException($e->getError());   
        }
        return $next($request);
    }
}
