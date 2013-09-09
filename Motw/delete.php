<?php 
session_start();
include('../connect-db.php');
$howMany = $_POST['howMany'];

$userID = $_SESSION['id'];
$check = array();
for ($i=0; $i<=$howMany-1; $i++)
		{
			$item = $_POST['item'.$i];
			$check[$i] = $item;
			
		}
$counter = 0;
$deleteArray = array();

for ($i=0; $i<=$howMany-1; $i++)
		{
			$id = $_POST['item'.$i];
			if (isset($_POST['delete'.$check[$i]]))
			{
				$quantity = 0;
				$deleteArray[$counter] = $id;
				$counter++;
				
			}
			
		}
		
		
		if ($counter <= 1){

$sql = "DELETE FROM motw WHERE motwID = '".$deleteArray[0]."';";
$resultSingle = mysql_query($sql) or die (mysql_error());
header("location:../login/login.secure.ch.php");
	}
	else{
		for ($i=0; $i<$counter; $i++){
			$sql[$i] = "DELETE FROM motw WHERE motwID = '".$deleteArray[$i]."';";
			$resultMulti = mysql_query($sql[$i]) or die (mysql_error());
		header("location:../login/login.secure.ch.php");
		}
	}


		?>