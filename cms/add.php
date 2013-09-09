<?php 
session_start();
include('../connect-db.php');


		$Iname = $_POST['Iname'];
		$Iquantity = $_POST['quantity'];
		$CurrentTime = "now()";
		$UserID = $_SESSION['id'];
		
		
		$CurrentTime = mysql_real_escape_string($CurrentTime);
		$UserID = mysql_real_escape_string($UserID);
		$Iname = mysql_real_escape_string($Iname);
		$Iquantity = mysql_real_escape_string($Iquantity);
		
		$sql = "insert into Supply (Quantity, name, LastUpdate, UserID)
values ($Iquantity, '$Iname', now(), '$UserID')";
		$result = mysql_query($sql) or die(mysql_error());
		
		header("location:cms.php");
		

?>