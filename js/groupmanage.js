window.onload = function(){		
	getGroupData();
}
function objGroup(g_id,g_name,leader_id,leader_name,establish_date){
	this.g_id = g_id;
	this.g_name = g_name;
	this.leader_id = leader_id;
	this.leader_name = leader_name;
	this.establish_date = establish_date;
}
var obj = new Array();

function getGroupData() {
	document.getElementById('groupContent').innerHTML = "";
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    //document.getElementById("message").innerHTML=json;
	    var result = JSON.parse(json);
	    var temp = "<tr>";
	    	temp +="<th width=10px>#</th>";
			temp +="<th style='text-align:center; font-size:20px;'>建立日期</th>";
			temp +="<th style='text-align:center; font-size:20px;'>小組名稱</th>";
			temp +="<th style='text-align:center; font-size:20px;'>小組長</th>";
			temp +="<th style='text-align:center; font-size:20px;'>修改</th>";
			temp +="<th style='text-align:center; font-size:20px;'>刪除</th>";
			temp += "</tr>";
		document.getElementById('groupContent').innerHTML += temp;
	    for (var i = 0; i < result.length; i++) {
	    	obj[i] = new objGroup(result[i].group_id,result[i].group_name,result[i].leader_id,result[i].leader_name,result[i].establish_date);
	    	//console.log(result[i]);
	    	var timeSplit = obj[i].establish_date.split(" ");
	    	var str = "<tr style='text-align:center;'>"
	    			+"<td>" + i + "</td>"
	    			+"<td>" + timeSplit[0] + "</td>"
	    			+"<td>" + obj[i].g_name + "</td>"
	    			+"<td>" + obj[i].leader_name + "</td>"
	    			+"<td><button type='button' class='btn btn-info' onclick='showModifyBox("+ i + ")'>修改</button></td>"
	    			+"<td><button type='button' class='btn btn-danger' onclick='deleteGroup("+ i +")'>刪除</button></td>"
	    			+"</tr>";
	    	document.getElementById('groupContent').innerHTML += str;
	    }
	  };
	};
	request.open("POST", "process/groupProcess.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function showModifyBox(x) {
	$("#groupFormRow").css("display","block");
	$("#grouptitle").val(obj[x].g_name);	
	$("#captainID").val(obj[x].leader_id);
	$("#group_id").val(obj[x].g_id);
	$("#btnNew").css("display","none");
}

function sendModify() {
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    alert(json);
	    getGroupData();
	  };
	};
	request.open("POST", "process/groupModify.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("grouptitle="+$("#grouptitle").val()+ "&captainID="+$("#captainID").val() + "&id=" + $("#group_id").val());
}

function deleteGroup(x){
	var check = confirm("真的要和這個小組說掰掰了嗎?");
	if(check){
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
		  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
		    var json = request.responseText;
		    
		    //var result = JSON.parse(json);
		    alert(json);
		    getGroupData();
		  };
		};
		request.open("POST", "process/groupDelete.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("id="+ obj[x].g_id);
	}	
}

function showGroupBox() {
	$("#groupFormRow").css("display","block");
	$("#grouptitle").val("");
	$("#captainID").val("");
	$("#btnModify").css("display","none");
	$("#addGroup").css("display","none");	
	$("#cancel").css("display","block");	
}

function hideGroupBox() {
	$("#groupFormRow").css("display","none");	
	$("#btnModify").css("display","none");
	$("#addGroup").css("display","block");	
	$("#cancel").css("display","none");	
}