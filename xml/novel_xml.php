<?php
// 首先要建一个DOMDocument对象 
$xml = new DOMDocument(); 
// 加载Xml文件 
$xml->load("novels.xml"); 
// 获取所有的post标签 
$postDom = $xml->getElementsByTagName("post"); 
//foreach($postDom as $post){ 
// 获取Title标签Node 
$title = $postDom->item(0)->getElementsByTagName("title"); 
$content = $postDom->item(0)->getElementsByTagName('content');
echo "Title: " . $title->item(0)->nodeValue . "<br />"; 
echo "content: " . $content->item(0)->nodeValue . "<br />"; 
//}
