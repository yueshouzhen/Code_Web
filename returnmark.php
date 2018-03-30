
<?php  
include "phpqrcode/phpqrcode.php";
function getidcard($name,$title,$org,$tel,$addr,$email)
{
	$content='BEGIN:VCARD'."\n";  
$content.='VERSION:2.1'."\n";  
$content.="N:$name"."\n";  
$content.="TITLE:$title"."\n";  
$content.="ORG:$org"."\n";  
$content.="TEL;WORK;VOICE:$tel"."\n";    
$content.="ADR;HOME:;;$addr"."\n";  
$content.="EMAIL:$email"."\n";   
$content.='END:VCARD'."\n";
	return $content;
	}
	
require("_sql_connect.php");

$names=$_POST['name'];
$tels=$_POST['tel'];

$sql="select * from userdata where 姓名=\"$names\" and 联系电话=\"$tels\"";
$result=mysql_query($sql,$conn);
//echo $tels;   
//echo $sql; 
while($row=mysql_fetch_row($result))
{  
//$idme,$src,$name,$title,$company,$tel,$email,$addr,$idcard
//	$arr[]=iconv( "UTF-8//IGNORE", "GBK//IGNORE",$table);
//$table=gettable($ids,$imgstr,$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
$name=$row[1];
$title=$row[2];
$org=$row[3];
$tel=$row[4];
$email=$row[5];
$addr=$row[6];

//$url="www.baidu.com";
$values=getidcard($name,$title,$org,$tel,$addr,$email);
$errorCorrectionLevel = 'L';//容错级别     
$matrixPointSize = 6;//生成图片大小
QRcode::png($values, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$QR = 'qrcode.png';//已经生成的原始二维码图     
  $QR = imagecreatefromstring(file_get_contents($QR));   
  unlink('qrcode.png');  
imagepng($QR,'code.png'); 
echo '<img src="code.png">';  
	}

	




     
//生成二维码图片     
 
//$logo = 'logo1.png';//准备好的logo图片     

/*if ($logo !== FALSE) {     
     $QR = imagecreatefromstring(file_get_contents($QR));    
    $logo = imagecreatefromstring(file_get_contents($logo));     
    $QR_width = imagesx($QR);//二维码图片宽度     
    $QR_height = imagesy($QR);//二维码图片高度     
    $logo_width = imagesx($logo);//logo图片宽度     
    $logo_height = imagesy($logo);//logo图片高度     
    $logo_qr_width = $QR_width / 5;     
    $scale = $logo_width/$logo_qr_width;     
    $logo_qr_height = $logo_height/$scale;     
    $from_width = ($QR_width - $logo_qr_width) / 2;     
    //重新组合图片并调整大小     
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,     
    $logo_qr_height, $logo_width, $logo_height);     
} */    
//输出图片    
  
?> 