<?php 
require("_sql_connect.php");
//$sql="select  panelname,links,count(panelname) from prodata group by panelname order by links";
 date_default_timezone_set("Asia/Shanghai");
 $timestamp=time();
$project=$_POST['proname'];
function returntable($idme,$fname,$path_str,$file_str){
$tableme=<<<tableme
<tr id="$idme">
 <td style=" width:35%;">$file_str</td>
 <td style=" width:55%;">$path_str</td>
 <td style="width:20%;" >  
 <img class="img-circle" src="images/Arrow Down 3.png" style="height:30px" onclick="downloadMe('$idme')"/>
 <img class="img-circle" src="images/Button Delete.png" style="height:30px" onclick="delateMe('$idme')"/>
 </td>
</tr>
tableme;
return $tableme;
};

$sql="select panelname,links,filename from prodata where project=\"$project\" order by panelname";
$arr_file=array();
$result=mysql_query($sql);
if ($row=mysql_num_rows($result))
{
while($row= mysql_fetch_row($result))
{
	$timestamp++;
	$panname=$row[0];
	$linkme=$row[1];
	$filename=$row[2];
	$idme=$panname."_row_".$timestamp;
/* $arr_file['panelname']=$row[0];
 $arr_file['links']=$row[1];*/
 $arr_file[]=returntable($idme,$panname,$linkme,$filename);
}

echo json_encode($arr_file);
}
else{
	
	echo "noresult";
	}

?>