<?php
namespace app\model;
use think\Model;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_access as Ha;
class hustoj_users extends Model{
    //设置只读字段
    protected $readonly = ['username','id'];
    public function setPasswordAttr($value){
        return md5($value);
    }
    public function problem(){
        return $this->belongsToMany(Hp::class,Ha::class,'pid','uid');
    }
}