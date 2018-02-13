<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>creat_new</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
var data_js;
function exit_me()
{
	window.close();
	}
function insert_me()
{
	var input_value=document.getElementsByName("text_value");
	var t_name=document.getElementById("t_name");
	var insert_data="";
	var columns="";
	var values="";
	
	for(var i=0;i<input_value.length;i++)
	{
		if (i==input_value.length-1)
		{
			columns+=data_js[i+1];
			values+="\""+input_value.item(i).value+"\"";
		}
		else
		{
		columns+=data_js[i+1]+",";
		values+="\""+input_value.item(i).value+"\""+",";
		}
		}
	 insert_data="insert into "+t_name.value+" ("+columns+")"+" values "+"("+values+")";
     
	alert(insert_data);
	$.post("insert_data.php",{sql_sr:insert_data},function callback(data){alert(data);});

	}
</script>
</head>
<body>
<input type="hidden" id="t_name" value="<?php echo $_POST['file']; ?>"/>
  <?php
 // $a=Json_decode( $_POST["string_tb"]);
  $data=explode(",",$_POST['data']);
  $t_name=$_POST['file'];
  $temp1=json_encode($data);
  //$temp2=json_encode($t_name);
  echo "<script type='text/javascript'>data_js=".$temp1.";</script>";

  $array2 = array("5","9","13","17");
for($i=1;$i<count($data);$i++)
{

 if($i==1){echo "<div>";}
 if(in_array($i,$array2)){echo "</div>";echo "<br/>";echo "<div>";}
 echo "<span style='width:100px;'>".$data[$i]."</span>";
 echo "<input type='text' name='text_value'>";
 
}
echo "</div>";
echo "</fieldset>";

echo "<br/>";
echo "<div>";
 echo "<input type='button' value='新增' onclick='insert_me()'/>";
 echo "<input type='button' value='退出' onclick='exit_me()'/>";
 echo "</div>";
  ?>
</body>
<html>
</html>