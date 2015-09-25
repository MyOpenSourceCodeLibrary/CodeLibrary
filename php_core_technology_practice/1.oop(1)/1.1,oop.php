<?php
require '../Common.php';
/**
 * 面向对象
 * 1,面向对象，面向过程，函数式编程的区别
 * */
class OOPClassPerson extends CommonFun{
    public $name;
    public $sex;
    public function say(){
        echo $this->name.' sex is '.$this->sex;
    }
}
//使用该对象
$person = new OOPClassPerson();
$person->name = 'bob';
$person->sex = 'male';
$person->say();
CommonFun::ln();
//对象强转数组,可以得到对象变量
$person2 = (array)$person;
var_dump($person2);
CommonFun::ln();
//对象序列化
var_dump(serialize($person));
CommonFun::ln();
//反序列化
$person3 = serialize($person);
var_dump(unserialize($person3));