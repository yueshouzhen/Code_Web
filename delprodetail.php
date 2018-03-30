<?php 

$delitem=$_POST['fileme'];
//echo $delitem;
require("_sql_connect.php");

//$delitem=iconv("GB2312","UTF-8//IGNORE",$delitem);
$sql="delete from prodata where links = \"$delitem\"";
if(mysql_query($sql,$conn))
{
	echo "ok";
	//echo $sql;
}
else
{
		echo $sql;
}


?>