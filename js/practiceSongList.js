window.onload = function ()
{
	$("#btnSend").on('click',sendPracticeList);
	getpraceticeList();
}

function practiceList(id,name,sonlist) {
	this.p_id = id;
	this.p_name = name;
	this.p_songlist = sonlist;
}

function sendPracticeList () {
	var songIdList = $("#songIdList").val();
	if ($("#practiceListName").val() != "" && songIdList != "") {
		var vaildation = 0;
		for(var i = 0; i< songIdList.length; i++){
			var str = songIdList.substr(i,1);
			if ((str.charCodeAt(0) > 57 || str.charCodeAt(0) < 48) && str.charCodeAt(0) != 44 ){
				alert("歌曲編號欄位:只允許輸入數字和逗號");
				vaildation = 1;
				break;
			}
		}
		if (vaildation == 0 ) {
			var request = new XMLHttpRequest();
			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
					var json = request.responseText;
					document.getElementById('message').innerHTML = json;
					$("#practiceListName").val("");
					$("#songIdList").val("");
					getpraceticeList();

				};
			};
			request.open("POST", "process/sendSongList.php", true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			request.send("Name=" + $("#practiceListName").val() + "&songIdList=" + songIdList);			
		}
	}else{
		alert("清單名稱、歌曲編號不得空白");
	}
}

function getpraceticeList() {
	var request = new XMLHttpRequest();
	var objSong = new Array();
	request.onreadystatechange = function(){
		if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
			var json = request.responseText;
			var result = JSON.parse(json);

			var practiceListContent = document.getElementById('practiceListContent');
		    practiceListContent.innerHTML = "";	    
		    var temp = "<tr>";
				temp +="<th style='width:25%;'>清單名稱</th>";
				temp +="<th style='width:50%;'>歌曲</th>";
				temp +="<th>歌譜</th>";
				temp +="<th>刪除</th>";
				temp += "</tr>";
			practiceListContent.innerHTML += temp;
		    for(var i=0;i < result.length; i++){
		    	console.log(result[i]);

		    	var str ="<tr>";		    		
		    		str +="<td>" + result[i].p_name + "</td>";
		    		str +="<td>" + result[i].p_songlist + "</td>";
		    		str +="<td><a href='uploads/" + result[i].p_sheet + "' target='_blank'>PDF" + "</a></td>";	
		    		str +="<td><a href='javascript: deletePracticeList("+ result[i].p_id + ",\"" + result[i].p_sheet +"\");'>刪除</a></td>";
		    		str +="</tr>";
		    		console.log(str);
		    	practiceListContent.innerHTML += str;
		    }
		};
	};
	request.open("POST", "process/getpraceticeList.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function deletePracticeList(id,name) {
	var check = confirm("確定刪除此練習清單嗎?");
	if(check){
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
				var json = request.responseText;
				document.getElementById('message').innerHTML = json;
				getpraceticeList();
			};
		};
		request.open("POST", "process/deletePracticeList.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("id="+ id + "&filename="+ name);
	}
}