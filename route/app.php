<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::get('hello/:name', 'index/hello');



Route::group(function () {  //user组
    Route::rule('iUO', 'user.Register/insUserOne','get|post'); //注册用户
    Route::rule('li','user.Login/authenticate','get|post');//登录用户
    Route::rule('lo','user.Logout/out','get|post');//登出用户
});

Route::group(function(){
    Route::rule('lp','lst.Problem/showProblem','get|post');
    Route::rule('lpc','lst.ProblemContent/showProblemContent','get|post');
    
});

