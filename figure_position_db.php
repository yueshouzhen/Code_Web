<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>position_db</title>
<style type="text/css">
.divBK{
	background-color:#0A0;
	position:relative;

	}
.imgBK{

	width:100%;
	}
.label_jg{
	
	position:absolute;
	font-size:100%;
	}


</style>

</head>

<body>
<div class="divBK">
<img class="imgBK" src="images/平面图2.jpg" />

<?php 
$system_get=$_POST['data'];
//$zhongwen=iconv("UTF-8","GBK","屏蔽机房");
//$jg=call_read($zhongwen.".txt",",");//获取屏蔽机房的设备数量
//生成机房设备
$rule_pb=array('jg41','jg42','jg43','jg44','jg45','jg46','jg47','jg48','jg49','jg01','jg02','jg03','jg04','jg05','jg06','jg07','jg08','jg09','jg11','jg12','jg13','jg14','jg15','jg16','jg17','jg18','jg19','jg21','jg22','jg23','jg24','jg25','jg26','jg27','jg28','jg29','jg31','jg33','jg33','jg34','jg35','jg36','jg37','jg38','jg39','1T1');

$rule_kz=array('1L1','1L2','1L3','1L4','1L5','1L6','1L7','1L8','2L1','2L2','2L3','2L4','2L5','2L6','2L7','2L8','3L1','3L2','3L3','3L4','3L5','3L6','3L7','3L8','1T1');

$rule_hlht=array('D01','D02','D03','1T1');

$num_pb=$rule_pb;
$num_kz=$rule_kz;
$num_hlht=$rule_hlht;

//获取每个机柜的数量
require("_sql_connect.php");
mysql_query("set names utf8");
$sql="select jifang,name,$system_get  from info_jf order by jifang, name";
$result=mysql_query($sql,$conn);
while($row=mysql_fetch_row($result)){
	//print_r($row[0]);//获得机房
	//print_r($row[1]);//获得机柜
	//print_r($row[2]);//获得dh系统数量
	switch ($row[0])
	{case '屏蔽机房':
	$i=0;
	$flag=true;
	foreach ($num_pb as $temp)
	{
		$temp1 =str_replace('机柜','jg',$row[1]);//
		//print_r($temp);
		//print_r($row[1]);
		if ($temp == $temp1)
		{
			//print_r($temp);
			$num_pb[$i]=$row[2];}
		$i++;
		
		}
	 
	break;
	case '扩展机房':
	$i=0;
	$flag=true;
	foreach ($num_kz as $temp)
	{
		//$temp1 =str_replace('机柜','jg',$row[1]);
		//print_r($temp);
		//print_r($row[1]);
		if ($temp == $row[1])
		{
			//print_r($temp);
			$num_kz[$i]=$row[2];}
		$i++;
		
		}
	
	
	break;
	case '互联互通':
	$i=0;
	$flag=true;
	foreach ($num_hlht as $temp)
	{
		//$temp1 =str_replace('机柜','jg',$row[1]);
		//print_r($temp);
		//print_r($row[1]);
		if ($temp == $row[1])
		{
			//print_r($temp);
			$num_hlht[$i]=$row[2];}
		$i++;
		
		}
	break;
	case '管局机房':
	
	default:
	break;
		
		}
	}


//print_r($num_pb);


//------------------制作table---
function create_label($left,$top,$row,$col,$left_step,$top_step,$rule,$num,$posxs,$posys)
{
	$left_lb=$left;
    $top_lb=$top;
	//echo "dddddddd";
$z=0;
for($j=0;$j<$row;$j++){ //一共5行
$left_lb=$left;	
for ($i=0;$i<$col;$i++) //一共9列
{
	
echo ("<label style='left:$left_lb%;top:$top_lb%;' class='label_jg' id=$rule[$z]>$num[$z]</label>");
//echo $z;
$z++;

$left_lb+=$left_step;
}
$top_lb+=$top_step;

}
//制作 非机柜table,位置由posx,posy决定
$i=0;
for ($i=0;$i<sizeof($posxs);$i++)
{  
if(sizeof($posxs)==1)
{ $posx = $posxs;
	$posy = $posys;
	}
else{
 $posx = $posxs[$i];
 $posy = $posys[$i];}
echo ("<label style='left:$posx%;top:$posy%;' class='label_jg' id=$rule[$z]>$num[$z]</label>");
$z++;
}

}
//---获得屏蔽机房机柜参数	
//------输入非固定位置label坐标(多个标签)
//$posxs=array(69.5,69.5);
//$posys=array(87,90);
//------输入非固定位置label坐标(单个标签)
$posxs=69.5;
$posys=35;
 create_label(62.5,39.5,5,9,1.75,8.7,$rule_pb,$num_pb,$posxs,$posys);

//------获得扩展机房参数

$posxs=44;
$posys=16;
 create_label(38,21,3,8,1.75,8.7,$rule_kz,$num_kz,$posxs,$posys);

//-----获得互联互通参数
$posxs=19;
$posys=32;
create_label(15,36.5,1,3,4,8.7,$rule_hlht,$num_hlht,$posxs,$posys);

//-----获得二枢纽参数---	




//-------------填写屏蔽机房的设备数量

?>

</div>
<div>
<img class="imgBK" src="images/平面图3.jpg" />
</div>
</body>
</html>