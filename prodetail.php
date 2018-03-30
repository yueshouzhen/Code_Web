<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">

//num_file_kexing=1;
//window.onload=fillme();

$(document).ready(function(e) {
    var projectname=<?php echo "\"".$_GET['projectname']."\"" ?>;
	//alert("yuesz"+name);
//	alert($("#kexing_input_1").html() );


	$.post("fillprodetail.php",{proname:projectname},function(data,status){
		//alert(data);
		//var i= data.length;
		//alert(data[0]);
	//alert(data);
		if(data=="noresult")
		{//alert("没有数据！");
		return;
		}
		
		var datame=eval(data)
		var num=datame.length;
		var panelname="";
		for(var i=0; i<num;i++)
		{
			//alert(datame[i]);
			var row_temp=datame[i];
			//alert(row_temp);
			
			panelname=row_temp.match(/"(.*?)_/);
			//alert(panelname[1]);
			//alert(panelname[1]);
			addcontent(panelname[1],row_temp);
			}
		
		})
	//$("#panel1").append(content);
	
});
function fillme(content)
{
	//alert("ddddsdd"+content);

	
	}
function addcontent(id, content)
{
	//num_file_kexing++;
	//var str1="<tr id='kexing_file_"+num_file_kexing+"'><td style='width:20%;'><input type='text' class='form-control' placeholder='请输入文件名' /></td> <td style='color:#888; width:70%;'><input type='file'/></td><td style='width:10%;' ><img class='img-circle' src='images/Arrow Up 3.png' style='height:30px' onclick='uploadMe(\"kexing_file_"+num_file_kexing+"\")' /><img class='img-circle' src='images/Arrow Down 3.png' style='height:30px' onclick='downloadMe(\"kexing_file_"+num_file_kexing+"\")'/><img class='img-circle' src='images/Button Delete.png' style='height:30px' onclick='delateMe(\"kexing_file_"+num_file_kexing+"\")'/></td></tr>"
//alert(str1);
	
//alert ($("#sample_kexing").html());
	var idme="#"+id;
	$(idme).append(content);
/*	$("#panel1").removeClass("table");
	$("#panel1").removeClass("table-striped");
	$("#panel1").removeClass("table-hover");
	$("#panel1").addClass("table");
	$("#panel1").addClass("table-striped");
	$("#panel1").addClass("table-hover");*/  
	}
	
function uploadMe(fileinput,pname,textid)
{
	//alert(id);
var uploading = false;
    if(uploading){
        alert("文件正在上传中，请稍候");
        return false;
	}
	//var fd=(document.getElementById(content));
   // alert(fd.innerHTML)
	var form=new FormData();
	//alert ($(content).val());
	var obj=document.getElementById(fileinput).files[0];
	//alert (typeof(obj));
	
	
	var name=<?php echo "\"".$_GET['projectname']."\"" ?>;
	form.append('inputfile', obj);
	form.append('filename',$(textid).val());
	form.append('project',name);
	form.append('panelname',pname);
	//console.log(form);
	//alert ($('#kexing_input_1').val());
    $.ajax({
        url: "uploadify.php",
        type: 'POST',
        cache: false,
        data: form,
        processData: false,
        contentType: false,
        dataType:"text",
     beforeSend: function(){
            uploading = true;
        },
        success: function(data,status){
		//	alert(data);
			addcontent(pname,data);
			//alert(status);
			//console.log(data);
			},
		error:function(){
				alert('发生了错误！');}
    });
	
	}
function downloadMe(content)
{var id="#"+content;
	//alert(id);
	var files=($(id).children().eq(1).html());
	window.location.href="./upload/"+files; 
	}
function delateMe(rowid)
{
	//alert(content);
	var id="#"+rowid;
	//alert($(id).html());
	var filename=($(id).children().eq(1).html());
alert(filename);
	
//	
	$.post("delprodetail.php",{'fileme':filename},function(data,status)
	{
		//alert(data);
	if (data=="ok")
	{
		$(id).remove();
		}
		else{
			alert(data);
			
			}
	})
	
	}
	
function filechange(obj,textid)
{
	//alert($(obj).parent().parent('tr').attr('id'));
	var textids="#"+textid;
	alert($(obj).val());
	var str=$(obj).val();
	str=str.substring((str.indexOf("\\",3)+1),str.indexOf(".",3));
	$(textids).val(str);
alert(str);
	}
</script>


</head>

<body>
<div class="container">
  <h2><?php //echo $_GET['projectname'] ?></h2>
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">项目立项阶段</a></li>
    <li><a data-toggle="tab" href="#menu1">招标阶段</a></li>
    <li><a data-toggle="tab" href="#menu2">合同执行阶段</a></li>
    <li><a data-toggle="tab" href="#menu3">验收阶段</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" id="kexing_panel">
                <div class="panel-heading ">可行性报告</div><!-- panel-head -->
                <!-- <img class="img-circle" onclick="addcontent('panel1')" style="height:30px;" src="images/Button Add.png" />-->
                <div class="panel-body">
                    <div class="col-md-6">
                    <input id="kexing_name_1" type="text" class="form-control" placeholder="请输入文件名" />
                    </div>
                    <div class="col-md-4">
                    <input id="kexing_input_1" type="file" onchange="filechange(this,'kexing_name_1')" accept=".docx,.png,.zip" />
                    </div>
                    <div class="col-md-2">
                    <img class="img-circle" src="images/Arrow Up 3.png" style="height:30px" onclick="uploadMe('kexing_input_1','kexing','#kexing_name_1')"/>
                    </div>
                    <table class=" table table-striped table-hover" >
                    <tbody id="kexing">
                    </tbody>
                    </table>
                </div><!-- panel-body -->
                <div class="panel-footer">
                </div><!-- panel-footer -->
            </div><!-- panel-end-->
        </div><!-- col-lg-12-->
        </div><!-- row -->

              <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" id="qingshi_panel">
                <div class="panel-heading ">请求及批复</div><!-- panel-head -->
                <!-- <img class="img-circle" onclick="addcontent('panel1')" style="height:30px;" src="images/Button Add.png" />-->
                <div class="panel-body">
                    <div class="col-md-6">
                    <input id="qingshi_name_1" type="text" class="form-control" placeholder="请输入文件名" />
                    </div>
                    <div class="col-md-4">
                    <input id="qingshi_input_1" type="file" onchange="filechange(this,'qingshi_name_1')" accept=".docx,.png,.zip" />
                    </div>
                    <div class="col-md-2">
                    <img class="img-circle" src="images/Arrow Up 3.png" style="height:30px" onclick="uploadMe('qingshi_input_1','qingshi','#qingshi_name_1')"/>
                    </div>
                    <table class=" table table-striped table-hover" >
                    <tbody id="qingshi">
                    </tbody>
                    </table>
                </div><!-- panel-body -->
                <div class="panel-footer">
                </div><!-- panel-footer -->
            </div><!-- panel-end-->
        </div><!-- col-lg-12-->
        </div><!-- row -->
      
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" id="zhaobiaowenjian_panel">
                <div class="panel-heading ">招标文件</div><!-- panel-head -->
                <!-- <img class="img-circle" onclick="addcontent('panel1')" style="height:30px;" src="images/Button Add.png" />-->
                <div class="panel-body">
                    <div class="col-md-6">
                    <input id="zhaobiaowenjian_name_1" type="text" class="form-control" placeholder="请输入文件名" />
                    </div>
                    <div class="col-md-4">
                    <input id="zhaobiaowenjian_input_1" type="file" onchange="filechange(this,'zhaobiaowenjian_name_1')" accept=".docx,.png,.zip" />
                    </div>
                    <div class="col-md-2">
                    <img class="img-circle" src="images/Arrow Up 3.png" style="height:30px" onclick="uploadMe('zhaobiaowenjian_input_1','zhaobiaowenjian','#zhaobiaowenjian_name_1')"/>
                    </div>
                    <table class=" table table-striped table-hover" >
                    <tbody id="zhaobiaowenjian">
                    </tbody>
                    </table>
                </div><!-- panel-body -->
                <div class="panel-footer">
                </div><!-- panel-footer -->
            </div><!-- panel-end-->
        </div><!-- col-lg-12-->
        </div><!-- row -->
    </div>
    <div id="menu2" class="tab-pane fade">
       <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" id="hetong_panel">
                <div class="panel-heading ">合同文件</div><!-- panel-head -->
                <!-- <img class="img-circle" onclick="addcontent('panel1')" style="height:30px;" src="images/Button Add.png" />-->
                <div class="panel-body">
                    <div class="col-md-6">
                    <input id="hetong_name_1" type="text" class="form-control" placeholder="请输入文件名" />
                    </div>
                    <div class="col-md-4">
                    <input id="hetong_input_1" type="file" onchange="filechange(this,'hetong_name_1')" accept=".docx,.png,.zip" />
                    </div>
                    <div class="col-md-2">
                    <img class="img-circle" src="images/Arrow Up 3.png" style="height:30px" onclick="uploadMe('hetong_input_1','hetong','#hetong_name_1')"/>
                    </div>
                    <table class=" table table-striped table-hover" >
                    <tbody id="hetong">
                    </tbody>
                    </table>
                </div><!-- panel-body -->
                <div class="panel-footer">
                </div><!-- panel-footer -->
            </div><!-- panel-end-->
        </div><!-- col-lg-12-->
        </div><!-- row -->
    </div>
    <div id="menu3" class="tab-pane fade">
       <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary" id="yanshou_panel">
                <div class="panel-heading ">验收文件</div><!-- panel-head -->
                <!-- <img class="img-circle" onclick="addcontent('panel1')" style="height:30px;" src="images/Button Add.png" />-->
                <div class="panel-body">
                    <div class="col-md-6">
                    <input id="yanshou_name_1" type="text" class="form-control" placeholder="请输入文件名" />
                    </div>
                    <div class="col-md-4">
                    <input id="yanshou_input_1" type="file" onchange="filechange(this,'yanshou_name_1')" accept=".docx,.png,.zip" />
                    </div>
                    <div class="col-md-2">
                    <img class="img-circle" src="images/Arrow Up 3.png" style="height:30px" onclick="uploadMe('yanshou_input_1','yanshou','#yanshou_name_1')"/>
                    </div>
                    <table class=" table table-striped table-hover" >
                    <tbody id="yanshou">
                    </tbody>
                    </table>
                </div><!-- panel-body -->
                <div class="panel-footer">
                </div><!-- panel-footer -->
            </div><!-- panel-end-->
        </div><!-- col-lg-12-->
        </div><!-- row -->
    </div>
  </div>
</div>


</body>
</html>