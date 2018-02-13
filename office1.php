<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>office</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
<?php date_default_timezone_set("Asia/Shanghai"); ?>
var data_js;
var ins_or_up;
var strs;
var  life_temp=new Array(); 
function CurentTime()
    { 
        var now = new Date();
       
        var year = now.getFullYear();       //年
        var month = now.getMonth() + 1;     //月
        var day = now.getDate();            //日
        var hh = now.getHours();            //时
        var mm = now.getMinutes();          //分
		var ss=now.getSeconds();
       
        var clock = year + "-";
       
        if(month < 10)
            clock += "0";
       
        clock += month + "-";
       
        if(day < 10)
            clock += "0";
           
        clock += day + " ";
       
        if(hh < 10)
            clock += "0";
           
        clock += hh + ":";
        if (mm < 10) clock += '0'; 
        clock += mm+":"; 
		if (ss < 10) clock += '0'; 
        clock += ss; 
        return(clock); 
    } 
function getValue(){
      var value=window.dialogArguments;//通过dialogArguments方法拿到父窗口中的value
	 // alert (value);	  
	  if(value==""){ins_or_up=false;}
	  else{
	  ins_or_up=true;
	  $("#xz").val("更新");
	  var value1=value.replace(/<\/td><td>/g,",");
	  value1=value1.replace(/<\/td>/g,"");
	// alert(value1);
	  strs=new Array();
	  strs_temp=new Array();  
	strs=value1.split(",");
	//alert(value1);
	strs_temp[0]=strs[15];//记录人
	strs_temp[1]=CurentTime();//记录时间
	strs_temp[2]=strs[11];//使用人
	strs_temp[3]=strs[2];//资产编码
	strs_temp[4]=strs[3];//资产姓名
	strs_temp[5]=strs[4];//规格型号
	strs_temp[6]=strs[5];//购买价格
	                //设备类型——select //机密类型——select
	strs_temp[7]=strs[7]; //盘点结果
	strs_temp[8]=strs[9];//存放地点
	strs_temp[9]=strs[10];//使用部门
	strs_temp[10]=strs[14];//设备序列号
	strs_temp[11]=strs[6];//数量
	strs_temp[12]=strs[17];//备注
	//alert(strs[17]);
	//strs_temp[13]=strs[8]; //使用情况
	//strs_temp[14]=strs[12];//设备类型——select 
    //strs_temp[15]=strs[13]; //机密类型——select
	
	//strs_temp[16]=strs[12];
	$("input[id='office']").each(function(i){$(this).attr("value",strs_temp[i]);});
	//$("textarea").each(function(i){$(this).attr("value",strs_temp[12]);});
	$("textarea").val(strs[17]);
	//$("textarea").val(strs_temp[12]);
	var index_sel=0;
	//alert(strs_temp[13]);
	switch (strs[12]) //获得设备类型   
	{case "终端设备":
	index_sel=0;
	break;
	case "复印打印":
	index_sel=1;
	break;
    case "办公用品":
	index_sel=2;
	break;
	case "移动设备":
	index_sel=3;
	break;
	case "其他":
	index_sel=4;
	break;
	default:
	break;
		}
	//alert(index_sel);	
	$("#sblx").get(0).selectedIndex = index_sel; // 1.设置设备列表Select索引值为1的项选中  
	
	switch (strs[8])
	{case "施工中":
	index_sel=0;
	break;
	case "不在维":
	index_sel=1;
	break;
    case "在维":
	index_sel=2;
	break;
	case "下线":
	index_sel=3;
	break;
	case "入库":
	index_sel=4;
	break;
	case "待报废":
	index_sel=5;
	break;
	case "已报废":
	index_sel=6;
	break;
	default:
	break;
	}
	$("#syqk").get(0).selectedIndex = index_sel; 
	
	switch (strs[13]) //获得设备类型   
	{case "机密":
	index_sel=0;
	break;
	case "秘密":
	index_sel=1;
	break;
    case "内部":
	index_sel=2;
	break;
	case "非密":
	index_sel=3;
	break;
	default:
	break;
	}
	$("#jmlx").get(0).selectedIndex = index_sel;
	  }
	    //获取life time的内容
		//alert(strs[2]);
 $.post("life_time_back.php",{sql_tb:"life_time",sql_col:strs[2]},function callback(data,status){
	   //alert(data);
	  life_temp=data.split(",");
	 	$("input[id='life_time']").each(function(i){$(this).attr("value",life_temp[i+2]);});
	 
	 });
	  
   }
   
   
   
function exit_me()
{  window.returnValue="refresh";
	window.close();
	}
function insert_me()
{  
   var insert_table="office";
   var insert_columns="记录人,记录时间,使用人,资产编码,资产姓名,规格型号,购买价格,盘点结果,存放地点,使用部门,设备序列号,数量,使用状况,设备类型,机密类型,备注";
   var insert_values="";
   
  $("input[id='office']").each(function(){
    insert_values+="\""+$(this).val()+"\""+",";
  });
   insert_values+="\""+$("select[name='syqk'] option:selected").text()+"\""+","; 
  insert_values+="\""+$("select[name='sblx'] option:selected").text()+"\""+",";
    insert_values+="\""+$("select[name='jmlx'] option:selected").text()+"\""+",";
   insert_values+="\""+$("textarea").val()+"\"";
  // alert(insert_values);
  
  //获得life_time 相关内容
  var insert_table2="life_time";
  var insert_columns2="资产编码,生产时间,购买时间,入库时间,施工时间,交维时间,过保时间,下线时间,报废时间";
  var insert_values2="\""+$("input[id='office']:eq(3)").val()+"\",";
  //alert(insert_values2); 
  $("input[id='life_time']").each(function(){
    insert_values2+="\""+$(this).val()+"\""+",";
  });
  insert_values2=insert_values2.substring(0,(insert_values2.length-1));
  
  
  
   // 判断是更新还是插入
    if (ins_or_up)
  {insert_columns="记录人,记录时间,使用人,资产编码,资产姓名,规格型号,购买价格,盘点结果,存放地点,使用部门,设备序列号,数量,使用状况,设备类型,机密类型,备注,Id";
	  insert_values+=","+strs[1];
	  //alert(insert_values);
	  $.post("updata_data.php",{sql_tb:insert_table,sql_col:insert_columns,sql_val:insert_values},function callback(data,status){alert(data);});
	  $.post("updata_data.php",{sql_tb:insert_table2,sql_col:insert_columns2,sql_val:insert_values2,sql_zcbm:life_temp[1] },function callback(data,status){alert(data);});
  }
  else
  {
   //  	alert(insert_values);
	$.post("insert_data.php",{sql_tb:insert_table,sql_col:insert_columns,sql_val:insert_values},function callback(data,status){alert(status);});//插入office条目
	$.post("insert_data.php",{sql_tb:"life_time",sql_col:insert_columns2,sql_val:insert_values2},function callback(data,status){alert(status);}); //插入生命周期
	
  }
	
	
	
	

	}
</script>
</head>

<body style="width:800px; height:600px" onload="getValue()" >


  <div>
<fieldset >
<legend>基本信息</legend>
<label><strong>记录人&nbsp&nbsp </strong> </label><input type="text" id="office"  /> 
<label><strong>记录时间&nbsp&nbsp </strong> </label><input type="text"  value=<?php  echo date('c'); ?> id="office"  />
<label><strong>使用人&nbsp&nbsp </strong> </label><input type="text" id="office" /> 
</fieldset>
</div>

<div>
    <fieldset>
    <legend>详细信息</legend>
        <div>
        <label><strong>资产编码&nbsp&nbsp </strong> </label><input type="text" id="office" /> 
        <label><strong>资产姓名&nbsp&nbsp </strong> </label><input type="text" id="office" />
        <label><strong>规格型号&nbsp&nbsp </strong> </label><input type="text" id="office"/>
        </div>
        <br />
        <div>
        <label><strong>购买价格&nbsp&nbsp </strong> </label><input type="text" id="office" />
        <label><strong>设备类型&nbsp&nbsp </strong><select style="width:140px" id="sblx" name="sblx">
        <option>终端设备</option>
        <option>复印打印</option>
        <option>办公用品</option>
        <option>移动设备</option>
        <option>其他</option>
        </select>
        
        <label><strong>使用情况&nbsp&nbsp </strong></label><select style="width:140px" name="syqk" id="syqk">
        <option>施工中</option>
        <option>不在维</option>
        <option>在维</option>
        <option>下线</option>
        <option>入库</option>
        <option>待报废</option>
        <option>已报废</option>
        </select>
        </div>
        <br />
        <div>
        <label><strong>盘点结果&nbsp&nbsp </strong> </label><input type="text" id="office" />
        <label><strong>存放地点&nbsp&nbsp </strong> </label><input type="text" id="office" />
        <label><strong>使用部门&nbsp&nbsp </strong> </label><input type="text" id="office" />
        </div>
        <br />
        <div>
        <label><strong>机密类型&nbsp&nbsp&nbsp </strong> </label><select style="width:140px" id="jmlx" name="jmlx">
        <option>机密</option>
        <option>秘密</option>
        <option>内部</option>
        <option>非密</option>
        </select>
        <label><strong>设备序列号&nbsp&nbsp&nbsp </strong> </label><input type="text" id="office" />
        <label><strong>数量&nbsp&nbsp&nbsp </strong> </label><input type="text" id="office" />
        </div>
        <br />
        <label><strong>备注&nbsp&nbsp </strong> </label>
        <div>
        <textarea style="width:100%">备注：</textarea>
        </div>
    </fieldset>
</div>
<div >
    <fieldset>
    <legend> 生命周期</legend>
    <div>
    <label><strong>生产时间 </strong> </label><input type="text" id="life_time" />
    <label><strong>购买时间 </strong> </label><input type="text" id="life_time" />
    <label><strong>入库时间 </strong> </label><input type="text" id="life_time" />
    </div>
    <br/>
    <div>
    <label><strong>施工时间 </strong> </label><input type="text" id="life_time" />
    <label><strong>交维时间 </strong> </label><input type="text" id="life_time" />
    <label><strong>过保时间 </strong> </label><input type="text" id="life_time" />
    </div>
     <br/>
    <div>
    <label><strong>下线时间 </strong> </label><input type="text" id="life_time" />
    <label><strong>报废时间 </strong> </label><input type="text" id="life_time" />
    </div>
    </fieldset>
</div>
<input  id="xz" type='button' value='新增' onclick='insert_me()'/>  
<input type='button' value='退出' onclick='exit_me()'/> 

  
</body>
</html>