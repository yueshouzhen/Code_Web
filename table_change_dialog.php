<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>dialog</title>
<script type="text/javascript">
   function getValue(){
      var value=window.dialogArguments;//ͨ��dialogArguments�����õ��������е�valueֵ
	  document.forms[0].userName.value=value;
   }
   
   function closeWindow(){
        window.returnValue=document.forms[0].userName.value;
		//�ر�ģ̬���ڵ�ͬʱ��ͨ��returnValue������ģ̬�����е�valueֵ�����������е�value
		window.close();
   }
</script>
</head>

<body onload="getValue()">
<form>
<input type="text" name="userName"><br /><br />
<input type="button" value="�ر�" onclick="closeWindow()">
</form>
</body>
</html>
