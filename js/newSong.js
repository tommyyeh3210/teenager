var albumItem = null;   
var songForm = null;     //新增歌曲的表單
var modifyformSong = null;  //修改歌曲的表單
var btnSubmit = null;   //新增歌曲按鈕
var btnModify = null;   //修改歌曲按鈕
var btnDelete = null;   //刪除歌曲按鈕
var btnCancel = null;	//取消修改按鈕
var getSelectIndex  = null;
var getSelectName = null;
var getSelectValue = null;
var modifyboxSongList = null;//修改歌曲Box
var boxAlbum = null;		//新增專輯Box
var boxAlbumList = null;	//專輯內容表格
var boxSongList = null;     //新增歌曲Box
var objSong = new Array();	//歌曲物件
var currentSong = null; //目前被選取的歌曲

window.onload = function ()
{
    refreshAlbumList();
    modifyboxSongList = document.getElementById('modifyboxSongList');
    boxAlbum = document.getElementById('boxAlbum');
	boxAlbumList = document.getElementById('boxAlbumList');
	boxSongList = document.getElementById('boxSongList');
	
    
    modifyformSong = document.getElementById('modifyformSong');
    songForm = document.forms.namedItem("formSong");
	btnSubmit = document.getElementById('btnSubmit');
	btnReset = document.getElementById('btnReset');
	btnModify = document.getElementById('btnModify');
	btnDelete = document.getElementById('btnDelete');
	btnCancel = document.getElementById('btnCancel');
	
	btnSubmit.addEventListener('click', addNewSong , false);
	btnReset.addEventListener('click', refreshNewSongBox , false);
	btnModify.addEventListener('click', modifySong ,false);
	btnDelete.addEventListener('click', deleteSong ,false);
	btnCancel.addEventListener('click', cancelModify ,false);
}
function songItem(id,chName,enName,album,tune,lyrics,page){
	this.song_id = id;
	this.chName = chName;
	this.enName = enName;
	this.album = album;
	this.tune = tune;
	this.lyrics = lyrics;	
	this.page = page;
}

function refreshAlbumList(){
	var albumList = document.getElementById('selectAlbum');
	albumList.innerHTML = "<option value='blank' selected='selected'>請選擇</option>"
                      	+ "<option value='new' >新增專輯</option>";
    
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    var result = JSON.parse(json);	    
	    for (var i=0; i < result.length; i++) {
			var option = document.createElement("option");
			var textNode = document.createTextNode(result[i].album_name);
			option.appendChild(textNode);
			option.value = result[i].album_id;
			albumList.appendChild(option);
		}
		//albumList.selectmenu("refresh",true);
	  };
	};
	request.open("POST", "process/getAlbumList.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send();
}

function selectAlbum () {
	//if(item == '新增專輯')
	albumItem = document.getElementById('selectAlbum');
	console.log(albumItem.options[albumItem.selectedIndex].text);
	
	boxAlbum.style.display = "none";
	boxAlbumList.style.display = "none";
	boxSongList.style.display = "none";
	modifyboxSongList.style.display = "none";
	switch(albumItem.value) {
	    case 'blank':	        
	        break;
	    case "new":	        
	        boxAlbum.style.display = "block";
	        break;
	    default:
	    	boxAlbumList.style.display = "block";
			boxSongList.style.display = "block";
			refreshAlbumContent();	        
	}	
}
function refreshAlbumContent(){
	//getSelectIndex = document.getElementById('selectAlbum').options.selectedIndex;
	//getSelectName = document.getElementById('selectAlbum').options[getSelectIndex].text;
	//getSelectValue = document.getElementById('selectAlbum').options[getSelectIndex].value;
	
	document.getElementById("album_title").innerText = albumItem.options[albumItem.selectedIndex].text;
	
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    console.log(json);
	    var result = JSON.parse(json);
	    console.log(result);
	    var albumContent = document.getElementById('ablumContent');
	    albumContent.innerHTML = "";	    
	    var temp = "<tr>";
			temp +="<th style='width: 10px'>#</th>";
			temp +="<th>歌名</th>";
			temp +="<th>完成度</th>";
			temp +="<th>修改</th>";
			temp += "</tr>";
		albumContent.innerHTML += temp;
	    for(var i=0;i < result.length; i++){
	    	objSong[i] = new songItem(result[i].song_id,
	    							  result[i].song_chname,
	    							  result[i].song_enname,
	    							  result[i].album,
	    							  result[i].tune,
	    							  result[i].lyrics,
	    							  result[i].page)
	    	var str ="<tr>";
	    		str +="<td>" + objSong[i].song_id + "</td>";
	    		str +="<td>" + objSong[i].chName + "</td>";
	    		str +="<td>" + integrityColor(result[i].integrity * 17) + "</td>";
	    		str +="<td><a href='javascript: updateSongItem("+ i +");'>修改</a></td>";
	    		str +="</tr>";
	    	albumContent.innerHTML += str;
	    }
	    refreshNewSongBox();
	  };
	};
	request.open("POST", "process/getAlbumContent.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("item="+albumItem.value);
	//console.log(item);
}
function integrityColor(x){   //依照完成度給予標籤顏色
	var content;
	//alert(x);
	switch(true) {
	    case (x<=34):
	        content = "<span class='badge bg-red'>"+x+"%</span>"
	        break;
	    case (x<=51):
	        content = "<span class='badge bg-yellow'>"+x+"%</span>"
	        break;
	    case (x<=85):
	        content = "<span class='badge bg-light-blue'>"+x+"%</span>"
	        break;
	    default:
	        content = "<span class='badge bg-green'>100%</span>"
	}
	return content;
}

function addAlbum (albumName) {
	console.log(albumName);
	if (albumName != "") {
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
				var json = request.responseText;
				var result = JSON.parse(json);
				if(result == "100"){
					alert("專輯新增成功");
				}
				$('#albumName').val("");
			};
		};
		request.open("POST", "process/addAlbum.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var album = "albumName=" + albumName;
		request.send(album);
		refreshAlbumList();
	}else{
		alert("專輯名稱不得為空")
	}
}

function refreshNewSongBox(){
	document.getElementById('formSong').reset();      //清空表單
	document.getElementById('newAlbumName').value = albumItem.options[albumItem.selectedIndex].text; //將選取的專輯名稱重新貼上
	document.getElementById('newAlbumID').value = albumItem.value;
}

function addNewSong (ev) {
	var SongChName = document.getElementById("newSongChName");
	if(SongChName.value != ""){
		var RespondMsg = document.getElementById("message");
		var boxProgress = document.getElementById('boxProgress');
		boxProgress.style.display = "block";
	    var formData = new FormData(songForm);            

		var oReq = new XMLHttpRequest();
		oReq.upload.addEventListener("progress", uploadProgress, false);
		oReq.open("POST", "process/addSong.php", true);
		oReq.onload = function(oEvent) {
			if (oReq.status == 200) {
			    console.log(oReq.responseText);
				RespondMsg.innerHTML = oReq.responseText;
				boxProgress.style.display = "none";
				refreshNewSongBox();
				refreshAlbumContent();
			} else {
				RespondMsg.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
			}
		};
		oReq.send(formData);
	}else{
		alert("中文歌曲名稱不得為空");
	}
	//console.log(ev.preventDefault());
	/*SongChName = document.getElementById("newSongChName");
	SongEnName = document.getElementById("newSongEnName");
	AlbumID = document.getElementById("newAlbumID");
	Tune = document.getElementById("newTune");
	Lyrics = document.getElementById("newLyrics");
	files = document.getElementById("fileToUpload").files;
    var formData = new FormData();
    formData.append('SongChName',SongChName.value);
	console.log(SongChName.value);
	formData.append('SongEnName',SongEnName.value);
	formData.append('AlbumID',AlbumID.value);
	formData.append('Tune',Tune.value);
	formData.append('Lyrics',Lyrics.value);
    for (var i = 0; i < files.length; i++) {
        var file = files[i];

        // Check the file type.
        if (!file.type.match('image.*') && !file.type==='application/iso') {
            continue;
        }

        // Add the file to the request.
        formData.append('fileToUpload[]', file, file.name);
    }*/
    	
	
	/*var request = new XMLHttpRequest();
	request.upload.addEventListener("progress", uploadProgress, false);
	request.onreadystatechange = function(){
		//console.log(request.status);
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    document.getElementById('message').innerHTML = json;
	    //document.write(json);
	    //document.write(request.responseText);
	    //var result = JSON.parse(json);
	    //alert(json);
	    //alert(result);


	    refreshNewSongBox();
	  };
	};
	request.open("POST", "process/addSong.php", true);
	//request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//console.log(formData);
	//console.log("&SongChName="+SongChName+"&SongEnName="+SongEnName+"&AlbumID="+AlbumID+"&Tune="+Tune+"&Lyrics="+Lyrics);
	request.send(formData);*/
}


function uploadProgress(evt) {
    if (evt.lengthComputable) {
        var percentComplete = Math.round(evt.loaded * 100 / evt.total);
        document.getElementById('uploadProgress').style.width = percentComplete.toString() + '%';
        document.getElementById('labelProgress').innerText = percentComplete.toString() + '%';
    }
    else {
        document.getElementById('progressNumber').innerHTML = 'unable to compute';
    }
}
function modifySong () {
	var SongChName = document.getElementById("modifySongChName");
	if(SongChName.value != ""){
		var RespondMsg = document.getElementById("modifyMessage");
		var boxProgress = document.getElementById('modifyboxProgress');
		boxProgress.style.display = "block";
	    var formData = new FormData(modifyformSong);            

		var oReq = new XMLHttpRequest();
		oReq.upload.addEventListener("progress", modifyUploadProgress, false);
		oReq.open("POST", "process/modifySong.php", true);
		oReq.onload = function(oEvent) {
			if (oReq.status == 200) {
			    console.log(oReq.responseText);
				RespondMsg.innerHTML = oReq.responseText;
				boxProgress.style.display = "none";
				//refreshNewSongBox();
				refreshAlbumContent();
				modifyformSong.style.display = "none";
			} else {
				RespondMsg.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
			}
		};
		oReq.send(formData);
	}else{
		alert("中文歌曲名稱不得為空");
	}
}

function modifyUploadProgress(evt) {
    if (evt.lengthComputable) {
        var percentComplete = Math.round(evt.loaded * 100 / evt.total);
        document.getElementById('modifyuploadProgress').style.width = percentComplete.toString() + '%';
        document.getElementById('modifylabelProgress').innerText = percentComplete.toString() + '%';
    }
    else {
        document.getElementById('modifyProgressNumber').innerHTML = 'unable to compute';
    }
}
function cancelModify(){
	modifyboxSongList.style.display="none";
	boxSongList.style.display="block";
}


function updateSongItem (id) {
	modifyformSong.style.display = "block";
	modifyboxSongList.style.display = "block";
	boxSongList.style.display = "none";

	document.getElementById('rID').value = objSong[id].song_id;
	currentSong = objSong[id].song_id;
	document.getElementById("modifySongChName").value = objSong[id].chName;
	document.getElementById("modifySongEnName").value = objSong[id].enName;
	document.getElementById("modifyTune").value = objSong[id].tune;
	document.getElementById("modifyLyrics").value = objSong[id].lyrics;
	document.getElementById('modifyPage').value = objSong[id].page;

	var request = new XMLHttpRequest();
	document.getElementById('exitsFile').innerHTML ="";
	request.onreadystatechange = function(){
	  if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
	    var json = request.responseText;
	    var result = JSON.parse(json);
	    for (var i = 0; i < result.length; i++) {
	    	var str ="";	    	
	    	str = "<li>" + result[i].sheet_name + "<button type='button' onclick='deleteFile("+ result[i].sheet_id +",\"" + result[i].sheet_name + "\")'>刪除</button></li>"
	    	console.log(str);
	    	document.getElementById('exitsFile').innerHTML += str;
	    };
	  };
	};
	request.open("POST", "process/getSheet.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("rID="+ objSong[id].song_id);
}

function deleteFile(db_id,fileName){
	var check = confirm("確定要刪除 "+ fileName + " 嗎？");
	var RespondMsg = document.getElementById("modifyMessage");
	if(check == true){
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
				var msg = request.responseText;
				RespondMsg.innerHTML = msg;
				alert(msg);
				modifyformSong.style.display = "none";
				refreshAlbumContent();
			};
		};
		request.open("POST", "process/deleteFile.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		console.log("db_id="+db_id +"&fileName="+fileName);
		request.send("db_id="+db_id +"&fileName="+fileName);
	}
}

function deleteSong () {
	var check = confirm("確定要刪除此歌曲嗎?");
	var RespondMsg = document.getElementById("modifyMessage");
	if (check) {
		var request = new XMLHttpRequest();
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
				var msg = request.responseText;
				RespondMsg.innerHTML = msg;
				alert(msg);
				refreshAlbumContent();				
				modifyboxSongList.style.display = "none";
				boxSongList.style.display = "block";
			};
		};
		request.open("POST", "process/deleteSong.php", true);
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("del_id=" + currentSong);
	};
}

