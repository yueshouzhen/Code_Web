   <?php
    function ShowTable($sql){
        require("_sql_connect.php");
        mysql_query("set names utf8");
		$res=mysql_query($sql,$conn);
        $rows=mysql_affected_rows($conn);//获取行数
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
	?>