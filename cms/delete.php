<?php 

include('../connect-db.php');


		$Iname = $_POST['Iname'];
		$Iname = mysql_real_escape_string($Iname);
		
		$sql = "DELETE from Supply where name = '$Iname';";
		
		$result = mysql_query($sql) or die(mysql_error());
		
		session_start();
		if(!session_is_registered($Iname)){
			header("location:cms.php");
		}
		

?>