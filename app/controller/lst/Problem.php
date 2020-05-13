<?php
namespace app\controller\lst;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\facade\Request;

class Problem{
    public function showProblem(){
        $dataAll=Hp::field([
            'status',
            'number',
            'title',
            'tag',
            'difficulty',
            'rate',
            'submitTime',
            'ACTime',
        ])->hidden(['submitTime','ACTime'])->select();
        if ($dataAll->isEmpty()){
            ApiException("题目列表为空");
        }else {
            return showSuccess($dataAll,"题目列表");
        }
    }
}