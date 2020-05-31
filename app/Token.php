<?php
namespace app;
use think\facade\Cache;
/**
 * token类提供创建、检查、删除token
 */
class Token{
    protected $value;
    protected $id;
    public function __construct($value="",$id=""){
        $this->value=$value;
        $this->id=$id;
    }
    public function getValue(){
        return $this->value;
    }
    public function getId(){
        return $this->id;
    }
    public function hasValue(){//判断是否有token值
        if ($this->value==false || $this->value=="false" || $this->value=="" || $this->value==Null)
            return 0;
        return 1;
    }
    public function build($expire='3600'){//创建token ,并将原来token删除
        $this->value = (string)md5(uniqid(md5(microtime(true)),true));  
        $oldValue=Cache::get($this->id);
        if ($oldValue!=Null)Cache::delete($oldValue); 
        Cache::tag('token')->set($this->value,$this->id,$expire);
        Cache::tag('token')->set($this->id,$this->value,$expire);
        return $this->value;
    }
    public function check(){//检查当前token是否有对应的id
        $this->id=Cache::get($this->value);
        return Cache::has($this->value);
    }
    public function delete(){
        return cache::delete($this->value);    
    }

}