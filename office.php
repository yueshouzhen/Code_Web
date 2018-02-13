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
var str_obj = {}; 
var str_jilu_new={};
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
	  strs=value1.split(","); //获得dbget返回的数据

	  //获得表filedname和当前行的数值，保存在类数组str_obj内
	var xhr = new XMLHttpRequest(); 
     xhr.onreadystatechange = function()
	 {
      if(xhr.readyState==4){
                   var obj = eval('(' + xhr.responseText + ')');
					 for(var i=0;i<obj.length;i++){str_obj[obj[i]] = strs[i+1];}
					 //填写所有的text类型
					$("input[id='office']").each(function(i){$(this).attr("value",str_obj[$(this).attr('name')]);});
                    //填写所有的textarea类型
					$("textarea").each(function(i){$(this).val(str_obj[$(this).attr('name')]);});
				   //填写所有的select类型
				    $("select").each(function(i){
						var name=str_obj[$(this).attr('name')];//获取select的name数值
						var indexs=0;
						
						//获取select的index数值
				$(this).children('option').each(function(index, element) {if($(this).text()==name){indexs=index;}});
						$(this).get(0).selectedIndex = indexs;
						});
					    }
	}
          xhr.open('get','_require_tablename.php?table_name=office',true);
          xhr.send(null);
	
	
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
   var insert_columns="";
   insert_values="";
   //获取office的内容，并重新生成记录内容
   $("input[id='office']").each(function(index, element) {str_jilu_new[$(this).attr('name')]=$(this).attr('value');insert_columns+=$(this).attr('name')+",";
 insert_values+="\""+$(this).val()+"\""+",";});
   $("textarea").each(function(index, element){str_jilu_new[$(this).attr('name')]=$(this).val();  
   insert_columns+=$(this).attr('name')+",";
  insert_values+="\""+$(this).val()+"\""+","; });
   $("select").each(function(index, element){str_jilu_new[$(this).attr('name')]=$(this).val();  
   insert_columns+=$(this).attr('name')+",";
   insert_values+="\""+$(this).val()+"\""+",";});
   //转化岗位sql格式
    insert_columns= insert_columns.substring(0,(insert_columns.length-1));
    insert_values=insert_values.substring(0,(insert_values.length-1));
 alert(insert_columns);
 alert(insert_values);
  
 console.log(str_jilu_new); 
 // alert(str_jilu_new('记录人')); 
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
    if (ins_or_up) //更新
  {insert_columns+=",Id";
	  insert_values+=","+strs[1];
	//  alert(insert_columns);
	 // alert(insert_values);
	 $.post("updata_data.php",{sql_tb:insert_table,sql_col:insert_columns,sql_val:insert_values},function callback(data,status){});//alert(status);
	  $.post("updata_data.php",{sql_tb:insert_table2,sql_col:insert_columns2,sql_val:insert_values2,sql_zcbm:life_temp[1] },function callback(data,status){alert(status);});
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
<label><strong>记录人&nbsp&nbsp </strong> </label><input type="text" id="office" name="记录人" /> 
<label><strong>记录时间&nbsp&nbsp </strong> </label><input type="text"  value=<?php  echo date('c'); ?> id="office" name="记录时间" />
<label><strong>使用人&nbsp&nbsp </strong> </label><input type="text" id="office" name="使用人" /> 
</fieldset>
</div>

<div>
    <fieldset>
    <legend>详细信息</legend>
        <div>
        <table bgcolor="#888888">
        <td width="30%">
        <label><strong>资产编码&nbsp&nbsp </strong> </label><input type="text" id="office" name="资产编码" /> 
        </td>
        <td width="30%">
        <label><strong>资产姓名&nbsp&nbsp </strong> </label><input type="text" id="office" name="资产姓名" />
        </td>
        <td width="30%">
        <label><strong>规格型号&nbsp&nbsp </strong> </label><input type="text" id="office" name="规格型号" />
        </td>
        </table>
        </div>
        <br />
        <div>
        <label><strong>购买价格&nbsp&nbsp </strong> </label><input type="text" id="office" name="购买价格" />
        <label><strong>数量&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </strong> </label><input type="text" id="office" name="数量" />
        <label><strong>盘点结果&nbsp&nbsp </strong> </label><input type="text" id="office" name="盘点结果"/>
        </div>
        <br/>
        <div>
        
                <label><strong>设备序列号</strong> </label><input type="text" id="office" name="设备序列号" />
        
        <label><strong>使用情况&nbsp&nbsp </strong></label><select style="width:140px" name="使用情况" id="select_type">
        <option>入库</option> 
        <option>在用</option>
        <option>维修</option>
        <option>下线</option>
        <option>待报废</option>
        <option>已报废</option>
        </select>
        
		
        
        <label><strong>使用部门&nbsp&nbsp </strong> </label><select style="width:140px" id="select_type" name="使用部门">
        <option>技术保障处</option>  
        <option>安全分中心</option>
        <option>国家中心</option>
        <option>其他</option>
        </select>
       
        </div>
        <br />
        <div>
        
        <label><strong>存放地点&nbsp&nbsp </strong> </label><select style="width:140px" id="select_type" name="存放地点">
        <option>管局</option>
        <option>联通二枢纽</option>
        <option>联通高新机房</option>
        <option>联通深圳街机房</option>
        <option>联通青岛路机房</option>
        <option>移动高新机房</option>
        <option>移动普阳机房</option>
        <option>移动一枢纽机房</option>
        <option>电信枢纽楼</option>
        <option>电信繁荣路机房</option>
        <option>吉林市</option>
        </select>
       <label><strong>具体位置&nbsp&nbsp </strong> </label><input type="text" id="office" name="具体位置"/>
            <label><strong>机密类型&nbsp&nbsp&nbsp </strong> </label><select style="width:140px" id="select_type" name="机密类型">
        <option>机密</option>
        <option>秘密</option>
        <option>内部</option>
        <option>非密</option>
        </select>
        </div>
        <br />
        <div>
        <label><strong>所属系统&nbsp&nbsp&nbsp </strong> </label><select style="width:140px" id="select_type" name="所属系统">
        <option>工程系统</option>
        <option>维护系统</option>
        <option>办公系统</option>
        <option>其他</option>
        </select>
        
        <label><strong>设备类型&nbsp&nbsp&nbsp </strong> </label><select style="width:140px" id="select_type" name="设备类型">
        <option>服务器</option>
        <option>网络设备</option>
        <option>终端设备</option>
        <option>移动设备</option>
        <option>复印打印</option>
        <option>办公用品</option>
        <option>工具耗材</option>
        <option>其他</option>
        </select>
        
   
 

        </div>
        <br />
        <label><strong>备注&nbsp&nbsp </strong> </label>
        <div>
        <textarea style="width:100%" name="备注">备注：</textarea>
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