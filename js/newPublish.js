window.onload = function(){		
	getPublishData();
}
function objpublish(id,date,person,content,title,ministry){
	this.p_id = id;
	this.p_date = date;
	this.p_person = person;
	this.p_content = content;
	this.p_title = title;
	this.p_ministry = ministry;
}
var obj = new Array();

function getPublishData() {
	document.getElementById('publishContent').innerHTML = "";
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    //document.getElementById("message").innerHTML=json;
	    var result = JSON.parse(json);
	    var temp = "<tr>";
	    	temp +="<th width=10px>#</th>";
			temp +="<th style='text-align:center; font-size:20px;'>日期</th>";
			temp +="<th style='text-align:center; font-size:20px;'>公告標題</th>";
			temp +="<th style='text-align:center; font-size:20px;'>修改</th>";
			temp +="<th style='text-align:center; font-size:20px;'>刪除</th>";
			temp += "</tr>";
		document.getElementById('publishContent').innerHTML += temp;
	    for (var i = 0; i < result.length; i++) {
	    	obj[i] = new objpublish(result[i].publish_id,result[i].publish_date,result[i].publsih_person,result[i].publish_content,result[i].publish_title,result[i].ministry);
	    	//console.log(result[i]);
	    	var timeSplit = obj[i].p_date.split(",");
	    	var str = "<tr style='text-align:center;'>"
	    			+"<td>" + (i+1) + "</td>"
	    			+"<td>" + timeSplit[0] + "</td>"
	    			+"<td>" + obj[i].p_title + "</td>"
	    			+"<td><button type='button' class='btn btn-info' onclick='showModifyBox("+ i + ")'>修改</button></td>"
	    			+"<td><button type='button' class='btn btn-danger' onclick='deletePublish("+i+")'>刪除</button></td>"
	    			+"</tr>";
	    	document.getElementById('publishContent').innerHTML += str;
	    }
	  };
	};
	request.open("POST", "process/getPublish.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function showModifyBox(x) {
	$("#publishFormRow").css("display","block");
	$("#maintitle").val(obj[x].p_title);
	CKEDITOR.instances.editor1.setData(obj[x].p_content);
	$("#publish_id").val(obj[x].p_id);
	$("#btnNew").css("display","none");
}

function sendModify() {
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    
	    //var result = JSON.parse(json);
	    alert(json);
	    getPublishData();
	  };
	};
	request.open("POST", "process/publishModify.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("title="+$("#maintitle").val()+ "&content="+CKEDITOR.instances.editor1.getData() + "&id=" + $("#publish_id").val());	
}

function deletePublish(x){
	var check = confirm("確定刪除此公告?");
	if(check){
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
		  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
		    var json = request.responseText;
		    
		    //var result = JSON.parse(json);
		    alert(json);
		    getPublishData();
		  };
		};
		request.open("POST", "process/publishDelete.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("id="+obj[x].p_id);
	}	
}

function showPublishBox() {
	$("#publishFormRow").css("display","block");
	$("#maintitle").val("");
	$("#btnModify").css("display","none");
	$("#addInformation").css("display","none");	
	$("#cancel").css("display","block");
	CKEDITOR.instances.editor1.setData('');
}

function hidePublishBox() {
	$("#publishFormRow").css("display","none");	
	$("#btnModify").css("display","none");
	$("#addInformation").css("display","block");	
	$("#cancel").css("display","none");	
}