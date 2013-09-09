<?php 
session_start();
include('../connect-db.php');


		$message = $_POST['message'];
		$motdTitle = $_POST['motdTitle'];
		$CurrentTime = "now()";
		$UserID = $_SESSION['id'];

		$CurrentTime = mysql_real_escape_string($CurrentTime);
		$message = mysql_real_escape_string($message);
		$motdTitle = mysql_real_escape_string($motdTitle);
		$UserID = mysql_real_escape_string($UserID);

		
		$sql = "insert into motw (postDate, title, entry, authorID) values (now(), '$motdTitle', '$message', '$UserID')";

		echo $sql;

		$result = mysql_query($sql) or die(mysql_error());
		
		header("location:../login/login.secure.ch.php");
		
?>