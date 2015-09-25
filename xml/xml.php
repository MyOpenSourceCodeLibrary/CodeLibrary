<?php
// 首先要建一个DOMDocument对象 
$xml = new DOMDocument(); 
// 加载Xml文件 
$xml->load("me.xml"); 
// 获取所有的post标签 
$postDom = $xml->getElementsByTagName("post"); 
// 循环遍历post标签 
foreach($postDom as $post){ 
// 获取Title标签Node 
$title = $post->getElementsByTagName("title"); 
/** 
* 要获取Title标签的Id属性要分两部走 
* 1. 获取title中所有属性的列表也就是$title->item(0)->attributes 
* 2. 获取title中id的属性，因为其在第一位所以用item(0) 
* 
* 小提示： 
* 若取属性的值可以用item(*)->nodeValue 
* 若取属性的标签可以用item(*)->nodeName 
* 若取属性的类型可以用item(*)->nodeType 
*/ 
echo "Id: " . $title->item(0)->attributes->item(0)->nodeValue . "<br />"; 
echo "Title: " . $title->item(0)->nodeValue . "<br />"; 
echo "Details: " . $post->getElementsByTagName("details")->item(0)->nodeValue . "<br /><br />"; 
} 
