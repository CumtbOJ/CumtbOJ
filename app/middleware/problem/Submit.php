<?php
declare (strict_types = 1);

namespace app\middleware\problem;
use app\validate\SubmitRecord;
class Submit
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
            validate(SubmitRecord::class)->scene('register')->check($request->param());
        }catch(ValidateException $e){
            ApiException($e->getError());
        }
        return $next($request);
    }
}
