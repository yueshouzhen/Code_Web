<?php
//sql_tb:life_time,sql_col:strs[2
require_once "_sql_connect.php";
//登录日志添加 人员+时间
$sql_get="select * from life_time where 资产编码 = "."\"".$_POST['sql_col']."\"";


$res=mysql_query($sql_get,$conn);
$colums=mysql_num_fields($res);
while($row=mysql_fetch_row($res)){
           
			for($i=0; $i<$colums; $i++){
                echo "$row[$i],";
			}
        }


?>