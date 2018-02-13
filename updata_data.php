<?php
require("_sql_connect.php");
$sql_tb=$_POST['sql_tb'];
$sql_col=$_POST['sql_col'];
$sql_val=$_POST['sql_val'];
echo("<script>console.log('".$sql_tb."');</script>");

$sql_1="UPDATE ".$sql_tb." SET ";
$sql_2=explode(",",$sql_col);
$sql_3=explode(",",$sql_val);
$sql_4="";
for($i=0;$i<(count($sql_2)-1);$i++)
{
	if($i==(count($sql_2)-2))
	{$sql_4=$sql_4.$sql_2[$i]."="."$sql_3[$i]";}
	else{$sql_4=$sql_4.$sql_2[$i]."="."$sql_3[$i]".",";}
}
if ($sql_tb=="life_time")
{
	$sql_5=" Where 资产编码 ="."\"".$_POST['sql_zcbm']."\"";
    $sql=$sql_1.$sql_4.$sql_5;
	echo $sql;
	}
else
{
$sql_5=" Where Id=".$sql_3[count($sql_2)-1];
$sql=$sql_1.$sql_4.$sql_5;
}



if(!mysql_query($sql,$conn)){
   echo "更新数据失败：".mysql_error();
} else {
   echo "更新数据成功！";

}
mysql_close($conn);

?>