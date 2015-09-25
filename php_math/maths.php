<?php
include('./sort.php');
class maths{
	/**
	*一些常用的数学计算
	*$arr为传入的数组
	*$type为需要计算的方式，有max、min、avg、sum
	*/

	function Calculation($arr,$type=null,$sort=null){
		if(is_array($arr)&&$type){
			switch ($type) {
				case 'max'://最大值
					if($sort){
						$sort=new sort();
						$arr=$sort->sort_type($arr,'insert');
						$result=array_pop($arr);
					}else{
						//引用php函数的方法(最方便快捷)
						$key=array_search(max($arr), $arr);
						$result=$arr[$key];
					}
					break;
				case 'min'://最小值
					if($sort){
						$sort=new sort();
						$arr=$sort->sort_type($arr,'insert');
						$result=array_shift($arr);
					}else{
						//引用php函数的方法
						$key=array_search(min($arr), $arr);
						$result=$arr[$key];
					}
					break;
				case 'sum'://求和
					$result=0;
					foreach ($arr as $key => $value) {
						$result+=$value;
					}
					break;
				case 'avg'://求平均值
					$result=0;
					foreach ($arr as $key => $value) {
						$result+=$value;
					}
					$result=$result/count($arr);
			}
		}else{
			return false;
		}
		return $result;
	}


}

$a =new maths();
$b = $a->Calculation(array(44,23,222,33,4,99,222,33),'min','select');
var_dump($b);
