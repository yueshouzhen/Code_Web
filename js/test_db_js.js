$(function(){
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


function onunload_handler(){   
 <?php
 /* session_destroy(); */
 ?>

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
	
	
	$.post("life_time_alarm.php",{sql_tb:"life_time"},function callback(data,status){
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
	if (data_xiaxian!="")
	{//$("#alarm_xiaxian").css("color","red");
	 //alert(data_xiaxian);
	 //alert(xiaxian_arr.length);
	 $("#alarm_xiaxian").html("下线设备:"+xiaxian_arr.length);}	
	if (data_baofei!="")
	{//$("#alarm_baofei").css("color","red");
	 $("#alarm_baofei").html("报废设备:"+baofei_arr.length);}	
	 	if (data_jinbao!="")
	{//$("#alarm_baofei").css("color","red");
	 $("#alarm_jinbao").html("近保设备:"+jinbao_arr.length);}	
	 	if (data_zaibao!="")
	{//$("#alarm_baofei").css("color","red");
	 $("#alarm_zaibao").html("在保设备:"+zaibao_arr.length);}		
		});

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
sql_position=0;
post_form("tabel_db",data_ask,"",url_ask);
//alert("data_ask:"+data_ask)
var position1=parseInt(data_ask.indexOf('from'))+5;
var position2=data_ask.indexOf('where');
if (position2>0)
{t_name=data_ask.substring(position1,(position2-1));}
else 
{t_name=data_ask.substring(14);}
//alert("t_name:"+t_name+"ddd");
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
function blur_search()
{     
	if(window.event.keyCode==13)
	{var sql="select * from "+t_name+" where "+$("#sql_query2").find("option:selected").text()+" like "+"\"%"+$("#sql_query2_text").val()+"%\"";
	search_me(sql,"dbget.php");
	$("#sql_query2_text").val("");
		}
	}

function showalarm(alarm_code)
{   var sql_temp="";
	switch(alarm_code)
	{case "lifetime":
	sql_temp="*";
	break;
		case "zaibao" :
	if(data_zaibao!=""){sql_temp=data_zaibao.replace(/,/g,"','");}//data.replace(/\s/g,'');
	break;
	case "jinbao" :
		if(data_jinbao!=""){sql_temp=data_jinbao.replace(/,/g,"','");}
	    break;
	case "guobao" :
		if(data_guobao!=""){sql_temp=data_guobao.replace(/,/g,"','");}
	break;
	case "xiaxian" :
		//for(var i=0;i<xiaxian_arr.length;i++){alert( xiaxian_arr[i]);}
	   if(data_xiaxian!=""){sql_temp=data_xiaxian.replace(/,/g,"','");}
	    break;
	case "baofei" :
		//for(var i=0;i<baofei_arr.length;i++){alert(baofei_arr[i]);}
	   if(data_baofei!=""){sql_temp=data_baofei.replace(/,/g,"','");}
		break;
	default:
	alert("no such alarm code!");
	break;
	}
	if (sql_temp==""){alert("没有此类设备！");}
	if (sql_temp=="*"){
	sql="select * from life_time";
	}
	
	else
	{
	sql="select * from office where 资产编码 in ('"+sql_temp+"')";
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


	
	})


