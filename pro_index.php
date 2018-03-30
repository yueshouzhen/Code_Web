<?php
//验证登录信息

date_default_timezone_set("Asia/Shanghai");
session_start();

if(!isset($_SESSION['time_in']))
{echo "<script type='text/javascript'>location='login.html';</script>";}
if((time()-$_SESSION['time_in'])>6000) //设定登录时间
{echo "<script type='text/javascript'>location='login.html';alert('登录过期，请重新登录！');</script>";}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>index</title>


<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css"  rel="stylesheet" />
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="css/pro_index_style.css" rel="stylesheet" />
<style type="text/css">


</style>

</head>

<body style="margin-top:5%">
<div class="header">
    <div class="container">
   		<div class="logo">
        <a href="#" >
        <span>CNCERT</span>/CC
        </a>
    </div>
	<div class="header_left">
    
    </div>
</div>
<div class="main-banner banner text-center">
	  <div class="container">    
			<h1>吉林分中心<span class="segment-heading">技术保障处</span>资源共享平台 </h1>
			<p>JiLin sub center of National Internet Emergency Center resource sharing platform</p>
			<a href="post-ad.html">JL Cert</a>
	  </div>
</div>

<div class="content">
			<div class="categories">
				<div class="container">
					<div class="col-md-2 focus-grid">
						<a href="testdb.php">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-bank"></i></div>
									<h4 class="clrchg">资产管理</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-2 focus-grid">
						<a href="project_main.php">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-briefcase"></i></div>
									<h4 class="clrchg"> 工程项目管理</h4>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-2 focus-grid">
						<a href="usermanager.php">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-address-book""></i></div>
									<h4 class="clrchg">人员信息管理</h4>
								</div>
							</div>
						</a>
					</div>	
					<div class="col-md-2 focus-grid">
						<a href="categories.html#parentVerticalTab4">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-file-powerpoint-o"></i></div>
									<h4 class="clrchg">技术档案管理</h4>
								</div>
							</div>
						</a>
					</div>	
					
					<div class="clearfix"></div>
				</div>
			</div>
			

<script src="js/jquery.min.js" type="text/javascript" ></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>