<?php
namespace app\model;
use think\Model;
class hustoj_users extends Model{
    //设置只读字段
    protected $readonly = ['username'];
}