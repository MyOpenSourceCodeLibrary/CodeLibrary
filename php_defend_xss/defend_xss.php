<?php
class DefendXss{
	//get方法
	function get($name, $default = null){
		$__value = isset($_GET[$name]) ? $_GET[$name] : '';
		if ($__value == '' && $default != null)
			return $default;
		return $this->remove_xss($__value);
	}
	//post方法
	function post($name, $default = null){
		$__value = isset($_POST[$name]) ? $_POST[$name] : '';
		if ($__value == '' && $default != null)
			return $default;
		return $this->remove_xss($__value);
	}
	function remove_xss($val){
		if (is_array($val)) return $val;
		return htmlspecialchars($val, ENT_QUOTES);
	}
}
