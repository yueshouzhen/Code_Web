<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>dialog</title>
<script type="text/javascript">
   function getValue(){
      var value=window.dialogArguments;//通过dialogArguments方法拿到父窗口中的value值
	  document.forms[0].userName.value=value;
   }
   
   function closeWindow(){
        window.returnValue=document.forms[0].userName.value;
		//关闭模态窗口的同时，通过returnValue方法将模态窗口中的value值传给父窗口中的value
		window.close();
   }
</script>
</head>

<body onload="getValue()">
<form>
<input type="text" name="userName"><br /><br />
<input type="button" value="关闭" onclick="closeWindow()">
</form>
</body>
</html>
