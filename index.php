<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> this is a db learning !</title>
<style type="text/css">
h1.bg{background-image:url('http://www.w3school.com.cn/i/eg_tulip.jpg');}
p.title{
	color:rgb(10,10,10);
	text-align:center;
}

.main{
	text-align:adjustment;
	color:red;

}
</style>
</head>
<body>
<h1 class=bg> this is a test! </h1>
<?php
header("Content-Type: text/html;charset=gbk");


function getUrl($url)
{
$m1=array();
//$url = 'https://www.dy2018.com/i/99042.html';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
$data = curl_exec($curl);
curl_close($curl);

//preg_match('|<title>(.*)<\/title>|i',$data,$m);

//print_r($m[1]);

preg_match('|>ftp(.*)<\/a>|i',$data,$m1);

if(sizeof($m1)<1)
{return ('NULL');}
    else
    {
return ('ftp'.$m1[1]);}
}


function gethtml($url)
{
    $m1=array();
    //$url = 'https://www.dy2018.com/i/99042.html';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
    $data = curl_exec($curl);
    curl_close($curl);

    //preg_match('|<title>(.*)<\/title>|i',$data,$m);

    //print_r($m[1]);

    preg_match('|>ftp(.*)<\/a>|i',$data,$m1);

    return ('ftp'.$m1[1]);
}


for ($i=1;$i<10;$i++)
{
    $str_start=97000+$i;
    $str_temp='https://www.dy2018.com/i/'.$str_start.'.html';
    $link=getUrl($str_temp);
if ($link !='NULL'){
    $link="<a href='".$link."'>".$link."</a>";
    echo $link;
    //print_r($link);
    echo '</br>';}
}
//print_r(getUrl('https://www.dy2018.com/i/99042.html'));


//print_r(gethtml('https://www.dy2018.com/'));
?>







</body>
</html>