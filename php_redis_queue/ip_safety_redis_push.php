<?php
require("./mysql_config.php");
require_once('./Log4php.class.php');

//先查询所有的用户,执行SQL的语句在下面
$sql = "select account_id,account_type,edition from user_account where edition!='free' and account_type!=3";

/***此处为测试使用**/
//$test_arr = '(143,391)';//测试使用
//$sql = "select account_id,account_type,edition from user_account where account_id in {$test_arr}";//测试
/***此处为测试使用**/


//实例化log4php,也可以用其他的log记录工具,如seaslog
$logger = new log4php();
$logger->appName = 'ip_safety_account_'.date('Y-m-d H:i:s');
//定义版本

//开始进行数据库操作
$link = mysql_connect($host, $username, $password) or die('Could not connect: ' . mysql_error());

mysql_select_db('db_monitor_main') or die('Could not select database');

//执行查询操作
$result = mysql_query($sql);
echo '已经执行SQL:'.$sql."\n";
$logger->debug('已经执行SQL:'.$sql."\n");
//把用户录入redis
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
while ($line = mysql_fetch_assoc($result)) {
    try{
        $v = serialize($line);
        //LPUSH,注意,这里是要点,和普通的get,set不一样,这里使用的是同一个key,形成一种类数组的方式
        $redis->LPUSH('ip_safety',$v);
        sleep(rand()%3);
        echo '已经往redis队列中插入'.$line['account_id']."的值\n";
        $logger->debug('已经往redis队列中插入'.$line['account_id']."的值\n");
    }catch(Exception $e){
        echo $e->getMessage()."\n";
        $logger->debug($e->getMessage()."\n");
    }
}
mysql_close($link);