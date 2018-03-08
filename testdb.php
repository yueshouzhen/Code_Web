<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//验证登录信息

date_default_timezone_set("Asia/Shanghai");
session_start();

if(!isset($_SESSION['time_in']))
{echo "<script type='text/javascript'>location='login.html';</script>";}
if((time()-$_SESSION['time_in'])>6000) //设定登录时间
{echo "<script type='text/javascript'>location='login.html';alert('登录过期，请重新登录！');</script>";}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>吉林分中心资产管理系统</title>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css"  type="text/css"/>
 <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
 <link rel="stylesheet" href="css/test_db_style.css" media="screen" type="text/css" />

<style type="text/css">
.img-circle {
    border-radius: 50%;
    text-align:center;
	vertical-align: middle;

}
.centered {
    text-align: center;
}
p {
    display: block;
    -webkit-margin-before: 1em;
    -webkit-margin-after: 1em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
}

a.logo {
	 margin-top: 20px;
    font-size: 20px;
    color: #ffffff;
    float: left;
    text-transform: uppercase;
}
.logout {
    color: #f2f2f2;
    font-size: 12px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    border: 1px solid #DDD !important;
    padding: 5px 15px;
    margin-right: 15px;
    background: #E15748;

}
.logout:hover {
     background:#ffd777;
}
.navs {
	alignment-adjust:central;
	alignment-adjust:middle;
	padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

.btntype
{background-color: #ffd777;
height:25px;
border:thin;
margin-left:15px;
padding:5px 5px;
    font-size: 12px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	}
.btntype:hover {
	background-color:#444359;}
	.btntype2
{background-color:#FF8040;
height:25px;
border:thin;
padding:5px 5px;
    font-size: 12px;
    border-radius: 4px;
	margin-left:-10px;
	}
		.btntype3
{background-color:#DDD;
height:25px;
border:thin;
padding:5px 5px;
    font-size: 12px;
    border-radius: 4px;
	margin-left:5px;
	color:#888;
	}
	.dbtitle2
	{
		display:none;}
</style>




<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript"> 


tablename="";
t_name="";
sql_position=0;
sql_step=25;
number_total=0;
pub_form_1="";
pub_form_2="";
pub_form_3="";
pub_form_4="";
var idTmr;

window.onunload = onunload_handler();    
window.onload=onload_handler();
$(document).ready(function(e) {
    $("#select_system").change(function(e) {
    // alert( $("#select_system").find("option:selected").text());     
    }); 
});
function onunload_handler(){   

    } 
        function  getExplorer() {
            var explorer = window.navigator.userAgent ;
            //ie
            if (explorer.indexOf("MSIE") >= 0) {
                return 'ie';
            }
            //firefox
            else if (explorer.indexOf("Firefox") >= 0) {
                return 'Firefox';
            }
            //Chrome
            else if(explorer.indexOf("Chrome") >= 0){
                return 'Chrome';
            }
            //Opera
            else if(explorer.indexOf("Opera") >= 0){
                return 'Opera';
            }
            //Safari
            else if(explorer.indexOf("Safari") >= 0){
                return 'Safari';
            }
        }
        function method5() {
			var frame1=window.frames["tabel_db"];
		var tableid=frame1.window.document.getElementById('alternatecolor');	
		//alert(tableid.innerHTML) 
	//var frame1_checks=frame1.window.document.getElementsByName("td_ck");
            if(getExplorer()=='ie')
            {
                var curTbl = tabelid;
                var oXL = new ActiveXObject("Excel.Application");
                var oWB = oXL.Workbooks.Add();
                var xlsheet = oWB.Worksheets(1);
                var sel = document.body.createTextRange();
                sel.moveToElementText(curTbl);
                sel.select();
                sel.execCommand("Copy");
                xlsheet.Paste();
                oXL.Visible = true;

                try {
                    var fname = oXL.Application.GetSaveAsFilename("Excel.xls", "Excel Spreadsheets (*.xls), *.xls");
                } catch (e) {
                    print("Nested catch caught " + e);
                } finally {
                    oWB.SaveAs(fname);
                    oWB.Close(savechanges = false);
                    oXL.Quit();
                    oXL = null;
                    idTmr = window.setInterval("Cleanup();", 1);
                }

            }
            else
            {
                tableToExcel(tableid)
            }
        }
        function Cleanup() {
            window.clearInterval(idTmr);
            CollectGarbage();
        }
        var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,',
                    template = '<html><head><meta charset="UTF-8"></head><body><table>{table}</table></body></html>',
                    base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) },
                    format = function(s, c) {
                        return s.replace(/{(\w+)}/g,
                                function(m, p) { return c[p]; }) }
            return function(table, name) {
                if (!table.nodeType) table = tableid
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                window.location.href = uri + base64(format(template, ctx))
            }
        })()
	function test()
	{
//
 // $('#tabel_db').height(document.getElementById('tabel_db').contentWindow.document.body.scrollHeight);
		} 
function iframeload()
{ var number_data=$(document.getElementById('tabel_db').contentWindow.document.body).html();
   var str_temp1="input type=\"hidden\" value=\"";
   var str_temp2="\"></div><script";
   var position1=(number_data.indexOf(str_temp1,0))+str_temp1.length;
   var position2=(number_data.indexOf(str_temp2,0));
    number_total=(number_data.substring(position1,position2));
    if(number_total.indexOf("hello") > 0 )
	{}
	else
	{
		if (parseInt(number_total)<parseInt(sql_step)){$("#number_horizen").html("1/1")}
		else{
		  var position_now=Math.round(parseInt(sql_position)/parseInt(sql_step))+1;
		var position_total=Math.round(parseInt(number_total)/parseInt(sql_step))+1;
		//alert(position_total);
		//alert(position_now);}
   $("#number_horizen").html(position_now+"/"+position_total);
	}
	}
   //alert(number_total);
 // var ifr=document.getElementById('tabel_db');
 $("#navs_id").height(document.getElementById('tabel_db').contentWindow.document.body.clientHeight+16);
  $('#tabel_db').height(document.getElementById('tabel_db').contentWindow.document.body.clientHeight+16);
	}
function onload_handler() //检测过保设备
{
	alert("ddddd");
	//console.log("ssssss");
	$.get("life_time_alarm2.php", function(data){
 obj=jQuery.parseJSON(data);
 // alert("content: " + obj);
  //alert("content: " + obj[0].state);
   
  for (var i in obj)
  {
	  //alert(obj[i].hetong);
	  //在保处理
	   $("#alarm_zaibao").html("在保设备:"+obj[0].number);
	   data_zaibao=obj[0].hetong;
	  //近保处理
	    $("#alarm_jinbao").html("近保设备:"+obj[1].number);
	    data_jinbao=obj[1].hetong;
	  //过保处理
	   $("#alarm_guobao").html("过保设备:"+obj[2].number);
	   data_guobao=obj[2].hetong;
  }
  
  
  // $("#alarm_guobao").html("过保设备:"+guobao_arr.length);
  
  
});
	
	//取得维保结果
	
	/*$.post("life_time_alarm.php",{sql_tb:"life_time"},function callback(data,status){
		data=data.replace(/\s/g,'');
		//alert(data);
		//alrarm=data.substring(0,(data.length-1));
	 alarm_arry=data.split(":");
	 data_guobao=alarm_arry[0];
	 data_xiaxian=alarm_arry[1];
     data_baofei= alarm_arry[2];
	 data_jinbao= alarm_arry[3];
	 data_zaibao= alarm_arry[4];
	//alert(data_guobao);
	//alert(data_zaibao);
data_guobao=data_guobao.substring(0,(data_guobao.length-1));

data_xiaxian=data_xiaxian.substring(0,(data_xiaxian.length-1));
data_baofei=data_baofei.substring(0,(data_baofei.length-1));
data_jinbao=data_jinbao.substring(0,(data_jinbao.length-1));
data_zaibao=data_zaibao.substring(0,(data_zaibao.length-1));


var guobao_arr=data_guobao.split(",");
var xiaxian_arr=data_xiaxian.split(",");
var baofei_arr=data_baofei.split(",");
var jinbao_arr=data_jinbao.split(",");
var zaibao_arr=data_zaibao.split(",");

	if (data_guobao!="")
	{$("#alarm_guobao").css("color","red");
	 $("#alarm_guobao").html("过保设备:"+guobao_arr.length);}
	 else{$("#alarm_guobao").html("过保设备:0");}
	if (data_xiaxian!="")
	{$("#alarm_xiaxian").html("下线设备:"+xiaxian_arr.length);} else{$("#alarm_xiaxian").html("下线设备:0");}
	if (data_baofei!="")
	{$("#alarm_baofei").html("报废设备:"+baofei_arr.length);}	 else{$("#alarm_baofei").html("报废设备:0");}
	 	if (data_jinbao!="")
	{$("#alarm_jinbao").html("近保设备:"+jinbao_arr.length);}	  else{$("#alarm_jinbo").html("近保设备:0");}
	 	if (data_zaibao!="")
	{ $("#alarm_zaibao").html("在保设备:"+zaibao_arr.length);} 	else{$("#alarm_zaibao").html("在保设备:0");}
		});*/
	}	

function forwardme()
{   //sql_step=document.getElementById("sql_step_num").value;
sql_step=$("#sql_step_num").val();
//alert(sql_step);
	sql_position=sql_position-sql_step;
	if(sql_position<0){sql_position=parseInt(sql_position)+ parseInt(sql_step)}
	else{
		post_form(pub_form_1,pub_form_2,pub_form_3,pub_form_4);
		}
		//alert(sql_position);
		
}

function forwardstart()
{
	sql_step=$("#sql_step_num").val();
	sql_position=0;
	post_form(pub_form_1,pub_form_2,pub_form_3,pub_form_4);
	
	}

function backwardend()
{sql_step=$("#sql_step_num").val();
	sql_position=parseInt(number_total)-(parseInt(number_total)%parseInt(sql_step))+1;
	//alert(number_total);
	//alert(sql_position);
	post_form(pub_form_1,pub_form_2,pub_form_3,pub_form_4);
	
	}


function backwardme()
{   sql_step=$("#sql_step_num").val();
	sql_position= parseInt(sql_position)+ parseInt(sql_step);
	post_form(pub_form_1,pub_form_2,pub_form_3,pub_form_4);
}


function setIframeHeight() {
	alert("hahah");
	//
}
function delete_item()
{
	//var ids = new Array();
	var ids="";
		var frame1=window.frames["tabel_db"];
	var  frame1_checks=frame1.window.document.getElementsByName("td_ck");
	
	for (var i=0;i<frame1_checks.length;i++)
	{
		if(frame1_checks[i].checked)
		{ids+=frame1_checks[i].value+",";
		} 
	}
	var ids=ids.substring(0,(ids.length-1));
$.post("_delete_data.php",{sql_tb:t_name,sql_ids:ids},function callback(data){search_me('select * from '+t_name,'dbget.php');});
  
	}
function post_form(frame_name,data1,data2,url)
{

	pub_form_1=frame_name;
	pub_form_2=data1;
	pub_form_3=data2;
	pub_form_4=url;
   
//  $.post("dbget.php",{data:data1,sqlpositon:data2,sqlstep:sql_step},function callback(data){alert(data);});
  
  
   var form_ask=document.getElementById("post_form");
   form_ask.target=frame_name; 
   form_ask.action=url;
  form_ask.getElementsByTagName("input").item(0).value=data1;
  form_ask.getElementsByTagName("input").item(1).value=sql_position;
form_ask.getElementsByTagName("input").item(2).value=$("#sql_step_num").val();
  form_ask.submit();
  
    
	}
function search_me(data_ask,url_ask)
{
   //tablename=data_ask;
   		$("#dbtitle").show();
		$("#dbtitle2").hide();
sql_position=0;
post_form("tabel_db",data_ask,"",url_ask);
//alert("data_ask:"+data_ask)
var position1=parseInt(data_ask.indexOf('from'))+5;
var position2=data_ask.indexOf('where');
if (position2>0)
{t_name=data_ask.substring(position1,(position2-1));}
else 
{t_name=data_ask.substring(14);}
alert("t_name:"+t_name);
	 var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = function()
	 {
      if(xhr.readyState==4){
                 // alert(xhr.responseText);
               // console.log(typeof xhr.responseText);
                   var obj = eval('(' + xhr.responseText + ')');
				  // alert(obj);
				    var sel_box=document.getElementById("select_box");
					var sel_sql=document.getElementById("sql_query2");
					sel_sql.options.length = 0;
					 sel_box.options.length = 0;
					 for(var i=0;i<obj.length;i++)
					 {
					  sel_box.options.add(new Option(obj[i],i)); 
					  sel_sql.options.add(new Option(obj[i],i)); 
					 }
					 sel_box.size=obj.length;
					// sel_sql.size=obj.length;
                        }
	}
          xhr.open('get','_require_tablename.php?table_name='+t_name,true);
          xhr.send(null);
//	alert(here);
	
 
}
function search_me2(data_ask,url_ask)
{
 // alert(data_ask);
   if (data_ask.length<14)
   {alert("请先选择筛选条件！");}
   else
  {
   post_form("tabel_db",data_ask,"",url_ask);
//   var form_ask=document.getElementById("post_form");
  // form_ask.action=url_ask;
  // form_ask.getElementsByTagName("input").item(0).value=data_ask;
  // form_ask.getElementsByTagName("input").item(1).value=url_ask;
 //  form_ask.submit();
  }
}
function search_me3(value) //获得select where
{var sql="select * from data_all where 使用情况 = "+"\""+value+"\"";
	//alert(sql);
	search_me(sql,"dbget.php");
}
function set_pwd()
{
	var winPar=window.showModalDialog("setpassword.php","<?php echo $_SESSION['user']; ?>","dialogWidth=500px;dialogHeight=550px;center=1;");
	}
function findfigure(value)
{
	switch (value)
	{
		case 'lifetime':
		var num_total= new Array();
		var num_zb=$("#alarm_zaibao").html();
		num_total[0]=(num_zb.replace(/[^0-9]+/g, ''));
		var num_jb = $("#alarm_jinbao").html();
		num_total[1]=(num_jb.replace(/[^0-9]+/g, ''));
		var num_xx = $("#alarm_xiaxian").html();
		num_total[3]=(num_xx.replace(/[^0-9]+/g, ''));
		var num_gb = $("#alarm_guobao").html();
		num_total[2]=(num_gb.replace(/[^0-9]+/g, ''));
		var num_bf=$("#alarm_baofei").html();
		num_total[4]=(num_bf.replace(/[^0-9]+/g, ''));
		post_form("tabel_db",num_total,"","figure_lifetime.php");
		break;
		case 'sourceshow':
        post_form("tabel_db",num_total,"","figure_source.php");
		break;
		default:
		alert("nofind");
		}
	}
	function findposition(value)
	{
		
		$("#dbtitle").hide();
		$("#dbtitle2").show();
		switch (value)
	{
		case  'dh_table':
		post_form("tabel_db",$("#select_system").val(),"value","figure_position_db.php");
		break;
		default:
		alert("not found!")
		}
		}
	
	

function blur_search()
{     
	if(window.event.keyCode==13)
	{var sql="select * from "+t_name+" where "+$("#sql_query2").find("option:selected").text()+" like "+"\"%"+$("#sql_query2_text").val()+"%\"";
	search_me(sql,"dbget.php");
	$("#sql_query2_text").val("");
		}
	}

function showalarm(alarm_code) //处理维保查询的点击链接
{   var sql_temp="";
	switch(alarm_code)
	{case "lifetime":
		sql_temp="*";
	break;
	case "zaibao" :
		if(data_zaibao!=""){sql_temp=data_zaibao.replace(/,/g,"','");}//data.replace(/\s/g,'');
		break;
	case "jinbao" :
		if(data_jinbao!=""){sql_temp=data_jinba.replace(/,/g,"','");}
	    break;
	case "guobao" :
		if(data_guobao!=""){sql_temp=data_guobao.replace(/,/g,"','");}
	
	break;
	case "weibao" :
		sql_temp=alarm_code;
	break;
	/*case "xiaxian" :
		//for(var i=0;i<xiaxian_arr.length;i++){alert( xiaxian_arr[i]);}
	   if(data_xiaxian!=""){sql_temp=data_xiaxian.replace(/,/g,"','");}
	    break;
	case "baofei" :
		//for(var i=0;i<baofei_arr.length;i++){alert(baofei_arr[i]);}
	   if(data_baofei!=""){sql_temp=data_baofei.replace(/,/g,"','");}
		break;*/
	default:
	alert("no such alarm code!");
	break;
	}

	if (sql_temp==""){alert("没有此类设备！");}
	if (sql_temp=="*"){
	sql="select * from dh_table where 维保情况 = '有'";
	}
	else
{
	 
	if(sql_temp=="weibao")
	{
		sql="select * from weibao";
		}
	else
	{
	sql="select * from dh_table where 合同号 in ('"+sql_temp+"') and 维保情况= '有'";
	}
}
	//alert(sql);
	sql_position=0;
	search_me(sql,"dbget.php");
//	var form_ask=document.getElementById("post_form");
//   form_ask.action="alarm.php";
//   form_ask.getElementsByTagName("input").item(0).value=alarm_code;
//   form_ask.getElementsByTagName("input").item(1).value="hallo2";
//   form_ask.submit();


	}
function set_select()
{

	var select_tj=document.getElementById("sel_ls");
	//alert(select_tj.style.display);
					if(select_tj.style.display=="")
					{select_tj.style.display="none";}
					else
					{select_tj.style.display="";}
}
function show_checks()
{
	//alert("hello");
	var frame1=window.frames["tabel_db"];
	var  frame1_checks=frame1.window.document.getElementsByName("td_ck");
	
	for (var i=0;i<frame1_checks.length;i++)
	{
		if(frame1_checks[i].checked){alert(frame1_checks[i].value);} 
	}
  
	}
	
	function create_new()
{	
var frame1=window.frames["tabel_db"];
 //  var data1= obj.toString();
 //  post_form("_blank",data1,t_name,"creat_new.php");
var winPar=window.showModalDialog(t_name+".php","","dialogWidth=1000px;dialogHeight=600px;center=1;");
//alert(winPar);
if(winPar == "refresh"){search_me('select * from '+t_name,'dbget.php');}
}

function simple_sql()
{  // alert("here");
var div_sel=document.getElementById("sel_ls");
    div_sel.style.display="none";
	var select_tj=document.getElementById("select_box");
	
	var str_cat1="select ";
	var str_cat3=" from "+t_name;
	var str_cat2="";
	var str_sql="";
	for(var i=0;i<select_tj.length;i++)
	{
		
		if(select_tj.options[i].selected)
		{str_cat2+=(select_tj.options[i].text+",");}
	}
	str_cat2_1=str_cat2.substring(0,(str_cat2.length-1));
	str_sql=str_cat1+str_cat2_1+str_cat3;
	//alert(str_sql);
	search_me2(str_sql,"dbget.php");
}
function quit_user()
{
	<?php
	session_destroy();
	?>
	location="login.html";
}





</script> 

</head>

<body>
<form  id="post_form" method="post" action="_blank" target="tabel_db">
<input  type="hidden" name="data" value="value1" />
<input  type="hidden" name="sqlpositon" value="value2" />
<input  type="hidden" name="sqlstep" value="value3" />
</form>



<!--title begin-->


<div class="title">

<a href="index.html" class="logo"><b>CNCERT/CC</b><b style="color:#424a5d">&nbsp吉林分中心资产管理系统</b> </a>


                <ul class="navs pull-right top-menu" style=" position:relative; top:25px">
 <li><a class="logout" href="#" onclick="quit_user()">注销</a></li>
 
            	</ul>
  
               
</div>


<!--左侧导航栏-->
<div class="navs" id="navs_id">
<div>
<p class="centered"><a href="#" onclick="set_pwd()"><img src="images/ui-sam.jpg" class="img-circle" width="60"></a></p>
<h5 class="centered"><?php echo $_SESSION['user'];?></h5>
</div>
	<ul id="accordion" class="accordion">
		<li>
			<div class="link"><i class="fa fa-database"></i>资源检索<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
                <li><a href="#" onclick="search_me('select * from office','dbget.php')">所有设备</a></li>
                <li><a href="#" onclick="search_me('select * from office where 所属系统 =\'办公系统\' ','dbget.php')">办公系统</a></li>
				<li><a href="#" onclick="search_me('select * from office where 所属系统 =\'工程系统\' ','dbget.php')">工程系统</a></li>
				<li><a href="#" onclick="search_me('select * from office where 所属系统 =\'维护系统\' ','dbget.php')">维护系统</a></li>
                <li><a href="#" onclick="search_me('select * from dh_table','dbget.php')">动环系统</a></li>
				<li><a href="#" onclick="search_me('select * from office where 所属系统 =\'其他\' ','dbget.php')">其他</a></li>
                
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-hourglass-1"></i>维保查询<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="#" onclick="showalarm('weibao')" id="alarm_weibao">维保合同</a></li>
                <li><a href="#" onclick="showalarm('lifetime')" id="alarm_lifetime">有保设备</a></li>
                <li><a href="#" onclick="showalarm('zaibao')" id="alarm_zaibao">在保设备</a></li>
                <li><a href="#" onclick="showalarm('jinbao')" id="alarm_jinbao">近保设备</a></li>
				<li><a href="#" onclick="showalarm('guobao')" id="alarm_guobao">过保设备</a></li>
<!--				<li><a href="#" onclick="showalarm('xiaxian')" id="alarm_xiaxian">下线设备</a></li>
                <li><a href="#" onclick="showalarm('baofei')" id="alarm_baofei">报废设备</a></li>-->
			</ul>
		</li>
		<li>
			<div class="link"><i class="fa fa-tasks"></i>日志查询<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="#" onclick="alert('暂无告警')" >告警信息</a></li>
				<li><a href="#" onclick="search_me('select * from log_login','dbget.php')">登录信息</a></li>
                <li><a href="#" onclick="alert('暂未开通')" >操作日志</a></li>
			</ul>
		</li>
		<li><div class="link"><i class="fa fa-bar-chart-o"></i>统计分析<i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
				<li><a href="#" onclick="findfigure('lifetime')">生命展示</a></li>
				<li><a href="#" onclick="findfigure('sourceshow')">资源分布</a></li>
                <li><a href="#" onclick="findposition('dh_table')">位置信息</a></li>
				<li><a href="#">历史记录</a></li>
			</ul>
		</li>
	</ul>

  <script src='js/jquery.js'></script>

  <script src="js/index.js"></script>

 
</div>
<div class="db">
    <div class="dbtitle" id="dbtitle">
    	<input type="text" id="store_txt" style="display:none"  value="<?php echo($_POST['data']);?>" />
        <input class="btntype" type="button" onclick="create_new()" id="cre_new" value="新增项目" />
        <input class="btntype" type="button" onclick="delete_item()" id="del_ite" value="删除项目" />
        <input class="btntype" type="button" onclick="method5()" id="submit_cheks" value="导出excel" />
        <input class="btntype" type="button" onclick="set_select()" value="条件筛选&nbsp"/>
       
        <input class="btntype2" type="button" onclick="simple_sql()" id="sql_query" value="精简" />
        

        <div id="sel_ls" style="display:none;width:200px; float:left; position:fixed;  z-index:99999; left:440px;">
         <select multiple="multiple" id="select_box" >
           </select>
         </div>
         

          <select id="sql_query2" style="min-width:100px;height:25px; margin-left:15px" align="right" ></select>
        <input class="btntype3" type="text" id="sql_query2_text" value="模糊查询" align="right" onkeyup="blur_search()" />
    </div>
                 <!--  findpositon的标题-->
             <div class="dbtitle2" id="dbtitle2">
            <label style=" color:#EEE; left:20px">请选择展示系统</label>
          <select onchange="findposition('dh_table')" id="select_system" >
           <option value ="num_dh">动力系统</option>
           <option value ="num_gc">工程系统</option>
           <option value ="num_wh">维护系统</option>
           <option value ="num_bg">办公系统</option>
           </select>
         
         </div>
    <iframe  onload="iframeload()" class="frame" src="dbget.php" id="tabel_db" name="tabel_db" frameborder="0" scrolling="no" >
    </iframe>
 <div style="background-color: #ffd777; width:100%; display:inline-block;" align="right" >
   <select id="sql_step_num" style="width:50px;vertical-align:middle">
   <option value="25">25</option>
   <option value="50">50</option>
   <option value="75">75</option>
   <option value="100">100</option>
   </select>
    <img src="images/backward.png" onclick="forwardme()" style="vertical-align:middle" /> 
   <img src="images/fast_backward.png" onclick="forwardstart()" style="vertical-align:middle" /> 
  <label id="number_horizen" style="vertical-align:middle">--/--</label>
   <img src="images/fast_forward.png" onclick="backwardend()" style="vertical-align:middle" />
    <img src="images/foreward.png" onclick="backwardme()"  style="vertical-align:middle"/>
  </div>
</div>

</body>
</html>
