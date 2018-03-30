<?php 
$val=$_POST['data'];
require("_sql_connect.php");
$sql="insert into project(招标方式,项目名称,项目编号,资金来源,项目经费,开始时间,结束时间,项目负责人,项目简介) value ($val)";if(mysql_query($sql,$conn))
{echo "true";}
else{
echo "false";}
?>