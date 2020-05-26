<?php
namespace app\model;
use think\Model;
use app\model\hustoj_users as Hu;
use app\model\hustoj_access as Ha;
use think\Request;
class hustoj_problem extends Model{
    protected $json=['tag'];
    protected $pk = 'number';
    protected $req;
    /*public function __construct(){
        
    }*/
    public function users(){
        return $this->belongsToMany(Hu::class,Ha::class,'uid','pid');
    }
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
