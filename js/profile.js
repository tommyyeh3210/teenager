
window.onload = function(){		
	$("#btnShowModifyBox").on('click',showModifyBox);  
	$("#btnHideModifyBox").on('click',hideModifyBox);
	$("#profileForm").on('submit',validation);
}
function hideModifyBox(){
	$("#modifyBox").css("display","none");
	$("#btnShowModifyBox").css("display","block");
	$("#btnHideModifyBox").css("display","none");
}

function showModifyBox() {
	$("#modifyBox").css("display","block");
	$("#btnHideModifyBox").css("display","block");
	$("#btnShowModifyBox").css("display","none");
}

function validation(){
	console.log("hi");
}