
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery饼状图比例分布数据显示代码</title>

<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jsapi.js"></script>
<script type="text/javascript" src="js/corechart.js"></script>		
<script type="text/javascript" src="js/jquery.gvChart-1.0.1.min.js"></script>
<script type="text/javascript" src="js/jquery.ba-resize.min.js"></script>
<script type="text/javascript">
gvChartInit();
$(document).ready(function(){
	$('#myTable5').gvChart({
		chartType: 'PieChart',
		gvSettings: {
			vAxis: {title: 'No of players'},
			hAxis: {title: 'Month'},
			width: 600,
			height: 350
		}
	});
});
</script>

<script type="text/javascript">
gvChartInit();
$(document).ready(function(){
		$('#myTable1').gvChart({
			chartType: 'ColumnChart',
			gvSettings: {
			vAxis: {title: ''},
			hAxis: {title: ''},
			width: 600,
			height: 350
		}
	});
});
</script>

</head>


<body>

	<div style="width:100%; position:absolute;">

	   <table id='myTable5' >
			<caption>设备统计</caption>
			<thead>
				<tr>
					<th></th>
					<th>工程系统</th>
					<th>维护系统</th>
					<th>办公系统</th>
					<th>其他</th>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>1200</th>
					<td>200</td>
					<td>300</td>
					<td>150</td>
					<td>180</td>
				</tr>
			</tbody>
		</table>  
</div>
<div style="width:100%; margin-left:500px;">
	   <table id='myTable1'>
			<caption>生命周期分布</caption>
			<thead>
				<tr>
					<th></th>
					<th>在保设备</th>
					<th>近保设备</th>
                    <th>过保设备</th>
                    <th>下线设备</th>
                    <th>报废设备</th>
				</tr>
			</thead>
			<tbody>
				<tr>
                   <?php $num_total= explode(',',$_POST['data']);  ?>
					<th>生命周期统计</th>
					<td><?php  echo ($num_total[0]); ?></td>
					<td><?php  echo ($num_total[1]); ?></td>
                    <td><?php  echo ($num_total[2]); ?></td>
					<td><?php  echo ($num_total[3]); ?></td>
                    <td><?php  echo ($num_total[4]); ?></td>
					</tr>
			</tbody>
		</table>  
	
	</div>	


</body>
</html>
