<?php
header("Content-type: text/html; charset=utf-8");

/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
/*$targetFolder = '/upload'; // Relative to the root

//$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES)) {
	$tempFile = $_FILES['inputfile']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['inputfile']['name'];
	echo $targetFile;
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','docx'); // File extensions
	$fileParts = pathinfo($_FILES['inputfile']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}*/
require("_sql_connect.php");
date_default_timezone_set("Asia/Shanghai");
$fname=$_POST['filename'];
$project=$_POST['project'];
$panelname=$_POST['panelname'];
$img = $_FILES['inputfile'];//获取到表单过来的文件变量，uploadImg为表单id
//检测变量是否获取到
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
if($img['error']>0){
$error = '上传失败';
switch('error'){
case 1: 
$error.='大小超过了服务器设置的限制！';
break;
case 2: 
$error.='文件大小超过了表单设置的限制！';
break;
case 3: 
$error.='文件只有部分被上传';
break;
case 4: 
$error.='没有文件被上传';
break;
case 6: 
$error.='上传文件的临时目录不存在！';
break;
case 7: 
$error.='写入失败';
break;
default: 
$error.='未知错误';
break;
}
exit($error);//在php页面输出错误
}else{
	$timestamp=time();
$type = strrchr($img['name'], '.');//截取文件后缀名
$imgname= iconv("UTF-8", "gb2312", $img['name']);
$path_str=$timestamp.$img['name'];
$path = "./upload/".$timestamp.$imgname;//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
//echo (time());

$fileTypes = array('jpg','jpeg','gif','png','docx','.doc','.xlsx','.xls','.pdf','.rar','.zip'); 
$fileParts = pathinfo($_FILES['inputfile']['name']);

if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($img['tmp_name'], $path);
		//echo '________上传成功';
	} else {
		echo 'Invalid file type.';
	}
$sql="insert into prodata (filename,panelname,project,links) values (\"$fname\",\"$panelname\",\"$project\",\"$path_str\")";

//echo $sql;
if(mysql_query($sql,$conn)){
	//echo "添加成功";
	$idme=$panelname."_row_".$timestamp;
$tableme=<<<tableme
<tr id=$idme>
 <td style=" width:35%;">$fname</td>
 <td style=" width:55%;">$path_str</td>
 <td style="width:20%;" >  
 <img class="img-circle" src="images/Arrow Down 3.png" style="height:30px" onclick="downloadMe('$idme')"/>
 <img class="img-circle" src="images/Button Delete.png" style="height:30px" onclick="delateMe('$idme')"/>
 </td>
</tr>
tableme;
echo $tableme;
}
else {echo "添加失败";}
	//INSERT INTO `test`.`prodata` SET `Id`=1,`filename`='dsf',`panelname`='dfasd',`project`='dfa',`links`='afad';

	
//if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif')//判断上传的文件是否为图片格式
//{
//move_uploaded_file($img['tmp_name'], $path);//将图片文件移到该目录下
//echo "文件上传成功";
//}
}
}



?>