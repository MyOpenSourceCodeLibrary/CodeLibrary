<?php
require '../Common.php';
/**
 * trait的使用,请注意，该特性只有php版本大于5.4才会拥有
 * trait的运用相当于可以再同一个类里使用多个接口模块
 * trait里面可以包含代码块，而interface不可以含有代码块
 * trait之间也可以相互嵌套
 * trait里面的方法可以用insteadof进行替换(解决因为相同方法出现的冲突)
 * */
trait Hello{
    public function sayHello(){
        echo 'hello';
    }
}
trait in{
    public function in(){
        echo '||';
    }
}
trait World{
    use in;//trait的嵌套
    public function sayWorld(){
        echo 'world';
    }
}
class HelloWorld extends CommonFun{
    use Hello,World;
    public function sayHelloWorld(){
        echo '!';
    }
}
$helloworld = new HelloWorld();
$helloworld->sayHello();
//$helloworld->in();
$helloworld->sayWorld();
$helloworld->sayHelloWorld();