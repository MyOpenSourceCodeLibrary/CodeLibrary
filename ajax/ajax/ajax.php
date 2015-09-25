<?php
/*
 * 有时候我们需要php和前端页面进行数据交互,并且是实行实时的请求方式
 * 这时候就需要我们使用ajax来进行处理
 * 下面就是用jquery实现的简单的ajax请求的代码
 * */
?>

<meta charset="utf-8">
<!--必须引入jquery才可以生效,如果没有jquery文件,请自行到官网下载-->
<script src="../../jquery/jquery-1.7.1.min.js"></script>
<button id="post_request">post请求</button>
<button id="get_request">get请求</button>
<button id="ajax_request">ajax原始请求</button>
<form id="__form">
    <input type="text" name='name' value="123"/>
</form>
<script>
    var data = $('#__form').serialize();
    //如果没有同异步影响,没有错误时调用函数等,使用$.post,$.get,否则使用ajax
	//post请求方式的ajax
	$('#post_request').click(function(){
		$.post('ajax_post.php',data,function(data){
			alert(data);
		});
	})
	//get请求方式的ajax
	$('#get_request').click(function(){
		$.get('ajax_get.php',{'type':'get'},function(data){
			alert(data);
		});
	});
	//原始方式的ajax
    $('#ajax_request').click(function(){
        /********
         * 需要注意的一点,如果一瞬间有多个请求,可以使用async判断是同步还是异步
         * 在下方ajax 里面第5行,true是异步,false是同步
         * **********/
        $.ajax({
            type: "POST",
            url: "ajax_ajax.php",
            data: {'type':'ajax'},
            dataType:'json',//json串传入到php
            async:false,//此处可以修改同异步问题
            success: function(msg){
                //{"a":1,"b":2,"c":3,"0":4,"1":5,"2":6,"3":7,"4":9}
                //alert(msg.a);
                /****
                 * 如果从php那边传过来的值是一条json串,使用eval函数转化成json对象.
                 * 如果传过来的是json对象,则不用.
                 * 总之,最后的结果应该是json对象,才可以正常输出
                 * ****/
                var msg = eval(msg);
                //var msg = eval('('+msg+')');也有可能需要的是这种格式
                alert(msg.a);
            }
        });
    });
</script>