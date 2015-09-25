<?php
require '../Common.php';
/**
 * 继承，组合，接口，多态，单例
 * */
class Father{
    private $father = 'father';
    public function father_say(){
        echo 'I am a '.$this->father;
    }
    public function combination(){
        echo '组合前';
    }
}
class Child extends Father{//extends--继承
    private $child = 'child';
    public function son_say(){
        $this->father_say();
        echo 'I am a '.$this->child;
    }
    public function combination(){//父类里本书有的，在子类重新书写，组合！
        echo '组合！';
    }
}
interface sex{//这是一个接口
    public function sex();
}
class Boy extends Father implements sex{//调用接口用implements
    public function sex(){//记得调用完接口后重写接口里面定义好的方法
        echo '男';
    }
}
class Girl extends Father implements sex{
    public function sex(){
        echo '女';
    }
}

//调用不同的类中的同一个接口的方法，得到不同的结果，多态
$boy = new Boy();
$boy->sex();
CommonFun::ln();
$girl = new Girl();
$girl->sex();
CommonFun::ln();
class Apple extends CommonFun{//单例后延

}