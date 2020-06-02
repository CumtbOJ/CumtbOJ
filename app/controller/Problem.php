<?php
namespace app\controller;
use app\BaseController;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use app\model\hustoj_submit_record as Hs;
use think\Request;
/**
 * Problem类主要针对题目的相关操作
 */
class Problem {
    /**
     * 显示所有题目
     */
    public function showProblem(Request $request){
        $dataAll = Hp::showProblem()->select();
        return showSuccess($dataAll,"题目列表");
    }

    /**
     * 显示选定题目的内容
     */
    public function showProblemContent(Request $request){
        $pid = $request->data["pid"];
        if (Hp::find($pid)==Null) ApiException('没有此题目');
        $data=[
            'title' => Hp::title($pid)->value('title'), 
            'barInfo' => Hp::barInfo($pid)->find(),    
            'left' => Hp::left($pid)->find(),
            'right' => Hp::right($pid)->find(),
        ]; 
        return showSuccess($data,"题目信息");
    }

}