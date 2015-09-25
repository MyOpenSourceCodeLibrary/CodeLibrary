<?php
/*
*数据库多表查询
*/
function select_more_table(){
	$sql = "select * from table1,table2 where table1.user_id = table2.user_id and ..";
}