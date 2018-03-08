
<?php


header("Content-Type: text/html;charset=utf-8");
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

    preg_match_all('|shtml(.*)<\/a>|i',$data,$m1);//<a target="_blank" href="http://news.sina.com.cn/o/2018-02-13/doc-ifyrkzqr3118396.shtml">习近平：向全国各族人民致以春节的问候</a>

    if(sizeof($m1)<1)
    {return ('NULL');}
    else
    {
        return ($m1);}
}


function gethtml($url,$str_match)
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
    preg_match($str_match,$data,$m1);
   $str=preg_replace('|[0-9a-zA-Z=>\"/]+|','',$m1[1]);
    return ($str);
  //  return iconv('gbk', 'UTF-8', $m1[1]);
}
function gethtml_match_all($url,$str_match)
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
    preg_match_all($str_match,$data,$m1);

    return ($m1);
    //  return iconv('gbk', 'UTF-8', $m1[1]);
}


echo "<pre>";
$link2=array();
$str_start='http://localhost/wangan123.html';
 $str_match='|<h1(.*)<\/h1>|i';//title <h1 class="blue18 title">王岐山不在退休高层名单 任副主席或成定局？</h1>
//artbody    <!-- article content end -->
$str_match2='|<p>(.*?)<\/p>|i';
$link=gethtml($str_start,$str_match);//blkContainer

echo ($link)  ;
$link2=gethtml_match_all($str_start,$str_match2);//blkContainer
$str_result_matr=implode(" ",$link2[0]);
//$str_result_matr=preg_replace("/<a***<\/a>/","",$str_result_matr);
$str_result_matr=preg_replace('/<a.>/',"",$str_result_matr);
//$str_result_matr=preg_replace('/\s/', "", $str_result_matr);


//$str_result_matr=preg_replace("|[0-9a-zA-Z=>\"/]+|","",$str_result_matr);
echo ($str_result_matr);
/* for ($i=1;$i<10;$i++)
{
    $str_start=97000+$i;
    $str_temp='https://www.dy2018.com/i/'.$str_start.'.html';
    $link=getUrl($str_temp);
    if ($link !='NULL'){
        $link="<a href='".$link."'>".$link."</a>";
        echo $link;
        //print_r($link);
        echo '</br>';}
} */
//print_r(getUrl('https://www.dy2018.com/i/99042.html'));


//print_r(gethtml('https://www.dy2018.com/'));
echo "</pre>";
?>


