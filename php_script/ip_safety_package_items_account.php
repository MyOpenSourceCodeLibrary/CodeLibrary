<?php
require("./ip_safety_mysql_config.php");
require_once('./Log4php.class.php');

if(count($argv)!=3){
    echo '参数不正确,需要两个参数,故退出脚本'."\n";
    exit;
}

$from = $argv[1];//开始条数
$limit = $argv[2];//持续执行条数
//先查询所有的用户,执行SQL的语句在下面
$sql = "select account_id,account_type,edition from user_account where edition!='free' and account_type!=3 limit {$from},{$limit}";

/***此处为测试使用**/
//$test_arr = '(143,391)';//测试使用
//$sql = "select account_id,account_type,edition from user_account where account_id in {$test_arr}";//测试
/***此处为测试使用**/


//实例化log4php
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
//把用户录入数组
$account_info = array();
while ($line = mysql_fetch_assoc($result)) {
    array_push($account_info,$line);
}
//针对每一个账号进行操作
foreach($account_info as $k=>$v){
    echo '正在执行第'.$k.'条数据,account_id = '.$v['account_id']."\n";
    $logger->debug('正在执行第'.$k.'条数据,account_id = '.$v['account_id']."\n");
    //如果是个人版,并且是免费版,跳过
    if($v['account_type']==1 && $v['edition']=='free'){
        echo '账号'.$v['account_id'].'版本为free,并不需要进行数据操作,故退出!'."\n";
        $logger->debug('账号'.$v['account_id'].'版本为free,并不需要进行数据操作,故退出!'."\n");
        continue;
    }
    //通过account_id继续查表package_instances,得到对应id
    $sql = "select id from package_instances where account_id = {$v['account_id']} and status=1";
    $res = mysql_query($sql);
    $package_instance_id = mysql_fetch_assoc($res);
    //得到package_instance_id
    $package_instance_id = $package_instance_id['id'];
    echo '执行SQL并获得对应的package_instance_id成功.package_instance_id='.$package_instance_id.',SQL:' . $sql . "\n";
    $logger->debug('执行SQL并获得对应的package_instance_id成功.package_instance_id='.$package_instance_id.',SQL:' . $sql . "\n");
    if($package_instance_id) {
        echo 'package_instance_id存在,继续执行'. "\n";
        $logger->debug('package_instance_id存在,继续执行'. "\n");
        //先通过$package_instance_id查表package_instance_items
        $sql = "select *from package_instance_items where package_instance_id={$package_instance_id} and pc_id = {$package_conf_id}";
        $res = mysql_query($sql);
        $package_instance_item_info = mysql_fetch_assoc($res);
        if ($package_instance_item_info) {
            echo '已执行SQL:'.$sql."\n".'账号' . $v['account_id'] . '已经存在该字段,故退出!' . "\n";
            $logger->debug('已执行SQL:'.$sql."\n".'账号' . $v['account_id'] . '已经存在该字段,故退出!' . "\n");
        } else {
            //确定版本相对应的配额参数
            $value = $v['account_type'] == 2 ? $company_quota : $single_quota;
            //如果库里面没有存在,进行插库操作
            $sql = "insert into package_instance_items(package_instance_id,pc_id,value) values('{$package_instance_id}','{$package_conf_id}','{$value}')";
            $res = mysql_query($sql);
            if (mysql_affected_rows()) {
                $logger->debug('插入成功,已经执行SQL:' . $sql . "\n");
                echo '插入成功,已经执行sql:' . $sql . "\n";
            } else {
                echo '插入失败,退出' . "\n".'终止SQL:' . $sql . "\n";
                $logger->debug('插入失败,退出' . "\n".'终止SQL:' . $sql . "\n");
                break;
            }
        }
    }
}

mysql_close($link);