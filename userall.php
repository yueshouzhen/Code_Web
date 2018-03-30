<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>userall</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/userall.css" rel="stylesheet" />
<link href="css/animate.css" rel="stylesheet" />
<!--<link href="css/project_main.css" rel="stylesheet" />
<link href="css/project_main_nav.css" rel="stylesheet" />-->
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css"  type="text/css"/>
<script type="text/javascript">
$.post("filluserdetail.php",{'content':'content'},function(data,status){
	var data1=eval(data);
	
	//console.log(data1[0]);
	for(var i=0;i<data1.length;i++){
	$("#insertname").append(data1[i]);	
		}

	});
	
function geterweima(idme,name,tel)	
{
	$.post("returnmark.php",{'name':name,'tel':tel},function(data,status){
		$("#modaladdcontent").html(data);
		$('#myModal').modal(({keyboard: true}));
		})
	
	}
	
function getmoreinfo(idme,name,tel){
	//alert("getmoreinfo");
	$.post("userinsert.php",{'name':name,'tel':tel},function(data,status){
		alert(data);
		data1=eval(data);
		$("#modalinsup").html(data1);
		$('#insupd').modal(({keyboard: true}));
		})
	
	}
	
function uploadimage(idme,name,tel){
	alert(name);
	}
function deleteme(idme,name,tel)
{
	alert("idme");
	$.post("deleteuserdata.php",{'name':name,'tel':tel},function(data,status){
		if(data=="ok")
		{
		$.get("userall.php",function(data){
			
			$("#newcontent").html(repalcejs(data));});
		}
		else
		{
			alert(data);
			}
		
		});
		
		
		//$.get($(this).attr('target'),function(data){$("#newcontent").html(data);});
	
	}
function insupd(contentid){
	var arr= new Array;
	var i=0;
	contentid+=" input[type='text']";
	console.log(contentid);
	//console.log("hahah");
	//console.log($(contentid).html())
	$(contentid).each(function(index, element) {
      // alert($(this).val());
		arr[i]=$(this).val();
		i++;
    });
	console.log(JSON.stringify(arr));
	if(arr[(i-1)]=="insert"){
		alert("insert");
		}
	$.post('user_updata.php',{'arr':arr},function(data,status){
		
		alert(data);
		});
	}
</script>

</head>

<body >
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
			    描码添加联系人（按下 ESC 按钮退出）
				</h4>
			</div>
			<div class="modal-body center-block" id="modaladdcontent">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" 
						data-dismiss="modal">关闭
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="insupd" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
						aria-hidden="true">×
				</button>
				<h4 class="modal-title" >
			    操作
				</h4>
			</div>
			<div class="modal-body center-block" id="modalinsup">
				
			</div>
			<div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="insupd('#modalinsup')" >提交
				</button>
				<button type="button" class="btn btn-default" 
						data-dismiss="modal">关闭
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">


<div class="row">
<div class="col-md-12" style=" height:60px;">
<button class="btn btn-default" onclick="getmoreinfo('NULL','NULL','NULL')" style="margin-top:15px" ><i class="fa fa-cloud-upload"></i>&nbsp;新增人员</button>


</div>
</div>

<section class="featured-doctors">
<div class="row" id="insertname">

</div><!--row-->

</div><!--container-->
</body>
</html>