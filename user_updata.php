<?php
//echo "ddddd";
$arr=$_POST['arr'];
require("_sql_connect.php");

if($arr[8]=="99999")
{
	$sql="insert into userdata (姓名,职务,单位名称,联系电话,邮箱地址,通信地址,身份证号,image,对口业务,部门) values ('$arr[0]','$arr[3]','$arr[4]','$arr[1]','$arr[2]','$arr[5]','$arr[6]','home-doctor-1.jpg','$arr[7]',$[9])";
	echo $sql;
if(mysql_query($sql,$conn)){echo "ok";}
else{echo "failed!";
echo $arr[7];}
	

	}
else{

$sql="update userdata set 姓名='$arr[0]',职务='$arr[3]',单位名称='$arr[4]',联系电话='$arr[1]',邮箱地址='$arr[2]',通信地址='$arr[5]',身份证号='$arr[6]',image='home-doctor-1.jpg',对口业务='$arr[7]',部门='$arr[9]' where Id = '$arr[8]'";
echo $sql;
if(mysql_query($sql,$conn)){
	echo "ok";
	}
	else
	{
		echo "failed!";
		}
}
?>