<?php
declare (strict_types = 1);

namespace app\controller;
use app\BaseController;
use think\Request;
use app\model\hustoj_submit_record as Hs;
class SubmitRecord extends BaseController
{
    /**
     * 用户提交代码
     */
    public function submit(Request $request){
        $hs = new Hs();
        $data = $request->data;
        $data['score'] = 0;
        $hs->save($data);
        return showSuccess($data,'提交成功');
    }
    public function allRecord(Request $request){
        $data=Hs::all()->select();
        return showSuccess($data,'所有提交记录');
    }
    public function oneUserRecord(Request $request){
        $suid=($request->data)['suid'];
        $data=hs::user($suid)->select();

        return showSuccess($data,'id为'.$suid.'的用户：提交记录');
    }
}
