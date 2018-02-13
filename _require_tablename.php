<?php
switch($_GET['table_name'])
{
case "life_time":
	$table=array("Id","资产编码","生产时间","购买时间","入库时间","施工时间","交维时间","过保时间","下线时间","报废时间");
		echo json_encode($table);
	break;
case "office":
		$table=array("Id","资产编码","资产姓名","规格型号","购买价格","数量","盘点结果","使用情况","存放地点","具体位置","使用部门","使用人","所属系统","设备类型","机密类型","设备序列号","记录人","记录时间","备注");
			echo json_encode($table);
		break;
case "dh_table":
$table=array("Id","资产编码","资产姓名","设备类型","规格型号","设备编码","设备序列号","原值","所在楼房","所在房间","所在位置","管理部门","使用人","所属主系统","所属子系统","使用情况","合同号","记录人","记录时间","备注");
			echo json_encode($table);
		break;
case "log_login":
$table=array("Id","登录信息");
	echo json_encode($table);
break;
case "tools":
$table=array("Id","资产编码","设备名称","使用人","设备价格","设备状态");
	echo json_encode($table);
break;
default:
break;	
}
?>