<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$url = 'http://www.hao123.com';  //这儿填页面地址
$info=file_get_contents($url);
preg_match('|<title>(.*?)<\/title>|i',$info,$m);
echo $info;
?>
</body>
</html>