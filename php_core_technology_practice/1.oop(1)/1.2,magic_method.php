<?php
require '../Common.php';
/**
 * 魔术方法详解
 * 1,__construct   构造方法
 * 类开始时进行的操作
 *
 * 2,__deconstruct 析构方法
 * 类结束时的操作
 *
 * 3,__set
 * 4,__get
 * 5,__call
 * 6,__toString
 * */
class MagicMethod extends CommonFun{
    private $username;
    public function __construct(){
        //在类执行前先执行
        $this->username = 'bob';
    }
    public function __destruct(){
        //在类执行完后执行
        CommonFun::ln();
        echo $this->username = 'liangbob';
    }
    public function __get($val){
        //调用没有定义过的变量时自动触发
        echo '变量'.$val.'没有被定义，赶紧查看下代码！';
    }

    public function __set($p,$v){
        //为未定义的变量赋值时自动触发
        echo '没有被定义的变量不能赋值，您赋值的变量是:'.$p.'，想赋的值是:'.$v;
    }
    public function __call($p,$v){
        //调用没有定义的方法时自动触发
        $v[$p] = '没有该方法';
        return $v;
    }
    public function __toString(){
        //echo或print_r一个对象时自动触发，注意，必须要return一个东西
        return'对象不是字符串，不能直接echo';
    }

    public function run(){
        echo $this->username;
    }
}

$magicMethod = new MagicMethod();
$magicMethod->run();
CommonFun::ln();
//调用未定义成员变量
$magicMethod->username;
CommonFun::ln();
//给未定义变量赋值
$magicMethod->username = 'Bob.liang';
CommonFun::ln();
//调用一个未定义的方法
var_dump($magicMethod->run2());
CommonFun::ln();
//输出一个对象
echo $magicMethod;
CommonFun::ln();
print_r($magicMethod);
CommonFun::ln();
