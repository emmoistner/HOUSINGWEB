// JavaScript Document
function checkForm()
	{

 	var myForm= document.getElementById("registration_form");
 
	 document.writeln("Number of elements in the form = " + (myForm.length - 1) + "<br />");
 
	 for (var i= 0; i< (myForm.length); i++)
		 {
		    document.writeln(myForm.elements[i].name + "<br />");
		 }
 
		 document.writeln("<br /><br />");
 
		 for (var i= 1; i< myForm.length; i++)
		 {
		    document.writeln(myForm.elements[i].value + "<br />");
	
			if (myForm.elements[i].value =="")
			{
			  document.writeln(" " + i + "element was left empty. :/" + "<br /> <br/> <br/>");
			}
 		 }
		
		document.writeln("Click back button to return to website." + "<br/>");
	}

function validateForm()
	{
		var myForm= document.getElementById("registration_form");
		if (myForm.Fname.value =="First Name")
		{
			alert("Please provide your first name.");
		 	document.getElementById('Fname').style.border = " 1px solid rgba(255,0,0, 0.8)";
			document.getElementById('Fname').style.boxShadow = "0 0 5px rgba(255, 0, 0, 1)";
			return false;	
		} else {
			document.getElementById('Fname').style.border = "1px inset";
			document.getElementById('Fname').style.boxShadow = "none";
		}
			
		if (myForm.Lname.value =="Last Name")
  		{
		 	alert("Please provide your last name.");
		 	document.getElementById('Lname').style.border = " 1px solid rgba(255,0,0, 0.8)";
			document.getElementById('Lname').style.boxShadow = "0 0 5px rgba(255, 0, 0, 1)";
			return false;	
		} else {
			document.getElementById('Lname').style.border = "1px inset";
			document.getElementById('Lname').style.boxShadow = "none";
		}
 			 	 
 		if (myForm.pass_word.value =="")
  		{
  		 	alert("Please provide a password");
			document.getElementById('pass_word').style.border = " 1px solid rgba(255,0,0, 0.8)";
			document.getElementById('pass_word').style.boxShadow = "0 0 5px rgba(255, 0, 0, 1)";
  		    return false;
		} else {
			document.getElementById('pass_word').style.border = "1px inset";
			document.getElementById('pass_word').style.boxShadow = "none";
		}

		if (myForm.e_mail.value=="" || myForm.e_mail.value.indexOf("@") < 1)
		{
 		    alert("Please provide a valid e-mail");
			document.getElementById('e_mail').style.border = " 1px solid rgba(255,0,0, 0.8)";
			document.getElementById('e_mail').style.boxShadow = "0 0 5px rgba(255, 0, 0, 1)"
			return false;
		} else {
			document.getElementById('e_mail').style.border = "1px inset";
			document.getElementById('e_mail').style.boxShadow = "none";
		}
 		if (myForm.Month.value=="-1" || myForm.Day.value=="-1" || myForm.Year.value=="-1")
		{
 		    alert("Please provide your date of birth.");
		    return false;
		} else {
			return true;
		}
 				 	
		checkForm();
  		return true;
		
}
		
function checkPassword() {
	var pass1 = document.getElementById('pass_word');
	var pass2 = document.getElementById('pass_word2');
		
	if (pass1.value == pass2.value) {
		document.getElementById('pass_word2').style.border = "1px inset";
		document.getElementById('pass_word2').style.boxShadow = "none";
	} else {
		document.getElementById('pass_word2').style.border = " 1px solid rgba(255,0,0, 0.8)";
		document.getElementById('pass_word2').style.boxShadow = "0 0 5px rgba(255, 0, 0, 1)";
	}
}
function Admin() {
	if (document.getElementById('PositionID').selectedIndex == 1) {
		var pw=prompt("Please enter Administrator password:","");
		if (pw == "1234") {
			var win="Correct!";
			document.getElementById("succes").innerHTML=win;
		} else {
			document.getElementById('PositionID').value = '-1';
		}
   	} else {
		return false;
	}
}

function PasswordChange() {
	if (document.getElementById('password').value != null) {
		var pw=prompt("Please enter Administrator password:","");
		if (pw == "1234") {
			var win="Correct!";
			document.getElementById("success").innerHTML=win;
		} else {
			document.getElementById('password').value = "";
		}
   	} else {
		return false;
	}
}
