<html>
<head>
	<meta charset="utf-8">
	<title>js面向对象</title>
</head>
<body>

<script type="text/javascript">
//三种js构造类的方法
/*
*基础定义类
*用this定义变量，用prototype定义方法
*/
function People(name,sex,tel,email){
	this.name=name;
	this.sex=sex;
	this.otherSign(tel,email);
}
People.prototype.otherSign = function(tel,email) {
	this.telephone=tel;
	this.email=email;
	if(tel==0){
		return 'Fuck you!There is no telephone number!';
	}else{
		return 'OK!The phone is already work!';
	}
};
var people = new People("bob",'man','0','912510822@qq.com');
// console.log(people);
/*
*构造函数定义类
*/
var People2 = {
	name:'bob',
	sex:'man',
	otherSign:function(tel){
		alert(tel);
	}
}
/*
*封装
*/
var People3 = {
	createNew: function(){
　　　　var people = {};
		people.name = 'bob';
		people.otherSign = function(tel){
			return tel;
		}
		return people;
　　}
}
var peoples = People3.createNew();
console.log(peoples.otherSign(123));
</script>
</body>
</html>