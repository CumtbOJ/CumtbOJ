<?php
namespace app\controller\lst;
use app\model\hustoj_problem as Hp;
use app\model\hustoj_users as Hu;
use think\Request;

class Problem{
    public function showProblem(Request $request){
        //dump($request);
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
        foreach($dataAll as &$data){            
            $users=Hp::find($data['number'])->users;
            foreach($users as $user){
            if ($user['id']==$request->id) 
                    $data['status']=1;
            }
        }
        if ($dataAll->isEmpty()){
            ApiException("题目列表为空");
        }else {
            return showSuccess($dataAll,"题目列表");
        }
    }
}