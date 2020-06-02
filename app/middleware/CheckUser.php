<?php
declare (strict_types = 1);

namespace app\middleware;

class CheckUser
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
        //halt($request->data);
        if ($request->data['uid']==Null)
            ApiException('请先登录');
        return $next($request);
    }
}
