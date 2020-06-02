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
    Route::rule('iuo', 'user/register','get|post')->middleware(Register::class); //注册用户
    Route::rule('li','User/login','get|post')->middleware(Login::class);//登录用户
    Route::rule('lo','User/logout','get|post');//登出用户
})->allowCrossDomain();

Route::group(function(){  
    Route::rule('lp','Problem/showProblem','get|post'); //列出题目列表
    Route::rule('lpc','Problem/showProblemContent','get|post'); //列出题目内容
    Route::rule('sub','SubmitRecord/submit','get|post')->middleware(CheckUser::class); //提交题目
})->allowCrossDomain();

