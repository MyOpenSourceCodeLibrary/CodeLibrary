<?php
class Timezone{
	/*
	*设置时区成PRC
	*/
	function setTimezone(){
		date_default_timezone_get('PRC');
	}
}