<?php
namespace app\model;
use think\Model;

class Hustoj extends Model{
    //创建连接,可在config/database.php中修改连接
    protected $connection ='mysql';
    //数据表名
    Protected $name='hustoj_users';
    public function __construct($name='hustoj_users'){
        //parent::__construct($data);
        $this->name= $name;
       	$this->connection = 'mysql';
    }
}
