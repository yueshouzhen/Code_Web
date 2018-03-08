<?php 
date_default_timezone_set("Asia/Shanghai");
class Weibo{
	public $hetong="";
	public $state="";
	public $number=0;
	}


require("_sql_connect.php");
$sql="select 合同号,维保开始时间,维保结束时间 from weibao where 维保开始时间 is  not null order by 合同号 asc, 维保开始时间 desc";//获得按照维保开始时间排序的表

$sql2="select t.* from ($sql)t group by t.合同号";//将最新的维保信息呈现出来
//print_r($sql2);
$result=mysql_query($sql2,$conn); 
//print_r($result);
$result_weibo=array();

$zaibao=new Weibo();//新建维保条目
$jinbao=new Weibo();
$guobao=new Weibo();

	function getnum($str){
	$sql_num="select count(*) from dh_table where 维保情况 = '有' and 合同号 = '$str' ";
	$result_temp=mysql_query($sql_num);
	$num=mysql_fetch_array($result_temp);
	return $num[0];	
	}
while($row=mysql_fetch_array($result)){

		$time_temp=time()-strtotime($row[2]);
		$time_temp=(int)($time_temp/60/60/24);//根据维保结束时间推算是否过保
		if ($time_temp>=0)
		{//过保
		$guobao->hetong=($guobao->hetong==""?($row[0]):($guobao->hetong.",".$row[0]));
		$guobao->state="guobao";
		$guobao->number+=getnum($row[0]);
		}
		elseif($time_temp<=-60)
		{//在保
		$zaibao->hetong=($zaibao->hetong==""?($row[0]):($zaibao->hetong.",".$row[0]));
		$zaibao->state="jinbao";
		$zaibao->number+=getnum($row[0]);		
		}
		elseif($time_temp<0 and $time_temp>-60)
		{//近保
		$jinbao->hetong=($jinbao->hetong==""?($row[0]):($jinbao->hetong.",".$row[0]));
		$jinbao->state="jinbao";
		$jinbao->number+=getnum($row[0]);		
		}
	

	}//循环结束
	$result_weibo[]=$zaibao;
	$result_weibo[]=$jinbao;
	$result_weibo[]=$guobao;
//	print_r($result_weibo);
$str=json_encode($result_weibo);
$str= preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);//json字符串含有中文，需要转换
print_r($str);
//echo $str;
?>