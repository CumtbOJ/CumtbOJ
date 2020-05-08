<?php
namespace app\model;
use think\Model;

class User extends Model{
    public function profile(){
        return $this->hasone(Profile::class,'user_id','id');
    }
    //设置数据库
    //protected $connection = 'grace';   
    /*
    //设置主键
    protected $pk = 'id';

    //设置表
    protected $table ='tp_user';
  
    //初始化操作
    protected static function init(){
        parent::init();
    }
    */
    /*protected $schema = [
        'id' => 'int',
        'username' => 'string',
        'password' => 'string',
        'gender' => 'string',
        'email' => 'string',
        'price' => 'float',
        'details' => 'string',
        'uid' => 'int',
        'status' => 'int',
        'list' => 'string',
        'delete_time' => 'datetime',
        'create_time' => 'datetime',
        'update_time' => 'datetime',
        '_pk' => 'id',
        '_autoinc' => 'id',
    ];*/
    /*
    public function getUsername($id){
        $obj=$this->find($id);
        return $obj->getAttr('username');
    }
    public function getStatusAttr($value){//获取器
        $arr=[-1=>'删除', 0=>'禁用', 1=>'正常', 2=>'待审核'];
        return $arr[$value];
    }
    public function getStatusNumAttr($value,$data){//虚拟获取器
        return $data['status'];
    }
    public function setEmailAttr($value){//修改器
        return strtoupper($value);
    }
    protected $autoWriteTimestamp = true;
    //use SoftDelete;
    //protected $deleteTime ='delete_time';
    */
}