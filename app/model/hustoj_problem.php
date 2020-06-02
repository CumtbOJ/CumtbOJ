<?php
namespace app\model;
use think\Model;
use app\model\hustoj_users as Hu;
use app\model\hustoj_access as Ha;
use think\Request;
class hustoj_problem extends Model{
    protected $json=['tag','sample','recommond']; //json字段
    protected $pk = 'pid'; //主键
    /*public function __construct(){
        
    }*/
    public function users(){//关联users 表
        return $this->belongsToMany(Hu::class,Ha::class,'uid','pid');
    }
    public function getRateAttr($value, $data) { //通过率
        return $data['passNumber']."/".$data['totalNumber']; 
    }
    public function getMemoryLimitAttr($value){//内存限制
        return $value."MB";
    }
    public function getTimeLimitAttr($value){//时间限制
        return $value."s";
    }
    public function getStatusAttr($value,$data){//题目状态,1表示ac , 0表示没有ac, -1代表未登录
        $uid=\think\facade\Config::get('config.uid');//目前只会这样获取id 
        if ($uid==Null) return -1;
        $problem=\think\facade\Config::get('config.problem');
        foreach($problem as $one){
            if ($one['pid'] == $data['pid'])
                return 1;
        }
        return 0;
    }
    public function scopeShowProblem($query){ //题目列表信息
        $query->visible([
            'status',
            'pid',
            'title',
            'tag',
            'difficulty',
            'rate',
        ]);
    }
    public function scopeTitle($query,$pid){ //标题
        $query->where("pid",$pid)->visible(['title']);
    }
    public function scopeBarInfo($query,$pid){ //题目内容barInfo
        $query->where('pid',$pid)->visible([
            'totalNumber',
            'passNumber',
            'timeLimit',
            'memoryLimit',
        ]);
    }
    public function scopeLeft($query,$pid){ //题目内容左半部分
        $query->where("pid",$pid)->visible([
            'content',
            'inputFormat',
            'outputFormat',
            'sample',
            'hint',
        ]);
    }
    public function scopeRight($query,$pid){ //题目内容右半部分
        $query->where("pid",$pid)->visible([
            'provider',
            'difficulty',
            'status',
            'rate',
            'timeLimit',
            'memoryLimit',
            'tag',
            'historyScore',
            'recommond',
        ]);    
    }
}
