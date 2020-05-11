<?php


namespace app\model;


use think\Model;

class Problem extends Model
{
    protected $table = 'hustoj_problem';
    public function  getDifficultyAttr($value)
    {
        $arr = [ 0=>'简单', 1=>"中等", 2=>"困难"];
        return $arr[$value];
    }
}