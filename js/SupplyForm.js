function get_action() {
	if (document.getElementById('supply').selectedIndex > -1) {
		
   	} else {
		return false;
	}
}

function checkForm() {
	var myForm= document.getElementById("supply_form");
	if (document.getElementById('supply').value == '-1') {
		alert("Select a valid Item");
		return false;
   	} else {
		return true;
	}
}