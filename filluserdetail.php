<?php 

date_default_timezone_set("Asia/Shanghai");
function gettable($idme,$src,$name,$title,$company,$tel,$email,$addr,$idcard,$yewu)
{
$tableme=<<<tableme
<div class="col-md-2 fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInUp;" id="$idme">
<div class="bio-box" >
<div class="profile-img">
<img src="$src"  class="img-responsive img-center-sm img-center-xs">
<div class="overlay" >
<ul class="list-unstyled list-inline sm-links" >
<li onclick="deleteme('$idme','$name','$tel')" ><a href="#"><i class="fa fa-remove"></i></a></li>
<li onclick="geterweima('$idme','$name','$tel')"><a  href="#"><i class="fa fa-weixin"></i></a></li>
<li  onclick="getmoreinfo('$idme','$name','$tel')"><a href="#"><i  class="fa fa-bars"></i></a></li>
</ul>
</div>
</div>
<div class="inner">
<h5>$name $title</h5>
<p class="designation">$company</p>
<p class="divider"><i class="fa fa-plus-square"></i></p>
<p>联系电话:$tel</p>
<!--<p>邮箱地址:$email</p>-->
<p>对口业务:$yewu</p>
<!--<p>通信地址:$addr</p>
<p class="divider"><i class="fa fa-plus-square"></i></p>
<p>身份证号:$idcard</p>-->
</div>
<a href="#" class="btn btn-secondary text-uppercase" onclick="getmoreinfo('$idme','$name','$tel')">更新联系人</a>
</div>
</div><!--col-md-->	

tableme;

return $tableme;
}


require("_sql_connect.php");
$sql="select * from userdata";
$result=mysql_query($sql,$conn);
$arr=array();
$timestamp=time();
while($row=mysql_fetch_row($result))
{   $ids="user_row_id".($timestamp++);
$imgstr="images/userimage/".$row[8];
$table=gettable($ids,$imgstr,$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[9]);//$idme,$src,$name,$title,$company,$tel,$email,$addr,$idcard
//	$arr[]=iconv( "UTF-8//IGNORE", "GBK//IGNORE",$table);
	$arr[]=$table;
	}

$arr_json=json_encode($arr);
echo $arr_json;
?>