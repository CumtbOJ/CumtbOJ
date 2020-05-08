<?php
namespace app\controller;
use think\Request;
class Show{
    public function index(Request $request){
        $name = "Mr.Lee";
        require 'test/1.php';//默认是在public目录下
        
    }
}