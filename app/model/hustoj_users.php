<?php
namespace app\model;
use think\Model;
class hustoj_users extends Model{
    //设置只读字段
    protected $readonly = ['username','id'];
    public function setPasswordAttr($value){
        return md5($value);
    }
}