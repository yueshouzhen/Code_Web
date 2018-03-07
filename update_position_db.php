<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update_position_db</title>
</head>

<body>
<?php
require("_sql_connect.php");
 mysql_query("set names utf8");
//获取机房的信息;
$sql="select DISTINCT jifang from info_jf";//获取机房信息
$result= mysql_query($sql,$conn);
/*$num_wh=array();
$num_gc=array();
$num_dh=array();
$num_bg=array();*/
 while($row=mysql_fetch_row($result))
{
	//获取机柜信息
	echo $row[0];
	$sql_jg="select name from info_jf where jifang ="."\"".$row[0]."\"";
	//echo $sql_jg;
	$result_jg=mysql_query($sql_jg);
	while($row_jg=mysql_fetch_row($result_jg)){
		//echo $row_jg[0];
	    //遍历dh_table数据库，更新info_jf信息
		
		$sql_dh="select count(*) from dh_table where 所在房间= "."'".$row[0]."'"." and 所属主系统='动环系统' and 所在位置 = "."'".$row_jg[0]."'" ;
		$result_temp=mysql_query($sql_dh);
		$row_temp = mysql_fetch_array($result_temp);
		$num_dh=$row_temp[0];
	
        
     	$sql_dh="select count(*) from dh_table where 所在房间= "."'".$row[0]."'"." and 所属主系统='维护系统' and 所在位置 = "."'".$row_jg[0]."'" ;
		$result_temp=mysql_query($sql_dh);
		$row_temp = mysql_fetch_array($result_temp);
		$num_wh=$row_temp[0];
		//echo $num_wh;
			
		
		
		$sql_dh="select count(*) from dh_table where 所在房间= "."'".$row[0]."'"." and  所属主系统='工程系统' and 所在位置 = "."'".$row_jg[0]."'" ;
		$result_temp=mysql_query($sql_dh);
		$row_temp = mysql_fetch_array($result_temp);
		$num_gc=$row_temp[0];
		
		$sql_dh="select count(*) from dh_table where 所在房间= "."'".$row[0]."'"." and  所属主系统='办公系统' and 所在位置 = "."'".$row_jg[0]."'" ;
		$result_temp=mysql_query($sql_dh);
		$row_temp = mysql_fetch_array($result_temp);
		$num_bg=$row_temp[0];
		
		
		
		$sql_upcontent=" num_dh = ".$num_dh." ,num_wh = ".$num_wh." , num_gc = ".$num_gc." , num_bg = ".$num_bg;
		
		 $sql_update="update info_jf set".$sql_upcontent." where jifang= "."'".$row[0]."'"." and name="."'".$row_jg[0]."'";
		//echo $sql_update;
		if(mysql_query($sql_update))
		{print_r('ok_dh');}
		else
		{print_r('shit_dh');}
				
		}
	}



?>




</body>
</html>