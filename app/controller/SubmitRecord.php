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
}
