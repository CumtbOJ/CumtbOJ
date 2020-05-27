<?php
namespace app\model;
use think\Model;
use app\model\hustoj_users as Hu;
use app\model\hustoj_access as Ha;
use think\Request;
class hustoj_problem extends Model{
    protected $json=['tag']; //json字段
    protected $pk = 'number'; //主键
    /*public function __construct(){
        
    }*/
    public function users(){//关联users 表
        return $this->belongsToMany(Hu::class,Ha::class,'uid','pid');
    }
    public function getRateAttr($value, $data) { //通过率
        return $data['submitTime']."/".$data['ACTime']; 
    }
    public function getMemoryLimitAttr($value){//内存限制
        return $value."MB";
    }
    public function getTimeLimitAttr($value){//时间限制
        return $value."s";
    }
    public function getStatusAttr($value,$data){//题目状态,1表示ac , 0表示没有ac, null代表未登录
        $id=\think\facade\Config::get('config.id');//目前只会这样获取id 
        if ($id==Null) return null;
        $problem=Hu::find($id)->problem;
        foreach($problem as $one){
            if ($one['number'] == $data['number'])
                return 1;
        }
        return 0;
    }

}
