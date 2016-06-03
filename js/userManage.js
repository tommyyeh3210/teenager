var roleArr = new Array();
var userArr = new Array();
var groupArr = new Array();
var ministryArr = new Array();
window.onload = function ()
{    
    getAllRole();
    getAllGroup();
    getAllMinistry();
    refreshUserList();    
}

function getAllRole(){
	var request = new XMLHttpRequest();	
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        var result = JSON.parse(json);	        
	        for (var i = 0; i < result.length; i++) {
	        	roleArr[i] = result[i];				
	        }

	    };
	};
	request.open("POST", "process/getAllRole.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function getAllGroup(){
	var request = new XMLHttpRequest();	
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        var result = JSON.parse(json);	        
	        for (var i = 0; i < result.length; i++) {
	        	groupArr[i] = result[i];				
	        }

	    };
	};
	request.open("POST", "process/getAllGroup.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function getAllMinistry(){
	var request = new XMLHttpRequest();	
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        var result = JSON.parse(json);	        
	        for (var i = 0; i < result.length; i++) {
	        	ministryArr[i] = result[i];				
	        }

	    };
	};
	request.open("POST", "process/getAllMinistry.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function user(id,name,email,group,ministry){
	this.id = id;
	this.name = name;
	this.email = email;
	this.group = group;
	this.ministry = ministry;
}

function refreshUserList(){
	var node = ["姓名","Email","角色","小組","事工"];
	var tr = document.createElement("tr");
	for(var i = 0;i < 5;i++){
		var th = document.createElement("th");
		var textNode = document.createTextNode(node[i]);
		th.appendChild(textNode);
		tr.appendChild(th);
	}
	$("#userList").append(tr);

	var request = new XMLHttpRequest();
	request.addEventListener("progress", updateProgress, false);
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        var result = JSON.parse(json);
	        //var node = ["name","email","group_name","ministry_name"];
	        for (var i = 0; i < result.length; i++) {
	        	var tr = document.createElement("tr");
				$("#userList").append(
					"<tr><td>" + result[i].name + "</td>" +
						"<td>" + result[i].email + "</td>" +
						"<td><select class='form-control' onchange='changeRole(this,"+result[i].id+")' id='role"+result[i].id+"'></td>" +
						"<td><select class='form-control' onchange='changeGroup(this,"+result[i].id+")' id='group"+result[i].id+"'></td>" +
						"<td><select class='form-control' onchange='changeMinistry(this,"+result[i].id+")' id='ministry"+result[i].id+"'></td>" +
					"</tr>"
				);				
				for(var j = 0;j < groupArr.length;j++){
					var str ="";
					if (result[i].group == groupArr[j].group_name){
						str = "<option value="+groupArr[j].group_id+" selected >" + groupArr[j].group_name + "</option>";
					}else{
		        		str = "<option value="+groupArr[j].group_id+">" + groupArr[j].group_name + "</option>";
					}
		        	$("#group" + result[i].id).append(str);		        	
		        };

		        for(var j = 0;j < ministryArr.length;j++){
					var str2 ="";
					if (result[i].ministry == ministryArr[j].ministry_name){
						str2 = "<option value="+ministryArr[j].ministry_id+" selected >" + ministryArr[j].ministry_name + "</option>";
					}else{
		        		str2 = "<option value="+ministryArr[j].ministry_id+">" + ministryArr[j].ministry_name + "</option>";
					}
		        	$("#ministry" + result[i].id).append(str2);		        	
		        };

		        for(var j = 0;j < roleArr.length;j++){
					var str3 ="";
					if (result[i].role == roleArr[j].role_name){
						str3 = "<option value="+roleArr[j].role_id+" selected >" + roleArr[j].role_name + "</option>";
					}else{
		        		str3 = "<option value="+roleArr[j].role_id+">" + roleArr[j].role_name + "</option>";
					}
		        	$("#role" + result[i].id).append(str3);		        	
		        }
	        }

	    };
	};
	request.open("POST", "process/userManage.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function changeRole(selectThis,id){
	var selectID = id;
	//console.log(selectThis.value);
	//console.log(selectID);
	var request = new XMLHttpRequest();	
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        //var result = JSON.parse(json);	        
	        console.log(json);
	    };
	};
	request.open("POST", "process/updateUserRole.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("userID="+ id +"&roleID="+selectThis.value);
}

function changeGroup(selectThis,id){
	var selectID = id;
	//console.log(selectThis.value);
	//console.log(selectID);
	var request = new XMLHttpRequest();	
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        //var result = JSON.parse(json);	        
	        console.log(json);
	    };
	};
	request.open("POST", "process/updateUserGroup.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("userID="+ id +"&groupID="+selectThis.value);
}

function changeMinistry(selectThis,id){
	var selectID = id;
	var request = new XMLHttpRequest();	
	request.onreadystatechange = function() {
	    if (request.readyState == 4 && request.status == 200) { //從這裡處理取得的JSON資料
	        var json = request.responseText;
	        //var result = JSON.parse(json);	        
	        console.log(json);
	    };
	};
	request.open("POST", "process/updateUserMinistry.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("userID="+ id +"&ministryID="+selectThis.value);

}


// progress on transfers from the server to the client (downloads)
function updateProgress(oEvent) {
    if (oEvent.lengthComputable) {    	
        var percentComplete = oEvent.loaded / oEvent.total;
        console.log(percentComplete);
        // ...
    } else {
        // Unable to compute progress information since the total size is unknown
    }
}