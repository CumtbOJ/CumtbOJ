<?php
namespace app\controller;
//use think\Request;
use think\facade\Request;
class Rely{
    /*
    public function __construct(Request $request){//依赖注入
        $this->request = $request;
    }
    public function index(Request $request){
        return $request->param('username');
    }*/
    public function get(){
        //return $this->request->param('username');
        //dump(Request::has('name','get'));
        dump(Request::param());
    }

}