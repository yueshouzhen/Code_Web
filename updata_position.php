<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>updata_position</title>
</head>

<body>
<?php
require("_sql_connect.php");
 mysql_query("set names utf8");
function call_write($str,$file)//写入文件
{
$myfile = fopen($file, "w") or die("Unable to open file!");
fwrite($myfile, $str);
fclose($myfile);
}

function call_read($file,$flag_read) //读取text并将数据转换为数组
{
	$myfile = fopen($file,'r') or die("Unable to open file!");
	$txt=fread($myfile,filesize($file));
	fclose($myfile);
	$txt_1=iconv("gb2312", "utf-8", $txt);
	$txt_array=explode($flag_read,$txt_1);
	return $txt_array;
	
	}
	function search_num($tabel,$room,$position,$conn) //获取机柜的数量
{
$sql = "SELECT * FROM ".$tabel." where 所在房间 = "."\"".$room."\""." and 所在位置 = "."\"".$position."\""; 
//echo $sql;
//$sql2= "SELECT * FROM ".$tabel." where 所在房间 = "."\"".$room."\"";
$result = mysql_query($sql,$conn); 
$rows=mysql_num_rows($result);//获取行数
return $rows;
}
	
	
//----------------------------获取机房不同机柜的信息


$txt_file=call_read('jifang.txt',';');//获得机房和相应的机柜
//print_r($txt_file[0]);

for ($i=0;$i<count($txt_file);$i++)//计算每一个机柜的设备数量
{   $arr_jifang =array();
	$arr_jifang =explode(",",$txt_file[$i]);//获取每个机房机柜的名称
//print_r($arr_jifang[0]);
$str_num="";
	for ($j=1;$j<=(count($arr_jifang)-1);$j++)//遍历每个机柜的设备数量
	{
		if($j==1)
		{$str_num=$str_num.search_num("dh_table",$arr_jifang[0],$arr_jifang[$j],$conn);}
		else
		{$str_num=$str_num.",".search_num("dh_table",$arr_jifang[0],$arr_jifang[$j],$conn);}
	}
	
	//print_r($arr_jifang[0]);
	//print_r("\r\n");
	//print_r($str_num);
	//print_r("\r\n");
	$str_temp= $arr_jifang[0];
	$file_gb=iconv( "utf-8","GBK",$str_temp);
	//print_r($file_gb);
	call_write($str_num,$file_gb.".txt");//将每个机房设备的数量写入到txt文件中

}




?>
</body>
</html>