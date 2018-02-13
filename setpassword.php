<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账号设置</title>
<link rel="stylesheet" href="css/changepwd_style.css" type="text/css"/>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="application/javascript">
var name = window.dialogArguments;
$(document).ready(function(){
  if(name=="admin_jl")
		{
		$("#admin_tb").show()
		}
		else
		{
			$("#adm_tb").hide()
			}
    });
function submit_me()
{          

	//alert(argus);
	var pwd_old=$("#pwd_old").val();
	var pwd_new1=$("#pwd_new1").val();
    var pwd_new2=$("#pwd_new2").val();	
if(pwd_new1==pwd_new2){
	//alert("ok");
	$.post("setpwd.php",{title:name,pwd_new:pwd_new1,pwd:pwd_old},(function(data,state){if(state=='success'){
		alert("密码修改成功！");
	    window.close();
		}
	
	}));
	
	}
else{
	alert("两次密码输入不一致！");
	}	
	}
	
	function update_position()
	{
		
		$.post("updata_position.php",function callback(data,status){
			alert(data)});
	}
</script>
</head>

<body>

<div class="setpwd" >


  <p><span>修改密码</span></p>
  <div class="longtitile">
   <label> 输入原密码</label>
   <input type="password" id="pwd_old" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
  </div>
  <div class="longtitile">
   <label> 输入新密码</label>
  <input type="password"  id="pwd_new1" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
  </div>
  <div class="longtitile">
  <label>确认新密码</label>
 <input type="password"  id="pwd_new2" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
 </div>
<input type="button" id="submit_me" onclick="submit_me()" value="确认修改"/>

</div>
<div class="admin_tb" id="adm_tb"> 
<input type="button" onclick="update_position()" value="更新position.txt" /> 

</div>

</body>
</html>
