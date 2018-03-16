<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>project</title>
<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/project_main.css" rel="stylesheet" />
<link href="css/project_main_nav.css" rel="stylesheet" />
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css"  type="text/css"/>
<style type="text/css">

</style>
<script type="text/javascript">
$(document).ready(function(e) 
{
  // $.get("login.html",function(data){$("#newcontent").html(data);});
	$('li[id=topage]>a').click(function(
	){
		//alert();
		$.get($(this).attr('target'),function(data){$("#newcontent").html(data);});
		//$.get($(this).attr('target'),function(data){$("#newcontent").html(data);});
		});

	
	
});
</script>

</head>

<body>
<div class="container" >

    <div class="row" id="pj_title" >
	
    </div>
   
    <div class="row " style=" background-color:#ffd777;">
        <div class="col-lg-10" style=" height:80px;" >
        <a href="index.html" class="logo"><b>CNCERT/CC</b><b style="color:#424a5d">&nbsp吉林分中心工程管理系统</b> </a>
        </div>
        <div class="col-lg-2"  >
        <button type="button" class="btn btn-default aligncenter" >退出</button>
        </div>
    </div> 
   
    <div class="row" style=" height:1000px;">
   		<div class="col-lg-2" id="project_nav" style=" height:100%;">
           <!--开始导航-->
		<nav class="navbar navbar-inverse " id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       导航栏
                    </a>
                </li>
          
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-plus"></i>项目管理 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                   <li class="dropdown-header">开始管理</li>
                    <li id="topage"><a target="promanager.php">项目管理</a></li>
                    <li id="topage"><a target="filemanager.php">档案管理</a></li>
                  </ul>
                </li>
                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-fw fa-plus"></i>项目提醒 <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">提醒日程</li>
                    <li id="topage"><a target="search_gopro.php">进行中项目</a></li>
                    <li id="topage"><a target="search_donepro.php">已完结项目</a></li>
                  </ul>
                </li>
                <li id="topage">
                    <a href="#" ><i class="fa fa-fw fa-bank"></i>模板管理</a>
                </li>
                <li id="topage">
                    <a href="#"><i class="fa fa-fw fa-dropbox"></i>档案库</a>
                </li>
           
            </ul>
        </nav>     
           
           <!--结束导航-->
        </div>
      <div class="col-lg-10 " id="newcontent" style="background-color: #AAA; height:100%">
        
       </div>
        
        
    </div>


</div>
</body>
</html>

<!--<div style=" height:200px; background-color:#3F0; width:100%">

</div >
<div style=" height:50px; background-color:#FC9 ; width:100%" >
</div>-->
<!--导航栏-->
<!--<div style=" position:absolute;height:1000px; width:25%; background-color:#6FF" >
<ul class="nav nav-pills nav-stacked">
	<li class="active"><a href="#">Home</a></li>
	<li><a href="#">SVN</a></li>

	<li><a href="#">iOS</a></li>
	<li><a href="#">VB.Net</a></li>
	<li><a href="#">Java</a></li>
	<li><a href="#">PHP</a></li>
</ul>
</div>
<div style=" float:left; background-color:#700; width:70%; height:1000px">
</div>-->