<?php
namespace app\model;
use think\Model;
class One extends Model{
    public $username='Mr.Lee';
    public function __construct(array $data = []){
        parent::__construct($data);
        print_r($data);
    }
}