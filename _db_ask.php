
<table class="altrowstable " id="alternatecolor" >
         <tr>
    <?php
    //引用conn.php文件
        require '_sql_connect.php';
        //查询数据表中的数据
    $query = "SHOW COLUMNS FROM data_all ";
  $field_result = mysql_query($query);
		 $sql = mysql_query("select * from data_all");
		 $datarow = mysql_num_rows($sql); //长度
		  $field_num = mysql_num_fields($sql);
  for($i=0;$i<=$field_num;$i++)
  {
  if ($i==($field_num))
  {echo "</tr>";}
   else
   {
  $filed_result= mysql_fetch_assoc($field_result);
  $filed_name=$filed_result['Field'];
  $data_id[$i]=$filed_name;
  echo "<th>$filed_name</th>";
  }
  }

            //循环遍历出数据表中的数据
         for($i=0;$i<$datarow;$i++)
		  {
                $sql_arr = mysql_fetch_assoc($sql);
				for($j=0;$j<$field_num;$j++)
				{   
					$data_id_r=$data_id[$j];
					if($j==0)
					//{print_r($data_id[$j]); }
					{echo"<tr><td>$sql_arr[$data_id_r]</td>";}
					elseif($j==($filed_name-1))
					//{print_r ($data_id[$j]); }
					{echo"<td>$sql_arr[$data_id_r]</td></tr>";}
					else
					//{print_r ($data_id[$j]); }
					{echo "<td>$sql_arr[$data_id_r]</td>";}
				}
		   } 
	  
	  
	             
      ?>
</table>
