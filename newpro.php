<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gongkaizhaobiao</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/gongkaizhaobiao.css" rel="stylesheet"/>
<script type="text/javascript">
$(document).ready(function(e) {

$("#quitme").click(function(e){
window.close();
	
	})	
	
	
$("#newpro").click(function(e) {
	var val="'";
   // alert("hello");
	val=val+($("select").find("option:selected").text());
	$("input[type='text']").each(function(index, element) {
	  val=val+"','"+($(this).val());
    });
	val=val+"','"+($("textarea").val())+"'";
	//alert(val);
	//get value and send to php
	//if ($('input:checkbox').is(":checked")){alert("子项目")}
	
	$.post("insert_newpro.php",{'data':val},function(data){
		 data=data.replace(/\s/g,''); 
		alert(data);
		if(data=="true")
	{alert("新建项目成功,请对项目进行管理！")}
	else{
		alert("写入数据库失败,请重试!");
		}
		
		
		})
	});
	
	
});


</script>

</head>

<body >
<div class="container" style=" margin-top:20px;" >
  <div class="row rowheight">
  <div class="col-md-12">
      <div class="input-group"> <span class="input-group-addon" >项目名称</span>
        <input type="text" class="form-control">
      </div>
   </div>
  </div>
  <div class="row rowheight">

    <div class="col-md-3">
      <div class="input-group"> <span class="input-group-addon" >项目编号</span>
        <input type="text" class="form-control">
      </div>
    </div>
  <div class="col-md-3" >
    <div class="input-group ">
    	<span class="input-group-addon  ">招标方式</span>
        <select class="selectpicker form-control " title="请选择招标方式">
            <option value="0">公开招标</option>
            <option value="1">邀请招标</option>
            <option value="2">竞争性谈判</option>
            <option value="3">单一来源</option>
            <option value="4">询价</option>
        </select>
        </div>
  
  	</div>
    <div class="col-md-3">
      <div class="input-group"> <span class="input-group-addon">资金来源</span>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-3">
      <div class="input-group"> <span class="input-group-addon">项目经费</span>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row rowheight">
    <div class="col-md-3">
      <div class="input-group"> <span class="input-group-addon">开始时间</span>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-3">
      <div class="input-group"> <span class="input-group-addon">结束时间</span>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-3">
      <div class="input-group"> <span class="input-group-addon">项目负责人</span>
        <input type="text" class="form-control">
      </div>
    </div>
   
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="input-group"> <span class="input-group-addon">项目简介</span> 
        <!--  <input type="text" class="form-control" style="height:100px;">-->
        <textarea class="form-control" rows="10" ></textarea>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:20px;">
  	<div class="col-md-12">
    <button type="button" class="btn btn-danger pull-right col-md-offset-1" id="quitme">退出</button>
    <button type="button" class="btn btn-default pull-right " id="newpro">新建项目</button>
    
    </div>
  </div>
</div>

<!--<div class="input-group">
            <span class="input-group-addon">项目名称</span>
            <input type="text" class="form-control">
</div>-->

</body>
</html>