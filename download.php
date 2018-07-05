<?php
//执行图片下载
//1.获取要下载的图片名（加上路径）
$file="./upload/".$_GET["name"];
//echo $file;//./upload/20180628074021456.jpg
//2.重设相应类型
//var_dump(getimagesize($file));
$info= getimagesize($file);
header("Content-Type:".$info["mime"]);
//3.指定保存的文件名称
header("Content-Disposition:attachment;filename=".$_GET["name"]);

//4.指定文件的大小
header("Content-Length:".filesize($file));
//相应内容
readfile($file);
?>