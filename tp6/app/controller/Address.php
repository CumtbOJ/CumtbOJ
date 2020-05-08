<?php
namespace app\controller;
use think\annotation\Route;
use app\facade\Test;
class Address{
    public function index(){

    }
    /*
     * @param $id
     * @return string
     * @route("ds/:id");  
    */
    public function details($id){
         return "详情id".$id;
    }
    public function read($name){
        return '读取'.$name;
    }
    public function hello(){
        return Test::hello("world");
    }
} 