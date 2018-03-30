<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function fsubmit() {
        var form=document.getElementById("form1");
        var fd =new FormData(form);
		console.log(fd);
        $.ajax({
             url: "server.php",
             type: "POST",
             data: fd,
             processData: false,  // 告诉jQuery不要去处理发送的数据
             contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
             success: function(response,status,xhr){
                console.log(status);
                var json=$.parseJSON(response);
                var result = '';
                result +="个人信息：<br/>name:"+json['name']+"<br/>gender:"+json['gender']+"<br/>number:"+json['number'];
                 result += '<br/>头像：<img src="' + json['photo'] + '" height="100" style="border-radius: 50%;" />';
                 $('#result').html(result);
             }
        });
        return false;
    }
</script>
</head>

<body>
<form name="form1" id="form1">  
        <p>name:<input type="text" name="name" /></p>  
        <p>gender:<input type="radio" name="gender" value="1" />male <input type="radio" name="gender" value="2" />female</p>
        <p>stu-number：<input type="text" name="number" /></p>  
        <p>photo:<input type="file" name="photo" id="photo"></p>  
        <p><input type="button" name="b1" value="submit" onclick="fsubmit()" /></p>  
</form>  
<div id="result"></div>
</body>
</html>