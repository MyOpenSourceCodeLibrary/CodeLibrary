<?php
class Common{
	//快速打印
	function dump($v)
	{
		echo '<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
		echo '<pre>';
		var_dump($v);
		echo '<pre>';
		echo '</html>';
	}
	function dd($v){
		echo '<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
		echo '<pre>';
		var_dump($v);
		echo '<pre>';
		echo '</html>';
	}
}
