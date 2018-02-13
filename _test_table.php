
<?php

 header("Content-type:application/vnd.ms-excel");
 header("Content-Disposition:filename=xls_region.csv");

 $cfg_dbhost = 'localhost';
 $cfg_dbname = 'test';
 $cfg_dbuser = 'root';
 $cfg_dbpwd = 'root';
 $cfg_db_language = 'utf8';
 // END 配置

 //链接数据库
 $link = mysql_connect($cfg_dbhost,$cfg_dbuser,$cfg_dbpwd);
 mysql_select_db($cfg_dbname);
 //选择编码
 mysql_query("set names ".$cfg_db_language);

 //users表
 $sql = "desc users";

 $res = mysql_query($sql);
 echo "<table><tr>";
 //导出表头（也就是表中拥有的字段）
 while($row = mysql_fetch_array($res)){
  $t_field[] = $row['Field']; //Field中的F要大写，否则没有结果
  echo "<th>".$row['Field']."</th>";
 }
 echo "</tr>";
 //导出100条数据
 $sql = "select * from testdb limit 100";
 $res = mysql_query($sql);
 while($row = mysql_fetch_array($res)){
  echo "<tr>";
  foreach($t_field as $f_key){
   echo "<td>".$row[$f_key]."</td>";
  }
  echo "</tr>";
 }
 echo "</table>";

?>
