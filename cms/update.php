<?php 
session_start();
include('../connect-db.php');

		$UserId = $_SESSION['id'];
		$Iname = $_POST['Iname'];
		$quantity = $_POST['quantity'];
		$ItemId = $_POST['ItemID'];
		
		$Iname = mysql_real_escape_string($Iname);
		
		$sql = "UPDATE Supply SET name = '$Iname', Quantity = '$quantity', LastUpdate = now(), UserId = '$UserId' WHERE ItemID = '$ItemId';";
		
		$result = mysql_query($sql) or die(mysql_error());
		
		if(!session_is_registered($Iname)){
			header("location:cms.php");
		}
		

?>