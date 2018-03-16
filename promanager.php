<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>promanager</title>
<!--<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function(e) {
    $("#newpro").click(function(e) {
       window.showModalDialog("newpro.php","hi","dialogwidth:1000px;dialogheight:600px");
    });
});
</script>
</head>

<body style="margin:0; padding:0; background-color:#EEE;">
    <div class="container">
    	<div class="row">
        	<div class="col-lg-2">
            <button type="button" class="btn btn-default" id="newpro">新建项目</button>
            </div>
        </div>
    
    
    </div>
</body>
</html>