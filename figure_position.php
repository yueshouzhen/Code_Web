<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>position</title>
<style type="text/css">
.divBK{
	background-color:#0A0;
	position:relative;

	}
.imgBK{

	width:100%;
	}
.label_jg{
	/*background-color:#F00;*/
	position:absolute;
	font-size:100%;
	}


</style>

</head>

<body>
<div class="divBK">
<img class="imgBK" src="images/平面图.jpg" />
<?php 
function call_read($file,$flag_read) //读取text并将数据转换为数组
{
	$myfile = fopen($file,'r') or die("Unable to open file!");
	$txt=fread($myfile,filesize($file));
	fclose($myfile);
	$txt_1=iconv("gb2312", "utf-8", $txt);
	$txt_array=explode($flag_read,$txt_1);
	return $txt_array;
	
	}

$zhongwen=iconv("UTF-8","GBK","屏蔽机房");
$jg=call_read($zhongwen.".txt",",");//获取屏蔽机房的设备数量

//-------------填写屏蔽机房的设备数量
$left_lb=62.5;
$top_lb=39.5;
$z=0;
for($j=0;$j<5;$j++){ //一共5行
$left_lb=62.5;	
for ($i=0;$i<9;$i++) //一共9列
{
	
echo ("<label style='left:$left_lb%;top:$top_lb%;' class='label_jg'>$jg[$z]</label>");
//echo $z;
$z++;

$left_lb+=1.75;
}
$top_lb+=8.7;

}
?>

</div>

</body>
</html>