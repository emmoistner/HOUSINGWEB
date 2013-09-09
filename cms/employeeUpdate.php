<?php 
session_start();
include('../connect-db.php');

		$fName = $_POST['fname'];
		$mInit = $_POST['minit'];
		$lName = $_POST['lname'];
		$id = $_POST['id'];
		//$birthDate = $_POST['birthdate']
		$password = sha1($_POST['password']);
		$sex = $_POST['sex'];
		$positionID = $_POST['posid'];
		$classLevel = $_POST['classlevel'];
		$password = stripslashes($password);
				/*Birth_Date*/
		$Month = $_POST['Month'];
		$Day = $_POST['Day'];
		$Year = $_POST['Year'];
		
		$Month = mysql_real_escape_string($Month);
		$Day = mysql_real_escape_string($Day);
		$Year = mysql_real_escape_string($Year);
		
		$birthDate = "$Year-$Month-$Day";
		
		$fName = mysql_real_escape_string($fName);
		$mInit = mysql_real_escape_string($mInit);
		$lName = mysql_real_escape_string($lName);
		$id = mysql_real_escape_string($id);
		//$birthDate = mysql_real_escape_string($birthDate);
		$password = mysql_real_escape_string($password);
		$sex = mysql_real_escape_string($sex);
		$positionID = mysql_real_escape_string($positionID);
		$classLevel =mysql_real_escape_string($classLevel);
		
		if (empty($_POST['password'])) {
			
			$sql = "UPDATE Employee SET Fname = '$fName', Minit = '$mInit', Lname = '$lName' , Birth_Date = '$birthDate', PositionID = '$positionID', Class_Level = '$classLevel' WHERE id = '$id';";
		
			$result = mysql_query($sql) or die(mysql_error());
		
			header("location:employeecms.php");
		}
		else {
			$sql = "UPDATE Employee SET Fname = '$fName', Minit = '$mInit', Lname = '$lName' , Birth_Date = '$birthDate', Password = '$password', PositionID = '$positionID', Class_Level = '$classLevel' WHERE id = '$id';";
		
			$result = mysql_query($sql) or die(mysql_error());
		
			
			header("location:employeecms.php");
		}
		
		
		
		

?>