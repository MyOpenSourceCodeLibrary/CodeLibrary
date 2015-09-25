<?php
/*
 * 有时候,我们需要在js中使用时间的各种类型,例如比较典型的是制作一个当前一直跑动的时钟
 * 这时候我们在php端调用的时间函数就会无法在js中使用,当然,其实也可以使用,但是异常的麻烦
 * 那么js中的时间函数是怎么调用的呢?
 * 本文主要实现js中时间函数的使用
 * */
?>
<script>
    // 获取当前时间戳(以s为单位)
    var date = new Date();//初始化时间函数,此步必须有
    var timestamp = date.getTime();//获取当前时间戳
    timestamp = timestamp/1000;//注意,js中的时间戳与php中的时间戳有一些区别,它的单位是毫秒,而php中的时间戳单位是秒
    timestamp = parseInt(timestamp);//把时间戳转化成整型
    console.log("当前时间戳为："+timestamp);
    
    //下面是一些常用的时间变量与函数
    var dateYear = date.getYear();                       //获取当前年份(2位)
    var dateFullYear = date.getFullYear();               //获取完整的年份(4位,1970-????)
    var dateMonth = date.getMonth();                     //获取当前月份(0-11,0代表1月)
    var dateDay = date.getDate();                        //获取当前日(1-31)
    var dateWeek = date.getDay();                        //获取当前星期X(0-6,0代表星期天)
    var dateHour = date.getHours();                      //获取当前小时数(0-23)
    var dateMinutes = date.getMinutes();                 //获取当前分钟数(0-59)
    var dateSeconds = date.getSeconds();                 //获取当前秒数(0-59)
    var dateMS = date.getMilliseconds();                 //获取当前毫秒数(0-999)
    var dateLDS = date.toLocaleDateString();             //获取当前日期,格式2015/1/1
    var dateTLS = date.toLocaleString();                 //获取日期与时间,格式:2015/5/11 下午3:36:16

    /*
    * 输入一个年份,判断是否闰年
    * */
    function isLeapYear(year){
        return (0==year%4&&((year%100!=0)||(year%400==0)));
    }

    /*
    * 输出一个月份,判断该月有多少天
    * */
    function getDayByMonth(month,year=false){
        if(!year){
            var date=new Date();
            year = date.getFullYear();
        }
        var  day = new Date(year,month,0);
        //获取天数：
        return day.getDate();
    }

         console.log(getDayByMonth(2,2016));

</script>