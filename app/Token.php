<?php
namespace app;
use think\facade\Cache;
/**
 * token类提供创建、检查、删除token
 */
class Token{
    protected $value;
    protected $uid;
    public function __construct($value="",$uid=""){
        $this->value=$value;
        $this->uid=$uid;
        if ($value)$this->check();
    }
    public function getValue(){
        return $this->value;
    }
    public function getId(){
        return $this->uid;
    }
    public function hasValue(){//判断是否有token值
        if ($this->value==false || $this->value=="false" || $this->value=="" || $this->value==Null)
            return 0;
        return 1;
    }
    public function build($expire='3600'){//创建token ,并将原来token删除
        $this->value = (string)md5(uniqid(md5(microtime(true)),true));  
        $oldValue=Cache::get($this->uid);
        if ($oldValue!=Null)Cache::delete($oldValue); 
        Cache::tag('token')->set($this->value,$this->uid,$expire);
        Cache::tag('token')->set($this->uid,$this->value,$expire);
        return $this->value;
    }
    public function check(){//检查当前token是否有对应的id
        if (!Cache::has($this->value))
            return false;
        $this->uid=Cache::get($this->value);
        return Cache::has($this->value);
    }
    public function delete(){
        return cache::delete($this->value);    
    }

}