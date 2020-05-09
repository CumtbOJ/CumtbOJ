<?php
namespace app\controller;
use app\model\hustoj as hs;
use think\Request;
class Insert{
    protected $request;
    public function __construct(Request $request){
        $this->request=$request;
    }

    public function insProblem(){
        $user=new hs("problems");
        $datas=[
            [
                'name' => 'A+B Promblem',
                'index' => '',
                'level' => '入门',
                'passrate' => '0.53',
            ],
            [
                'name' => '超级玛丽游戏',
                'index' => '',
                'level' => '入门',
                'passrate' => '0.73',
            ],
            [
                'name' => '过合卒',
                'index' => 'NOIP普及组',
                'level' => '普及-',
                'passrate' => '0.42',
            ]
        ];
        $user->saveAll($datas);
    }
    public function insUser(){
        $userTable=new hs("users");
        $allData=[
            [
                "username" => 'oyjy',
                "nick" => '欧阳小可爱',
                "password" => 'oyjy123',
            ],
            [
                "username" => 'jhw',
                "nick" => '计总',
                "password" => 'jhw123',
            ],
            [
                "username" => 'mqd',
                "nick" => '围棋少年',
                "password" => 'mqd123',
            ],
        ];
        foreach($allData as $userData){
            $tp =$userTable->where('username',$userData['username'])->find();
            if ($tp==Null){
                $userTable->save($userData);
                dump($userData);
                echo("添加成功");
            }else 
                echo $userData['username']."用户名已经存在<br>";
        }
    }
    public function insUserOne(){//注册一个用户
        $userTable=new hs("hustoj_users");
        //return json($this->request->method());
		//判断用户名是否重复, 用户名、昵称、密码是否为空
        $tp = $userTable->where("username",$this->request->param('username'))->find(); //在数据库中查找用户名是否已经被注册
        $username = $this->request->param("username"); 
        $nick = $this->request->param("nick");
        $password = $this->request->param("password");

        if ($tp==NUll){ //如果用户名没有被注册,就继续判断
            if ($username == Null) return json(['msg' => "用户名不能为空",'code' => '111']); //判断用户名是否为空
            if ($nick == Null) return json(['msg' => "昵称不能为空",'code' => '112']); //判断昵称是否为空
            if ($password == Null) return json(['msg' => '密码不能为空','code' => '113']); //判断密码是否为空
            //dump($this->request->param());
            $userTable->save([ //没有问题就储存用户名
                'username' => $username,
                'nick' => $nick,
                'password' => $password,
            ]);
            return json(['meg' => "注册成功",'code' => '109']);

        }else{//用户名已经注册,返回错误
            return json(['meg' => "用户名已存在",'code' => '110']);
		}
    }

}
