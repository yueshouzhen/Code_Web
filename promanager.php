
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>promanager</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="css/projectmanager.css" rel="stylesheet" />
<script type="text/javascript">
$(document).ready(function(e) {
	var box="<div class='col-md-4'>"+"<div class='box'>"+"<i class='fa fa-id-card'>xiangmubianhao</i>"+"<h4>xiangmumingcheng</h4>"+"<p>jianjie</p>"+"<a onclick='gotoguanli(\"neirong\")' class='btn btn-transparent' id='gotoguanli'>管理项目</a>"+"</div>"+"</div>"
	//
	$.post("getproject.php","",function(data){
		var obj= eval('(' + data + ')');
		for(var i=0;i<obj.number;i++)
		{
		var obj1=obj.content[i];
		//alert(obj1.项目名称);	
		var box1=box.replace("xiangmubianhao",obj1.项目编号);
		box1=box1.replace("xiangmumingcheng",obj1.项目名称);
		box1=box1.replace("jianjie",obj1.项目简介);
		box1=box1.replace("neirong",obj1.项目编号);
		$("#addbox").append(box1);
			}
		});
	
    $("#newpro").click(function(e) {
       window.showModalDialog("newpro.php","hi","dialogwidth:1000px;dialogheight:600px");
    });
 
			 
});
/*function repalcejs(data)
{
	var str1= new RegExp("<link href=\"bootstrap-3.3.7-dist/css/bootstrap.min.css\"  rel=\"stylesheet\" />","g");
			//alert(str1);
	var str2=new RegExp("<script src=\"js/jquery.min.js\" type=\"text/javascript\" >","g");
			
	var str3=new RegExp("<script src=\"bootstrap-3.3.7-dist/js/bootstrap.min.js\" type=\"text/javascript\">","g");
	var data=data.replace(str1,"");
	var data=data.replace(str2,"");
	var data=data.replace(str3,"");
	return(data);
	}*/
 function gotoguanli(neirong){
	// alert(neirong);
	
	$.get("prodetail.php",{"projectname":neirong},function(data){$("#newcontent").html( repalcejs(data));})
//$("#newcontent").html($("button").eq(0).html());
	 }
</script>
</head>

<body >
    <div class="container" style="width:100%">
    	<div class="row center-block">
        	<div class="col-md-6">
            
            <button type="button" class="btn btn-default" id="newpro">新建项目</button>
            </div>
            <div class="col-md-6">
            <button type="button" class="btn btn-default" id="newpro">删除项目</button>
            </div>
        </div>
    	<div class="notification-boxes row" style="margin-top:20px;" id="addbox">
        	<!--<div class="col-md-4">
				<div class="box">
					<i class="fa fa-id-card">项目1</i>
					<h4>Qualified Doctors</h4>
					<p>Lorem ipsum dolorit amet consetur adipiscing Morbi sollicitudin </p>
					<a href="doctors.html" class="btn btn-transparent">Read More</a>
				</div>
			</div>-->
        </div>
    
    </div>
</body>
</html>