<?php
declare (strict_types = 1);

namespace app\middleware\User;
use app\validate\User;
use think\exception\ValidateException;

class Register
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
        try{
            validate(User::class)->scene('register')->check($request->param());
        }catch(ValidateException $e){
            ApiException($e->getError());
        }
        return $next($request);
    }
}
