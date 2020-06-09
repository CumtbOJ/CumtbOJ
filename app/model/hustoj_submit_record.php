<?php
declare (strict_types = 1);

namespace app\model;

use think\Model;

/**
 * @mixin think\Model
 */
class hustoj_submit_record extends Model
{
    //
    public function scopeAll($query){
        $query->where('id','>',-1);
    }
    public function scopeUser($query,$uid){
        $query->where('uid',$uid);
    }
}
