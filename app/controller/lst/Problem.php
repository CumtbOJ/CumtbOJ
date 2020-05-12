<?php
namespace app\controller\lst;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\facade\Request;

class Problem{
    public function showProblem(){
        $dataAll=Hp::where("number",'>','-1')->select();
        if ($dataAll == Null){
            return json(['code' => '1']);
        }else {
            return json(['code' => '0' , 'form' => $dataAll]);
        }
    }
}