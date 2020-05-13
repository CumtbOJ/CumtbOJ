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
            ])->find();
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
        ])->hidden(['submitTime','ACTime'])->find();     

        if ($left == Null)
            ApiException("没有此题目");
        $data=['left' => $left , 'right' => $right];   
        return showSuccess($data,"跳转成功");

    }
}