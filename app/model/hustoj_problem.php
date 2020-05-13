<?php
namespace app\model;
use think\Model;
class hustoj_problem extends Model{
    protected $json=['tag'];
    public function getRateAttr($value, $data) { 
        return $data['submitTime']."/".$data['ACTime']; 
    }
    public function getMemoryLimitAttr($value){
        return $value."MB";
    }
    public function getTimeLimitAttr($value){
        return $value."s";
    }
}
