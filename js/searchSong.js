var songSearchForm = null;

window.onload = function(){
	refreshSongList();
	songSearchForm = document.getElementById('songSearchForm');
}

function song(songID,chName,enName,album,tune,lyrics,note,sheet){
	this.song_id = songID;
	this.chName = chName;
	this.enName = enName;
	this.album = album;
	this.tune = tune;
	this.lyrics = lyrics;
	this.note = note;
	this.sheet = sheet;
}

function refreshSongList () {
	var request = new XMLHttpRequest();
	var songItem = new Array();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    var result = JSON.parse(json);	    
	    	for (var i = 0; i < result.length; i++) {
	    		var str = "";
	    		songItem[i] = new song(result[i].song_id,result[i].song_chname,result[i].song_enname,result[i].album,result[i].tune,result[i].lyrics,result[i].note,result[i].sheet);
	    		str = "<div class='panel panel-default'>"
	    			+ 		"<div class='panel-heading' role='tab' id='heading" + i +"' style='padding:0px;'>"
	    			+ 			"<h4 class='panel-title'>"
	    			+ 				"<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse"+ i +"' aria-expanded='false' aria-controls='collapse"+i+"'>"
	    			+ 					"<table class='table table-bordered' style='margin-bottom:0px;'>"
	    			+ 						"<tbody><tr>"
	    			+ 							"<td style='width:50%;text-align:center;'>"+songItem[i].chName+"</td>"
	    			+ 							"<td style='width:50%;text-align:center;'>"+songItem[i].enName+"</td>"
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
					+						"<b>備註：</b><br />" + songItem[i].note
					+					"</div>"
					+				"</div>"
					+			"</div>"
					+		"</div>"
					+	"</div>"

					

					document.getElementById('allSongList').innerHTML += str;

				//console.log(str);
	    		//console.log(songItem[i]);
	    	};
	  };
	};
	request.open("POST", "process/getAllSong.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function call(){
	//var formData = new FormData(songSearchForm);
	var chQ = document.getElementById('chQ').value;
	var enQ = document.getElementById('enQ').value;
	var tuneQ = document.getElementById('tuneQ').value;
	var lyricsQ = document.getElementById('lyricsQ').value;

	if (chQ == "" && enQ =="" && tuneQ =="" && lyricsQ == "") {
		refreshSongList();
	}else{
		var songItem = new Array();
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
		  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
		    var json = request.responseText;
		    console.log(json);
		    //document.getElementById('allSongList').innerHTML = json;		
		    var result = JSON.parse(json);
		    console.log(result);
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
						+ 							"<td style='width:50%;text-align:center;'>"+songItem[i].chName+"</td>"
						+ 							"<td style='width:50%;text-align:center;'>"+songItem[i].enName+"</td>"
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
						+						"<b>備註：</b><br />" + songItem[i].note
						+					"</div>"
						+				"</div>"
						+			"</div>"
						+		"</div>"
						+	"</div>"
						document.getElementById('allSongList').innerHTML += str;
				}
			}
				
		  };
		};
		request.open("POST", "process/searchSong.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("chQ=" + chQ + "&enQ=" + enQ + "&tuneQ=" + tuneQ + "&lyricsQ=" + lyricsQ);
	}
}