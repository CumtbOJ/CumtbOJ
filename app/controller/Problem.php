<?php
namespace app\controller;
use app\BaseController;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\Request;
/**
 * Problem类主要针对题目的相关操作
 */
class Problem extends BaseController{
    /**
     * 显示所有题目
     */
    public function showProblem(Request $request){
        $dataAll=Hp::where('number','>','-1')->visible([
            'status',
            'number',
            'title',
            'tag',
            'difficulty',
            'rate',
        ])->select();
        return showSuccess($dataAll,"题目列表");
    }

    /**
     * 显示选定题目的内容
     */
    public function showProblemContent(Request $request){
        $number = $request->param("number");
        $left=Hp::where("number",$number)->visible([
                'title',
                'content',
                'inputFormat',
                'outputFormat',
                'sampleInput',
                'sampleOutput',
                'hint',
            ])->find();
        $right=Hp::where("number",$number)->visible([
            'provider',
            'difficulty',
            'status',
            'rate',
            'timeLimit',
            'memoryLimit',
            'tag',
        ])->find();     

        if ($left == Null)
            ApiException("没有此题目");
        $data=['left' => $left , 'right' => $right];   
        return showSuccess($data,"跳转成功");

    }
}