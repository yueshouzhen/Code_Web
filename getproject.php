<?php
require('_sql_connect.php');
$returnMe=array();
$mysql_count="select count(*) from project";
$mysql_content="select 项目编号,项目名称,项目简介 from  project";
$result_count=mysql_query($mysql_count,$conn);
$result_content=mysql_query($mysql_content);

$num=mysql_fetch_row($result_count);

$returnMe["number"]=$num[0];
$items=array();
while($row = mysql_fetch_object($result_content))
{
		 array_push($items, $row); 
}
$returnMe["content"]=$items;
echo (json_encode($returnMe,JSON_UNESCAPED_UNICODE));
?>