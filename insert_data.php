<?php
require("_sql_connect.php");
$sql_tb=$_POST['sql_tb'];
$sql_col=$_POST['sql_col'];
$sql_val=$_POST['sql_val'];

$sql1="insert into ".$sql_tb." (".$sql_col.")"." VALUES "."(".$sql_val.")";
echo $sql1;
if(!mysql_query($sql1,$conn)){
   echo "添加数据失败：".mysql_error();
} else {
   echo "添加数据成功！";

}
mysql_close($conn);

?>