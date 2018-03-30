<?php 
$name=$_POST['name'];
$tel=$_POST['tel'];
require("_sql_connect.php");
$sql="delete  from userdata where 姓名='$name' and 联系电话='$tel'";
//echo $sql;

if(mysql_query($sql)){
	echo "ok";
	}
else
{
	echo "delete failed!";
	}

?>