<?php
namespace app\controller;
use app\model\One;
use app\facade\Test;
class Inject{
    protected $one;
    public function __construct(One $one){
        $this->one=$one;
    }
    public function index(){
        return $this->one->username;
    }
    public function bind(){
        //bind('one','app\model\One');
        //$one = app('one',[['file']],true);
        //return app('one')->username;
        //return (new One())->username;
        return app('app\model\One')->username;
    }

}