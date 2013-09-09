<?php

include('../connect-db.php');

$myusername=$_POST['user_name']; 
$mypassword=$_POST['pass_word']; 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$myusername = strtolower($myusername);
$E_mail = "$myusername@bsu.edu";
$mypassword = sha1($mypassword);
$sql="SELECT * FROM Employee WHERE BSU_Email='$E_mail' and Password='$mypassword'";

$result=mysql_query($sql);

$count=mysql_num_rows($result);


if($count==1){
	$row=mysql_fetch_array($result);
	session_register("myusername");
	session_register("mypassword");
	$_SESSION['Fname'] = $row['Fname']; 
	$_SESSION['Lname'] = $row['Lname']; 
	$_SESSION['PositionID'] = $row['PositionID'];
	$_SESSION['id'] = $row['id'];
	header("location:login_success.php");
} else {
?>
<script type="text/javascript">
	alert("Wrong Username or Password");
	history.back();
</script>
<?php
}
?>
