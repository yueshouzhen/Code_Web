<?php 


if($_POST['name'] != "NULL")
{
$name=$_POST['name'];
$tel=$_POST['tel'];
$todo="updata";
}
else
{$todo="insert";}

//echo $name;
//echo $tel;
function getdiv($name,$phone,$email,$title,$company,$addr,$idcard,$imag,$yewu,$ids,$bumen)
{	


	$divs=<<<divs
<div class="agileits_reservation">
<!--					<form action="login.html" method="post">-->
					<div class="row"> 
							<div class="col-lg-2">
                            <image src="$imag" style="height:100px; width:200px;"></image>
                            </div>
                            <div class="col-md-6">
                           <!-- <input type="file"  name="imageupload" />-->
						     </div>
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							<input type="text" name="name" placeholder="姓名" required="" value=$name>
                            
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<input type="text" name="phone" placeholder="电话号码" required="" value=$phone> 
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							<input type="text" name="email" placeholder="邮箱" required="" value=$email>
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							<input type="text" name="title" placeholder="职务" required="" value=$title>
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
							<input type="text" name="company" placeholder="单位" required="" value=$company>
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							<input type="text" name="addr" placeholder="通信地址" required="" value=$addr>
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
							<input type="text" name="idcard" placeholder="身份证号" required="" value=$idcard>
						</div>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
							<input type="text" name="dkyw" placeholder="对口业务" required="" value=$yewu>
						</div>
						<input type="text" name="ids" value=$ids class='hidden'>
						<div class="cuisine"> 
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
							<input type="text" name="bumen" placeholder="所在部门" required="" value=$bumen>
						</div>
<!--						<div class="date_btn"> 
							<input type="button" value=""> 
						</div> -->
<!--					</form>-->
</div>
divs;
return $divs;
}
if ($todo=="insert")
{
	//$table=getdiv("","","","","","","images/userimage/home-doctor-1.jpg",'22222');
	$table=getdiv("","","","","","","","images/userimage/home-doctor-1.jpg","","99999","");
}
else
{
require("_sql_connect.php");
$sql="select * from userdata where 姓名=\"$name\" and 联系电话=\"$tel\"";
$result=mysql_query($sql,$conn);
//$arr=array();
$timestamp=time();
while($row=mysql_fetch_row($result))
{  // $ids="user_row_id".($timestamp++);
//$imgstr="images/userimage/".$row[8];
//$table=gettable($ids,$imgstr,$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);//$idme,$src,$name,$title,$company,$tel,$email,$addr,$idcard
//	$arr[]=iconv( "UTF-8//IGNORE", "GBK//IGNORE",$table);
	//$arr=$table;
	$ids=$row[0];
	$name=$row[1];
	$phone=$row[4];
	$email=$row[5];
	$title=$row[2];
	$company=$row[3];
	$addr=$row[6];
	$idcard=$row[7];
$imag="images/userimage/".$row[8];
	$yewu=$row[9];
	$bumen=$row[10];
	$table=getdiv($name,$phone,$email,$title,$company,$addr,$idcard,$imag,$yewu,$ids,$bumen);
	}
}
echo json_encode($table);
?>