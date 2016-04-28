window.onload = function(){		
	getPublishData();
}

function getPublishData() {
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    //document.getElementById("message").innerHTML=json;
	    var result = JSON.parse(json);
	    for (var i = 0; i < result.length; i++) {
	    	var timeSplit = result[i].publish_date.split(",");
	    	var str ="";
		    	str = "<li class='time-label'>"
		    		+ 	"<span class='bg-red'>"
	            	+ 		timeSplit[0]
	            	+ 	"</span>"
	            	+ "</li>"
	            	+ "<li>"
	            	+ 	getIcon(result[i].ministry)
	            	+   "<div class='timeline-item'>"
	            	+ 	  "<span class='time'>"+result[i].publish_person+" <i class='fa fa-clock-o'></i>"+timeSplit[1]+"</span>"
	            	+     "<h3 class='timeline-header'><a href='#'>"+result[i].publish_title+"</a></h3>"
	            	+     "<div class='timeline-body'>"
	            	+      	result[i].publish_content
	            	+     "</div>"
	            	+     "<div class='timeline-footer'>"
	            	//+     	"<a class='btn btn-primary btn-xs'>修改</a>"
	            	//+     	"<a class='btn btn-danger btn-xs'>刪除</a>"
	            	+     "</div>"
	            	+   "</div>"
	            	+ "</li>"
	           document.getElementById('Content').innerHTML += str;	    	
	    }
	    		document.getElementById('Content').innerHTML +="<li>" + "<i class='fa fa-clock-o bg-gray'></i>"+ "</li>"
	  };
	};
	request.open("POST", "process/getPublish.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function getIcon(ministry){
	var str="";
	switch(ministry) {
	    case "1":
	        str = "<i class='fa fa-music bg-green'></i>";
	        break;
	    case "2":
	        str = "<i class='fa fa-gamepad bg-yellow'></i>";
	        break;
	    case "3":
	    	str = "<i class='fa fa-flag bg-red'></i>";
	    	break;
	}
	
	return str;
}