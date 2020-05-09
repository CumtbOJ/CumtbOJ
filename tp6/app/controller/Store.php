<?php
namespace app\controller;
use think\facade\Cache;
use think\facade\Request;
use think\facade\Session;
use think\facade\View;

class Store{
    public function redis(){
        Cache::set('user','Mr.Lee',3600);
        dump(Cache::get('user'));
        dump(Cache::has('user'));
        Cache::inc('num',3);
        dump(Cache::get('num'));
        Cache::set ('arr',[1,2,3]);
        Cache::push('arr',4);
        dump(Cache::get('arr'));
        //Cache::clear();
        Cache::tag('tag')->set('age',100);
        dump(Cache::get('age'));
        Cache::tag('tag')->clear();
    }
    public function upload(){
        return  View::fetch('upload');
   
    }
    
}