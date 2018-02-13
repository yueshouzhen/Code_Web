<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>检测登录是否合法</title>
</head>

<body>
<?php
session_start();
date_default_timezone_set("Asia/Shanghai");
$name=$_POST['user_name'];
$pwd=$_POST['user_pwd'] ;
$check_in=$name.",*-".$pwd;
require_once("_return_data.php");
$user_dat=return_data($name);
$check_in_flag=false;
for($i=0;$i<(count($user_dat));$i++)
{
	if ($check_in==$user_dat[$i])
	{
		echo "<script type='text/javascript'> location='pro_index.php';</script>";
		$check_in_flag=true;
		$_SESSION['user']=$name;
		$_SESSION['state']="ACK";
		$_SESSION['time_in']=time();
		
		break;
	}
	else
	{continue;}
}
if($check_in_flag==false)
{echo "<script type='text/javascript'> alert('登录失败！请检查输入是否有误！');location='login.html';</script>";}
		//$_SESSION['state']="Fail";}

?>


</body>
</html>