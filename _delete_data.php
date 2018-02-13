<?php
require("_sql_connect.php");
$sql_tb=$_POST['sql_tb'];
$sql_ids=$_POST['sql_ids'];
echo $sql_ids;
$sql1="delete from ".$sql_tb." where Id in"."(".$sql_ids.")" ;
echo $sql1;

if(!mysql_query($sql1,$conn)){
  echo "删除数据失败：".mysql_error();
} else {
   echo "删除数据成功！";
}
mysql_close($conn);
?>