<?php
/**
 *
 * 介绍一些js的常用函数
 */
?>
<pre>
.常规函数
　　javascript常规函数包括以下9个函数：
　　(1)alert函数：显示一个警告对话框，包括一个OK按钮。
　　(2)confirm函数：显示一个确认对话框，包括OK、Cancel按钮。
　　(3)escape函数：将字符转换成Unicode码。
　　(4)eval函数：计算表达式的结果。
　　(5)isNaN函数：测试是(true)否(false)不是一个数字。
　　(6)parseFloat函数：将字符串转换成符点数字形式。
　　(7)parseInt函数：将符串转换成整数数字形式(可指定几进制)。
　　(8)prompt函数：显示一个输入对话框，提示等待用户输入。例如：
　　(9)unescape函数：解码由escape函数编码的字符。
　　2.数组函数
　　javascript数组函数包括以下4个函数：
　　(1)join函数：转换并连接数组中的所有元素为一个字符串。例:

程序代码
　　　　function JoinDemo()
　　　　{
　　　　　var a, b;
　　　　　a = new Array(0,1,2,3,4);
　　　　　b = a.join("-");//分隔符
　　　　　return(b);//返回的b=="0-1-2-3-4"
　　　　}
　
　(2)langth函数：返回数组的长度。例：
　　　　
程序代码
function LengthDemo()
　　　　{
　　　　　var a, l;
　　　　　a = new Array(0,1,2,3,4);
　　　　　l = a.length;
　　　　　return(l);//l==5
　　　　}

　　(3)reverse函数：将数组元素顺序颠倒。例：
　　　
程序代码
function ReverseDemo()
　　　{
　　　　var a, l;
　　　　a = new Array(0,1,2,3,4);
　　　　l = a.reverse();
　　　　return(l);
　　　}
　　(4)sort函数：将数组元素重新排序。例：
　　　　
程序代码
function SortDemo()
　　　　{
　　　　　var a, l;
　　　　　a = new Array("X" ,"y" ,"d", "Z", "v","m","r");
　　　　　l = a.sort();
　　　　　return(l);
　　　　}
　　3.日期函数
　　javascript日期函数包括以下20个函数：
　　(1)getDate函数：返回日期的“日”部分，值为1～31。例：
　　　
程序代码
function DateDemo()
　　　{
　　　　var d, s = "Today's date is: ";
　　　　d = new Date();
　　　　s += (d.getMonth() + 1) + "/";
　　　　s += d.getDate() + "/";
　　　　s += d.getYear();
　　　　return(s);
　　　}
　　(2)getDay函数：返回星期几，值为0～6，其中0表示星期日，1表示星期一，...，6表示星期六。例：
　　　
程序代码
function DateDemo()
　　　{
　　　　var d, day, x, s = "Today is: ";
　　　　var x = new Array("Sunday", "Monday", "Tuesday");
　　　　var x = x.concat("Wednesday","Thursday", "Friday");
　　　　var x = x.concat("Saturday");
　　　　d = new Date();
　　　　day = d.getDay();
　　　　return(s += x[day]);
　　　}
　　(3)getHouse函数：返回日期的“小时”部分，值为0～23。例。
　　　
程序代码
function TimeDemo()
　　　{
　　　　var d, s = "The current local time is: ";
　　　　var c = ":";
　　　　d = new Date();
　　　　s += d.getHours() + c;
　　　　s += d.getMinutes() + c;
　　　　s += d.getSeconds() + c;
　　　　s += d.getMilliseconds();
　　　　return(s);
　　　}
　　(4)getMinutes函数：返回日期的“分钟”部分，值为0～59。见上例。
　　(5)getMonth函数：返回日期的“月”部分，值为0～11。其中0表示1月，2表示3月，...，11表示12月。见前面的例
子。
　　(6)getSeconds函数：返回日期的“秒”部分，值为0～59。见前面的例子。
　　(7)getTime函数：返回系统时间。
　　　
程序代码
function GetTimeTest()
　　　{
　　　　var d, s, t;
　　　　var MinMilli = 1000 * 60;
　　　　var HrMilli = MinMilli * 60;
　　　　var DyMilli = HrMilli * 24;
　　　　d = new Date();
　　　　t = d.getTime();
　　　　s = "It's been "
　　　　s += Math.round(t / DyMilli) + " days since 1/1/70";
　　　　return(s);
　　　}
　　(8)getTimezoneOffset函数：返回此地区的时差(当地时间与GMT格林威治标准时间的地区时差)，单位为分钟。
　　　
程序代码
function TZDemo()
　　　{
　　　　var d, tz, s = "The current local time is ";
　　　　d = new Date();
　　　　tz = d.getTimezoneOffset();

　　　　if (tz 的链接点的名称，另一个函数link设定的URL地址。
　　(2)big函数：将字体加到一号，与...标签结果相同。
　　(3)blink函数：使字符串闪烁，与...标签结果相同。
　　(4)bold函数：使字体加粗，与...标签结果相同。
　　(5)charAt函数：返回字符串中指定的某个字符。
　　(6)fixed函数：将字体设定为固定宽度字体，与...标签结果相同。
　　(7)fontcolor函数：设定字体颜色，与标签结果相同。
　　(8)fontsize函数：设定字体大小，与标签结果相同。
　　(9)indexOf函数：返回字符串中第一个查找到的下标index，从左边开始查找。
　　(10)italics函数：使字体成为斜体字，与...标签结果相同。
　　(11)lastIndexOf函数：返回字符串中第一个查找到的下标index，从右边开始查找。
　　(12)length函数：返回字符串的长度。(不用带括号)
　　(13)link函数：产生一个超级链接，相当于设定的URL地址。
　　(14)small函数：将字体减小一号，与...标签结果相同。
　　(15)strike函数：在文本的中间加一条横线，与...标签结果相同。
　　(16)sub函数：显示字符串为下标字(subscript)。
　　(17)substring函数：返回字符串中指定的几个字符。
　　(18)sup函数：显示字符串为上标字(superscript)。
　　(19)toLowerCase函数：将字符串转换为小写。
　　(20)toUpperCase函数：将字符串转换为大写。

//校验是否全由数字组成

程序代码
function isDigit(s)
{
var patrn=/^[0-9]{1,20}$/;
if (!patrn.exec(s)) return false
return true
}


//校验登录名：只能输入5-20个以字母开头、可带数字、“_”、“.”的字串

程序代码
function isRegisterUserName(s)
{
var patrn=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){4,19}$/;
if (!patrn.exec(s)) return false
return true
}


//校验用户姓名：只能输入1-30个以字母开头的字串

程序代码
function isTrueName(s)
{
var patrn=/^[a-zA-Z]{1,30}$/;
if (!patrn.exec(s)) return false
return true
}

//校验密码：只能输入6-20个字母、数字、下划线

程序代码
function isPasswd(s)
{
var patrn=/^(\w){6,20}$/;
if (!patrn.exec(s)) return false
return true
}


//校验普通电话、传真号码：可以“+”开头，除数字外，可含有“-”

程序代码
function isTel(s)
{
//var patrn=/^[+]{0,1}(\d){1,3}[ ]?([-]?(\d){1,12})+$/;
var patrn=/^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;
if (!patrn.exec(s)) return false
return true
}


//校验手机号码：必须以数字开头，除数字外，可含有“-”

程序代码
function isMobil(s)
{
var patrn=/^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;
if (!patrn.exec(s)) return false
return true
}

//校验邮政编码

程序代码
function isPostalCode(s)
{
//var patrn=/^[a-zA-Z0-9]{3,12}$/;
var patrn=/^[a-zA-Z0-9 ]{3,12}$/;
if (!patrn.exec(s)) return false
return true
}

//校验搜索关键字

程序代码
function isSearch(s)
{
var patrn=/^[^`~!@#$%^&*()+=|\\\][\]\{\}:;\'\,.<>/?]{1}[^`~!@$%^&()+=|\\\][\]\{\}:;\'\,.<>?]{0,19}$/;
if (!patrn.exec(s)) return false
return true
}


程序代码
function isIP(s) //by zergling
{
var patrn=/^[0-9.]{1,20}$/;
if (!patrn.exec(s)) return false
return true
}