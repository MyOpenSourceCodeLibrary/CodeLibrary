<?php
/*
 * 以工作中的添加配额作为例子
 * 基本配置
 * */
//数据库信息
$host = "127.0.0.1";
$username = "root";
$password = "bobo534753";
//网页操作得到的package_conf的id
$package_conf_id = 28;
//ip漏洞扫描配额
$single_quota = 15;//个人版配额
$company_quota = 50;//企业版配额

//新版本
$publish1 = array(
    'premium' => 104,
    'standard' => 105,
    'pro' => 103,
    'enjoy' => 9,
);
//旧版本
$publish2 = array(
    'premium' => 106,
    'standard' => 107,
    'pro' => 108
);