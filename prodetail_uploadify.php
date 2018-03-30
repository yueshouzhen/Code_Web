<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="js/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/uploadify.css">
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
	
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'images/uploadify.swf', 
				'uploader' : 'uploadify.php'
			});
		});
	</script>
<script type="text/javascript">
num_file_kexing=1;
function addcontent( content)
{
	num_file_kexing++;
	var str1="<tr id='kexing_file_"+num_file_kexing+"'><td style='width:20%;'><input type='text' class='form-control' placeholder='请输入文件名' /></td> <td style='color:#888; width:70%;'><input type='file'/></td><td style='width:10%;' ><img class='img-circle' src='images/Arrow Up 3.png' style='height:30px' onclick='uploadMe(\"kexing_file_"+num_file_kexing+"\")' /><img class='img-circle' src='images/Arrow Down 3.png' style='height:30px' onclick='downloadMe(\"kexing_file_"+num_file_kexing+"\")'/><img class='img-circle' src='images/Button Delete.png' style='height:30px' onclick='delateMe(\"kexing_file_"+num_file_kexing+"\")'/></td></tr>"
//alert(str1);
	
//alert ($("#sample_kexing").html());
	$("#panel1").append(str1);
/*	$("#panel1").removeClass("table");
	$("#panel1").removeClass("table-striped");
	$("#panel1").removeClass("table-hover");
	$("#panel1").addClass("table");
	$("#panel1").addClass("table-striped");
	$("#panel1").addClass("table-hover");*/  
	}
	
function uploadMe(content)
{var id="#"+content;
	alert(content);

	
	}
function downloadMe(content)
{var id="#"+content;
	alert(content);
	}
function delateMe(content)
{
	//alert(content);
	var id="#"+content;
	//alert($(id).html());
	$(id).remove();
	}
	
function filechange(obj)
{
	//alert($(obj).parent().parent('tr').attr('id'));
	var str=$(obj).val();
	str=str.substring((str.indexOf("\\",3)+1),str.indexOf(".",3));
	$(obj).parent().prev().children().val(str);

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
        <div class="panel panel-primary">
                        <div class="panel-heading ">
                          可行性报告
                          <img class="img-circle" onclick="addcontent('panel1')" style="height:30px;" src="images/Button Add.png" />
                        </div>
                        <div class="panel-body">
                            <table class=" table table-striped table-hover" >
                            <tbody id="panel1">
                            <tr id="kexing_file_1">
                             <td style=" width:20%;"><input type="text" class="form-control" placeholder="请输入文件名" /></td>
                              <td style=" width:70%;">
                            <!--  <input type="file" onchange="filechange(this)" accept="application/msword" accept="application/msexcel" accept="application/pdf" accept="application/x-zip-compressed"/>-->
                           <form>
                          <input id="file_upload" name="file_upload" type="file"></form>
                              </td>
                              <td style="width:10%;" >
                              <img class="img-circle" src="images/Arrow Down 3.png" style="height:30px" onclick="downloadMe('kexing_file_1')"/>
                              <img class="img-circle" src="images/Button Delete.png" style="height:30px" onclick="delateMe('kexing_file_1')"/></td>
                            </tr>
                            </tbody>
                            
                            
                            </table>
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                    </div>
        
        
        </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>菜单 1</h3>
      <p>这是菜单 1 显示的内容。这是菜单 1 显示的内容。这是菜单 1 显示的内容。</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>菜单 2</h3>
      <p>这是菜单 2 显示的内容。这是菜单 2 显示的内容。这是菜单 2 显示的内容。</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>菜单 3</h3>
      <p>这是菜单 3 显示的内容。这是菜单 3 显示的内容。这是菜单 3 显示的内容。</p>
    </div>
  </div>
</div>


</body>
</html>