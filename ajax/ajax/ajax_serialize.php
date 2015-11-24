<script src="../../jquery/jquery-1.7.1.min.js"></script>
<script>
    o = {x:1,y:{z:[false,null,""]}};
    s = {a:JSON.stringify(o)};
    $.post('ajax_post.php',s,function(data){
        console.log(data);
    });
</script>
