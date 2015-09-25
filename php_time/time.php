<?php
class time{
	/*
	*获得各种时间戳
	*
	*/
	function alltime(){
		$time=time();//获得当前时间戳
		$time_midnight=strtotime('midnight');//获得午夜时间戳
		$time_last_monday=strtotime('last monday');//上星期一
		$time_next_sunday=strtotime('next sunday');//下星期天
	}
	/*
	*获得当前星期的某一天的时间戳
	*$time = new time();
	*$someday = $time->someday();
	*var_dump(date('Y-m-d H:i:s',$someday['saturday']));
	*
	*/
	function someday(){
    //$curtime=time();//当前时间
    $curtime=strtotime('midnight');//午夜凌晨0点  
    $curweekday = date('w');//获得当天是星期几,return int
     //为0是星期七
    $curweekday = $curweekday?$curweekday:7;//把0换成7，方便下面的计算

    $week_day_time['monday'] = $curtime - ($curweekday-1)*86400;//周一
    $week_day_time['tuesday'] = $curtime - ($curweekday-2)*86400;//周二
    $week_day_time['wednesday'] = $curtime - ($curweekday-3)*86400;//周三
    $week_day_time['thursday'] = $curtime - ($curweekday-4)*86400;//周四
    $week_day_time['friday'] = $curtime - ($curweekday-5)*86400;//周五
    $week_day_time['saturday'] = $curtime - ($curweekday-6)*86400;//周六
    $week_day_time['sunday'] = $curtime + (7-$curweekday)*86400;//周日
    return $week_day_time;
	}
	/**
	 * 获取几天前的日期
	 * @param $n 天数
	 * @param $timestamp 时间戳
	 * @param $format 日期间隔的合适，可以以'-'间隔
	 */
	static function DateAgo($n, $timestamp=NULL)
	{
		$time = ($timestamp) ? $timestamp : time();
		return date('Y-m-d H:i:s',$time - $n*24*3600);
	}
}
