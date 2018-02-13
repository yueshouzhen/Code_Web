<?php 
date_default_timezone_set("Asia/Shanghai");
require("_sql_connect.php");
$sql="select * from ".$_POST['sql_tb'];
$res=mysql_query($sql,$conn);
        $rows=mysql_affected_rows($conn);//获取行数
        $colums=mysql_num_fields($res);
		$data_guobao="";
		$data_xiaxian="";
		$data_baofei="";
		$data_zaibao="";
		$data_jinbao="";
		 while($row=mysql_fetch_row($res)){		
$time_guobao = time()-strtotime($row[7]);//过保时间
$time_xiaxian = time()-strtotime($row[8]);//下线时间
$time_baofei = time()-strtotime($row[9]);//报废时间
$day_guobao = (int)($time_guobao/(3600*24));
$day_xiaxian = (int)($time_xiaxian/(3600*24));
$day_baofei = (int)($time_baofei/(3600*24));
	if($day_baofei >0 && $row[9]!="0000-00-00 00:00:00")
	{$data_baofei=$data_baofei.$row[1].",";}
	else
	{
	if($day_xiaxian>0  && $row[8]!="0000-00-00 00:00:00"){$data_xiaxian=$data_xiaxian.$row[1].",";}
	else
	{
	if($day_guobao>0 && $row[7]!="0000-00-00 00:00:00"){$data_guobao=$data_guobao.$row[1].",";}
	else{
		if(($day_guobao+60)>0){$data_jinbao=$data_jinbao.$row[1].",";}
		else{
			$data_zaibao=$data_zaibao.$row[1].",";
			}
	}
	}
	}
		 }	
echo $data_guobao;
echo ":";
echo $data_xiaxian;
echo ":";
echo $data_baofei;
echo ":";
echo $data_jinbao;
echo ":";
echo $data_zaibao;		
mysql_close($conn);
?>