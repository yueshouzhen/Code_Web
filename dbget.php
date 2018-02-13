<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>getdb</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
var tb_name="";
function altRows(id){
	
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		for(i = 0; i < rows.length; i++){          
		//rows[i].onclick=function(){alert();}
			rows[i].ondblclick=function(){
				alert(tb_name);
			var winPar=window.showModalDialog(tb_name+".php",this.innerHTML,"dialogWidth=1200px;dialogHeight=600px;center=1;");
          if(winPar == "refresh"){history.go(0);}
				
				//alert("hello");
				}
			if(i % 2 == 0){
				
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
//	alert(document.body.clientHeight);

}
</script>
<script type="text/javascript">

</script>
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
	width:100%;
	
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color:#777;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color:#AAA;
}
.oddrowcolor{
	background-color:#BBB;
}
.evenrowcolor{
	background-color:#AAA;
}
</style>
</head>

<body style="width:inherit; height:100%">
<?php
 date_default_timezone_set("Asia/Shanghai");
 if (!isset($_POST['data']))
		{
			echo "hello!".date("Y/m/d");
		    exit;
			}
?>

<!--input type="button" onclick="simple_sql()" value="精简查询"/-->

<!--div style="position:fixed;"-->
    <?php
//在表格中显示表的数据，常用方式
      $sql_position=$_POST['sqlpositon'];
   $sql_step=$_POST['sqlstep'];
   
    $sqltemp=$_POST['data'];
 
   $sql=$sqltemp." limit ".$sql_position.",".$sql_step;
  

  if (stristr($sql,"data_all")){echo "<script type='text/javascript'> tb_name='data_all'</script>";}
  elseif(stristr($sql,"office")){echo "<script type='text/javascript'> tb_name='office'</script>";}
   elseif(stristr($sql,"dh_table")){echo "<script type='text/javascript'> tb_name='dh_table'</script>";}
  elseif(stristr($sql,"tools")){echo "<script type='text/javascript'> tb_name='tools'</script>";}  
elseif(stristr($sql,"others")){echo "<script type='text/javascript'> tb_name='others'</script>";}
elseif(stristr($sql,"log_login")){echo "<script type='text/javascript'> tb_name='log_login'</script>";} 
else{}

    //'SELECT * FROM data_all'
  // require("_showtabel.php");
      function ShowTable($sql){
        require("_sql_connect.php");
        mysql_query("set names utf8");
		
		//$res_temp=mysql_query($sql_temp,$conn);
		//$rows_temp=mysql_affected_rows($conn);
		mysql_query($_POST['data'],$conn);
		$lieshu=mysql_affected_rows($conn);
		 echo "<div><input type='hidden' value=".$lieshu." /></div>";
		$res=mysql_query($sql,$conn);
        $rows=mysql_affected_rows($conn);//获取行数
	    echo "<script type='application/javascript'></script>";
        
		$colums=mysql_num_fields($res);//获取列数
        //echo "test数据库的"."$table_name"."表的所有用户数据如下：<br/>";
        //echo "共计".$rows."行 ".$colums."列<br/>";
      
	     
        echo "<table class='altrowstable' id='alternatecolor'><tr>";
         echo "<th>选择</th>";
		for($i=0; $i < $colums; $i++){
            $field_name=mysql_field_name($res,$i); 
            echo "<th>$field_name</th>";
        }
	    echo "</tr>";
		
		
		
		//echo json_encode($color);
        while($row=mysql_fetch_row($res)){
            echo "<tr>";
           echo"<td> <input type='checkbox' name='td_ck' value=$row[0]> </td>";
			for($i=0; $i<$colums; $i++){
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ShowTable($sql);

	
?>


<!--/div-->
	


  
  


</body>
</html>