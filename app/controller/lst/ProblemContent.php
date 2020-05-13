<?php
namespace app\controller\lst;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\facade\Request;

class ProblemContent{
    public function showProblemContent(){
        $number = Request::param("number");
        $left=Hp::where("number",$number)->field([
                'title',
                'content',
                'inputFormat',
                'outputFormat',
                'sampleInput',
                'sampleOutput',
                'hint',
            ])->select();
        $right=Hp::where("number",$number)->field([
            'provider',
            'difficulty',
            'status',
            'rate',
            'timeLimit',
            'memoryLimit',
            'tag',
            'ACTime',
            'submitTime'
        ])->hidden(['submitTime','ACTime'])->select();     
        //  return json($left);
        $data=['left' => $left['0'] , 'right' => $right['0']];   
        if ($left->isEmpty()){
            return ApiException("没有此题目");
        }else {
            return showSuccess($data,"跳转成功");
        }
    }
}