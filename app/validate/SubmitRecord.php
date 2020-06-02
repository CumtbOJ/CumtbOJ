<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;
use app\model\hustoj_problem as Hp;
class SubmitRecord extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'pid|题目ID' => ['require','checkPid','number'],
        'code|代码' => ['require'],
        'language|编程语言' => ['require'],
    ];
    protected $scene = [
        'submit' => ['pid','code','language'],  
    ];
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    public function checkPid($value,$rule,$data){
        if (Hp::find($value)) return true;
        return "没有此题目";
    }
    public function sceneSubmit(){
        return $this;
    }

}
