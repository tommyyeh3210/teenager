$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
});

//註冊表
var check = Array();
check = [false,false,false];
function validation () {
	isEmailexits();
	confirmPwdLen();
	isSyncPwd();
	var vaild = true;
	for (var i = 0; i < check.length; i++) {
		if (check[i] == false){
			vaild = false;
			break;
		}
	};
	return vaild;
}


function isEmailexits () {
	var request = new XMLHttpRequest();
	request.onreadystatechange = function(){
		if (request.readyState == 4 && request.status == 200) {  //從這裡處理取得的JSON資料
			var json = request.responseText;
			var result = JSON.parse(json);
			//console.log(json + "   " + result);
			var title;
			title = $("label[for='r_email']");
			if(result == 0){
				title.css("color","green");
				check[0]=true;
			}else{
				title.css("color","white");
				check[0]=false;
			}
		};
	};
	request.open("POST", "../process/isEmailexits.php", true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var email = "email=" + $("#r_email").val();	
	request.send(email);
}

function confirmPwdLen () {
	var title;
	title = $("label[for='r_password']");
	if($("#r_password").val().length >= 8){		
		title.css("color","green");
		check[1]=true;
	}else{		
		title.css("color","white");
		check[1]=false;		
	}
}

function isSyncPwd () {
	var title;
	title = $("label[for='r_repeatPassword']");
	if($("#r_password").val() == $("#r_repeatPassword").val()){		
		title.css("color","green");
		check[2]=true;		
	}else{
		title.css("color","white");
		check[2]=false;	
	}
}

