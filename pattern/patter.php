<?php
/*
 * 正则表达式,基本上每一门语言都会出现.
 * 它的作用就是匹配
 * 接下来介绍的时php与js的正则表达式
 * */

//下面是php的正则表达式的应用
//使用preg_match进行验证
$str = 'aaaa';
if(preg_match("/\\d+/", $str)){
    echo "验证成功";
}else{
    echo "验证失敗";
}

//使用preg_replace进行替换
$str = 'bbbb122';
$str = preg_replace("/\\d+/","c",$str);
var_dump($str);
$str = '2';
?>
<button onclick="pattern('<?php echo $str?>')">点击我进行验证</button>
<script src="../jquery/jquery-1.7.1.min.js"></script>
<script>
    //下面是使用jquery进行正则验证,这种方式多用于表单验证
    function pattern(str){
        var pattern = /\d+/;
        var result = pattern.test(str);
        var replace = str.replace(pattern,'fuck');
        alert(result);
        alert(replace);
    }
</script>
<script>
    //下面是一些常用的正则表达式

    //匹配中文字符
    var chinese = /[\u4e00-\u9fa5]/;
    //匹配HTML的比较复杂,一般情况是根据实际的需求自己编写
    var html = /<\S+>/;
    //匹配邮箱
    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    //url
    var http_url = /[a-zA-z]+:\/\/[^\s]*/;
    //手机电话号码
    var telephone = /1[3,5,8]{1}[0-9]{1}[0-9]{8}|0[0-9]{2,3}-[0-9]{7,8}(-[0-9]{1,4})?/;
    //ip地址
    var ip = /(d+).(d+).(d+).(d+)/;


    //以上几个只是最常见的正则验证,如果还需要更多的,请自行查找或自行编写

</script>
