<?php
		
		include('../connect-db.php');
		
		/*Name, Password, Email*/
		$Fname = $_POST['Fname'];
		$Minit = $_POST['Minit'];
		$Lname = $_POST['Lname'];
		$e_mail = $_POST['e_mail'];
		$pass_word = sha1($_POST['pass_word']);
		
		$pass_word = stripslashes($pass_word);
		
		$Fname = mysql_real_escape_string($Fname);
		$Minit = mysql_real_escape_string($Minit);
		$Lname = mysql_real_escape_string($Lname);
		$e_mail = mysql_real_escape_string($e_mail);
		$pass_word = mysql_real_escape_string($pass_word);
		
		/*Birth_Date*/
		$Month = $_POST['Month'];
		$Day = $_POST['Day'];
		$Year = $_POST['Year'];
		
		$Month = mysql_real_escape_string($Month);
		$Day = mysql_real_escape_string($Day);
		$Year = mysql_real_escape_string($Year);
		
		$Birth_Date = "$Year-$Month-$Day";
		
		/*Class_Level and PositionID*/
		$Class_Level = $_POST['Class_Level'];
		$PositionID = $_POST['PositionID'];
		
		$Class_Level = mysql_real_escape_string($Class_Level);
		$PositionID = mysql_real_escape_string($PositionID);
		
		/*Sex*/
		$Sex = $_POST['Sex'];
	
		$Sex = mysql_real_escape_string($Sex);
				
		$sql = "INSERT INTO Employee (Fname, Minit, Lname, PositionID, Birth_Date, BSU_Email, Password, Class_Level, Sex) values('$Fname', '$Minit', '$Lname', '$PositionID', '$Birth_Date', '$e_mail', '$pass_word', '$Class_Level', '$Sex')";
		
		$result = mysql_query($sql) or die(mysql_error());
	
		header("location:../login/login.secure.ch.php");
		
?>
