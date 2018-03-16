<?php 
$val=$_POST['data'];
require("_sql_connect.php");
$sql="insert into project(招标方式,项目名称,子项目名称,乙方,合同号,合同金额,结算金额,开始时间,结束时间,项目来源,项目负责人,项目简介) value ($val)";if(mysql_query($sql,$conn))
{echo "true";}
else{
echo "false";}
?>