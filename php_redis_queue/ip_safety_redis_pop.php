<?php
require("./mysql_config.php");
require_once('./Log4php.class.php');
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$test = $redis->LPOP('ip_safety');
while($test){
    var_dump($test);
    $test = $redis->LPOP('ip_safety');
    /*
     * 在这里执行想要的操作
     * */
}
var_dump('已经执行完成');