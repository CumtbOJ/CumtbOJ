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



Route::group('user',function () {  //user组
    Route::rule('iuo', 'user/Register','get|post')->middleware(Register::class); //注册用户
    Route::rule('li','user/Login','get|post')->middleware(Login::class);//登录用户
    Route::rule('lo','user/Logout','get|post');//登出用户
})->allowCrossDomain();

Route::group(function(){  
    Route::rule('lp','lst.Problem/showProblem','get|post'); //列出题目列表
    Route::rule('lpc','lst.ProblemContent/showProblemContent','get|post'); //列出题目内容
    
})->allowCrossDomain();

