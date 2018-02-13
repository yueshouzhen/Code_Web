<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
function return_data($data)
{
require_once "_sql_connect.php";
//登录日志添加 人员+时间
$data1=$data.",".date('c');
$sql_insert="insert into log_login (登录信息) VALUES (\"".$data1."\")";
echo("<script>console.log('".$sql_insert."');</script>"); 
if(!mysql_query($sql_insert,$conn)){
   echo "添加数据失败：".mysql_error();
} else {
   echo "添加数据成功！";

}

//返回人员信息
$sql="select * from user";
$result=mysql_query($sql);
$user_num=mysql_num_rows($result);
for($i=0;$i<$user_num;$i++)
{
$temp_data=mysql_fetch_assoc($result);
$user_data[$i]=$temp_data['user'].",*-".$temp_data['password'];
}
return $user_data;
}
?>
</body>
</html>