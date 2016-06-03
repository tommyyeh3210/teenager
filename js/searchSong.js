var songSearchForm = null;
var myClock = null;
var songItem = new Array();

window.onload = function(){
	//refreshSongList();
	songSearchForm = document.getElementById('songSearchForm');
	 $('#example2').DataTable({
	      "columnDefs": [{"visible":false,"targets":[2,3,4,5,6,7]}], //隱藏欄位
	      "paging": false,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": false,	      
	      "autoWidth": false,
	      /*"processing":true,
	      "serverSide": true,
	      "ajax": "process/getAllSong.php",
	      "columns": [
	            { "data": "song_id"},
				{ "data": "song_chname"},
				{ "data": "song_enname"},
				{ "data": "page"},				
				{ "data": "tune"},
				{ "data": "album"},
				{ "data": "lyrics"},				
				{ "data": "sheet"}
				
	        ]*/
	    });
	//progressBar(700);
}	

function song(songID,chName,enName,album,tune,lyrics,note,sheet,page){
	this.song_id = songID;
	this.chName = chName;
	this.enName = enName;
	this.album = album;
	this.tune = tune;
	this.lyrics = lyrics;
	this.note = note;
	this.sheet = sheet;
	this.page = page;
}

function refreshSongList () {
	songItem = [];
	$("#allSongBox").css("display","block");
	var request = new XMLHttpRequest();
	
	document.getElementById('allSongList').innerHTML ="";
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;	   
	    var result = JSON.parse(json);

	    	for (var i = 0; i < result.length; i++) {
	    		var str = "";
	    		songItem[i] = new song(result[i].song_id,result[i].song_chname,result[i].song_enname,result[i].album,result[i].tune,result[i].lyrics,result[i].note,result[i].sheet,result[i].page);	    		
	    	};
	    	showAllSong(result.length);
	    	
	  };
	};
	request.open("POST", "process/getAllSong.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}
function showAllSong(sum){
	var table = $('#example2').DataTable();
	table.clear();
	for (var i = 0; i < sum ; i++) {
		table.row.add( [ songItem[i].song_id, songItem[i].chName, songItem[i].enName, songItem[i].page,songItem[i].tune,songItem[i].album,songItem[i].lyrics,songItem[i].sheet ] ).draw();
    }
}
/*function progressBar(sum){
	var i = 0;
	myClock = setInterval(function(){			
					var str = "";
					str = "<div class='panel panel-default'>"
	    			+ 		"<div class='panel-heading' role='tab' id='heading" + i +"' style='padding:0px;'>"
	    			+ 			"<h4 class='panel-title'>"
	    			+ 				"<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse"+ i +"' aria-expanded='false' aria-controls='collapse"+i+"'>"
	    			+ 					"<table class='table table-bordered' style='margin-bottom:0px;'>"
	    			+ 						"<tbody><tr>"
	    			+ 							"<td style='width:50%;text-align:left;'>"+songItem[i].chName+"</td>"
	    			+ 							"<td style='width:50%;text-align:left;'>"+songItem[i].enName+"</td>"
	    			+ 						"</tbody></tr>"
	    			+ 					"</table>"
	    			+ 				"</a>"
	    			+ 			"</h4>"
	    			+ 		"</div>"
	    			+		"<div id='collapse"+i+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+i+"'>"
					+			"<div class='panel-body'>"
					+				"<div class='row'>"
					+					"<div class='col-md-4'><b>歌詞：</b><br>"+songItem[i].lyrics+"</div>"
					+					"<div class='col-md-4' style='line-height:22px;'>"
					+						"<b>專輯：</b><span class='label label-success'>"+songItem[i].album+"</span><br />"
					+						"<b>調性：</b><span class='label label-warning'>"+songItem[i].tune+"</span><br />"
					+						"<b>樂譜區：</b><br />"
											for(var q=0;q<songItem[i].sheet.length;q++){
												var temp ="<a href='uploads/" + songItem[i].sheet[q] + "' target='_blank'>"+ songItem[i].sheet[q]+"</a><br />";
												str += temp;
											}			
				str	+=					"</div>"
					+					"<div class='col-md-4'>"
					+						"<b>歌曲編號：</b>" + songItem[i].song_id
					+					"</div>"
					+					"<div class='col-md-4'>"
					+						"<b>頁碼：</b><span class='label label-info'>" + songItem[i].page +"</span>"
					+					"</div>"
					+					"<div class='col-md-4'>"
					+						"<b>備註：</b><br />" + songItem[i].note
					+					"</div>"
					+				"</div>"
					+			"</div>"
					+		"</div>"
					+	"</div>" 										
					document.getElementById('allSongList').innerHTML += str;
					var percentComplete = Math.round((i+1) * 100 / sum);
					console.log(percentComplete);
					document.getElementById('searchProgressValue').style.width = percentComplete.toString() + '%';
					document.getElementById('searchLabelProgress').innerText = percentComplete.toString() + '%';
					//console.log(songItem[i]);
					i++;
					if (i >= sum){
						clearInterval(myClock);
						$("#searchProgress").css("display","none");
					}
			}, 50);	
}*/

function call(){
	songItem = [];
	$("#allSongBox").css("display","block");
	//var formData = new FormData(songSearchForm);
	var chQ = document.getElementById('chQ').value;
	var enQ = document.getElementById('enQ').value;
	var tuneQ = document.getElementById('tuneQ').value;
	var lyricsQ = document.getElementById('lyricsQ').value;

	if (chQ == "" && enQ =="" && tuneQ =="" && lyricsQ == "") {
		//refreshSongList();
	}else{
		//var songItem = new Array();
		var request = new XMLHttpRequest();
		//document.getElementById('allSongList').innerHTML ="";
		request.onreadystatechange = function(){
		  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
		    var json = request.responseText;
		    var result = JSON.parse(json);
		    for (var i = 0; i < result.length; i++) {
	    		var str = "";
	    		songItem[i] = new song(result[i].song_id,result[i].song_chname,result[i].song_enname,result[i].album,result[i].tune,result[i].lyrics,result[i].note,result[i].sheet,result[i].page);	    		
	    	};
	    	showAllSong(result.length);
		    /*console.log(result);
		    document.getElementById('allSongList').innerHTML = "";
		    if (result != null && result.length != 0){
			    for(var i = 0;i < result.length;i++){
				    var str = "";
					songItem[i] = new song(result[i].song_id,result[i].song_chname,result[i].song_enname,result[i].album,result[i].tune,result[i].lyrics,result[i].note,result[i].sheet);
					str = "<div class='panel panel-default'>"
						+ 		"<div class='panel-heading' role='tab' id='heading" + i +"' style='padding:0px;'>"
						+ 			"<h4 class='panel-title'>"
						+ 				"<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse"+ i +"' aria-expanded='false' aria-controls='collapse"+i+"'>"
						+ 					"<table class='table table-bordered' style='margin-bottom:0px;'>"
						+ 						"<tbody><tr>"
						+ 							"<td style='width:50%;text-align:left;'>"+songItem[i].chName+"</td>"
						+ 							"<td style='width:50%;text-align:left;'>"+songItem[i].enName+"</td>"
						+ 						"</tbody></tr>"
						+ 					"</table>"
						+ 				"</a>"
						+ 			"</h4>"
						+ 		"</div>"
						+		"<div id='collapse"+i+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+i+"'>"
						+			"<div class='panel-body'>"
						+				"<div class='row'>"
						+					"<div class='col-md-4'><b>歌詞：</b><br>"+songItem[i].lyrics+"</div>"
						+					"<div class='col-md-4' style='line-height:22px;'>"
						+						"<b>專輯：</b><span class='label label-success'>"+songItem[i].album+"</span><br />"
						+						"<b>調性：</b><span class='label label-warning'>"+songItem[i].tune+"</span><br />"
						+						"<b>樂譜區：</b><br />";
											for(var q=0;q<songItem[i].sheet.length;q++){
												var temp ="<a href='uploads/" + songItem[i].sheet[q] + "' target='_blank'>"+ songItem[i].sheet[q]+"</a><br />";
												str += temp;
											}
											//str += songItem[i].sheet[0] + "..." + songItem[i].sheet[1]
					str	+=					"</div>"
						+					"<div class='col-md-4'>"
						+						"<b>歌曲編號：</b>" + songItem[i].song_id
						+					"</div>"
						+					"<div class='col-md-4'>"
						+						"<b>備註：</b><br />" + songItem[i].note
						+					"</div>"
						+				"</div>"
						+			"</div>"
						+		"</div>"
						+	"</div>"
						document.getElementById('allSongList').innerHTML += str;
				}
			}*/
				
		  };
		};
		request.open("POST", "process/searchSong.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("chQ=" + chQ + "&enQ=" + enQ + "&tuneQ=" + tuneQ + "&lyricsQ=" + lyricsQ);
	}
}

function dataShow(x){
	var table = $("#example2").DataTable();
	//table.column(2).visible(true);
	switch (x.id){
		case 'enCol':
		console.log("show enCol");
			if(x.checked == true){
				table.column(2).visible(true);
			}else{
				table.column(2).visible(false);
			}
			break;
		case 'pageCol':
			if(x.checked == true){
				table.column(3).visible(true);
			}else{
				table.column(3).visible(false);
			}
			break;
		case 'tuneCol':
			if(x.checked == true){
				table.column(4).visible(true);
			}else{
				table.column(4).visible(false);
			}
			break;
		case 'albumCol':
			if(x.checked == true){
				table.column(5).visible(true);
			}else{
				table.column(5).visible(false);
			}
			break;
		case 'lyricsCol':
			if(x.checked == true){
				table.column(6).visible(true);
			}else{
				table.column(6).visible(false);
			}
			break;
		case 'sheetCol':
			if(x.checked == true){
				table.column(7).visible(true);
			}else{
				table.column(7).visible(false);
			}
			break;
	}
	
}