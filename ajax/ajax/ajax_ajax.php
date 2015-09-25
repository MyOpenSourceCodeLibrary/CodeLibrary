<?php
/**
 * @author ciogao@gmail.com
 * Date: 15-5-11 上午10:27
 */
//echo json_encode($_POST['type']);//由于传进来的时json串,需要用函数解析

//通过js传过来的数据(可以是id号,某个特定的值),然后进行一系列的运算,得到你想要的结果.
//如下面的$str,$str可以是对象或者是变量,甚至只是一条字符串
$str = array('a'=>1,'b'=>2,'c'=>3,4,5,6,7,9);
$str = json_encode($str);//对这条数据转化成json串,然后输出返回到页面js上
echo $str;
