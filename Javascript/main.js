// alert("working");


showChats();
show_users();

setInterval(function(){
	showChats();
	show_users();
},500);

function showChats(){
	var obj;

	if (window.ActiveXObject) {
		obj = new ActiveXObject('Microsoft.XMLHTTP');
	}else{
		obj = new XMLHttpRequest();
	}

	obj.onreadystatechange = function(){
		if (obj.readyState == 4 && obj.status == 200) {
			// console.log(obj.responseText);
			document.getElementById('chat_box').innerHTML = obj.responseText;
		}
	}

	obj.open('POST', 'chat_process.php');
	obj.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
	obj.send('action=show_chats');
}

function send_message(){
	var message_input = document.getElementById('message_field').value;

	if (message_input == "") {
		return alert("Could not send empty message");
	}else{
		var obj;
		if (window.ActiveXObject) {
			obj = new ActiveXObject('Microsoft.XMLHTTP');
		}else{
			obj = new XMLHttpRequest();
		}

		obj.onreadystatechange = function(){
			if (obj.readyState == 4 && obj.status == 200) {
				console.log(obj.responseText);
				// document.getElementById('chat_box').innerHTML = obj.responseText;
				document.getElementById('message_field').value = "";
			}
		}

		obj.open('POST', 'chat_process.php');
		obj.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
		obj.send('action=send_message&message='+message_input);
	}
}

function show_users(){
	var obj;
		if (window.ActiveXObject) {
			obj = new ActiveXObject('Microsoft.XMLHTTP');
		}else{
			obj = new XMLHttpRequest();
		}

		obj.onreadystatechange = function(){
			if (obj.readyState == 4 && obj.status == 200) {
				console.log(obj.responseText);
				document.getElementById('show_users').innerHTML = obj.responseText;
				// document.getElementById('message_field').value = "";
			}
		}

		obj.open('POST', 'chat_process.php');
		obj.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
		obj.send('action=show_users');
}