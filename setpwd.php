<?php
require_once "_sql_connect.php";
//登录日志添加 人员+时间
$name=$_POST['title'];
$pwd=$_POST['pwd_new'] ;
$pwd_old=$_POST['pwd'];

$sql_search="select password from user where user = "."\"".$name."\"";
$res=mysql_query($sql_search,$conn);
$row=mysql_fetch_row($res);
$sql_del="update user set password="."\"".$pwd."\""." where user="."\"".$name."\"";
echo "$sql_del";
if(!mysql_query($sql_del,$conn)){
   echo "添加数据失败：".mysql_error();
} else {
   echo "添加数据成功！";

}
mysql_close($conn);
?>
