<?php
namespace app\model;
use think\Model;

class hustoj extends Model{
    //创建连接,可在config/database.php中修改连接
    protected $connection ;
    //数据表名
    Protected $name;
    public function __construct($name='users'){
        //parent::__construct($data);
        $this->name= $name;
        $this->connection = 'test2';
    }
}