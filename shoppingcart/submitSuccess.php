<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) {
	header("Location: ../index.html");
} elseif ($_SESSION['PositionID'] == '4') {
	header("Location:login.secure.cst.php");
} elseif ($_SESSION['PositionID'] == '3') {
	header("Location:login.secure.lm.php"); 
} elseif ($_SESSION['PositionID'] == '2') {
	header("Location:login.secure.ch.php");
} elseif ($_SESSION['PositionID'] == '1') {
	header("Location:login.secure.admin.php");
}else{
} 
include('../connect-db.php');
$userID = $_SESSION['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" />
<title>Lab Utility</title>
<script type="text/javascript" src="../js/buttons.js"></script>
</head>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="../shoppingcart/shoppingcart4.php">Requests</a>
      	<ul>
        	<li><a href="../shoppingcart/Supplies.php"> Supplies</a></li>
            <li><a href="../shoppingcart/Repair.php"> Repairs </a></li>
      	</ul>
        </li>
      <li><a href="../fullcalendar/calendar.php">Calendar</a></li>
      <li><a href="../headcount.php">Head Count</a>
        <ul>
          <li><a href="">Studebaker West</a></li>
          <li><a href="">Noyer</a></li>
          <li><a href="">Woodworth</a></li>
        </ul>
      </li>
    </ul>
    <ul id="navWelcome">
      <li>Welcome, <?php echo $_SESSION['Fname'];?>&nbsp;<?php echo $_SESSION['Lname'];?></li>
    </ul>
    <ul id="navLogout">
      <li><a href="../login/logout.php">[Log out]</a></li>
    </ul>
  </div>
</div>
<div class="body">
<div class="inner-border">
<div class="border">
  <div class="content">
    <h1 id="form-title">Computer Lab Assistant</h1>
    <form id ="">
      <fieldset>
      
      <? $list = mysql_query("select A.transactionID, A.LabLocation, C.name, B.quantity, E.fname, E.lname, D.requestDate  from suppliesTransactions A, suppliesItemsT B, Supply C, transactions D, Employee E 
			where D.transactionID = (select max(transactionID) from transactions where requestID = '$userID')
			and D.requestID = E.id
			and E.id = A.requestID
			and D.transactionID = A.transactionID
			and A.transactionID = B.transactionID
			and B.itemID = C.itemID;");
		echo "<h4> Your request has been submitted. </h4><div>"; 
		
		while ($row_list=mysql_fetch_assoc($list)){
			$fName = $row_list['fname'];
			$lName = $row_list['lname'];
			$transactionID = $row_list['transactionID'];
			$labLocation = $row_list['LabLocation'];
			$itemName = $row_list['name'];
			$itemQuantity = $row_list['quantity'];
			$date = $row_list['requestDate'];
			$employee = $fName." ".$lName;
			$date = strtotime($date);
			$requestDate = date('l F \, jS Y g:ia', $date);
			
		
		

	   
	   echo "Item: ".$itemName." <br />Quantity: ".$itemQuantity."<br />";}
	   echo "was requested for the ".$labLocation." lab at ".$requestDate."<br />";
	   echo "Thanks, ".$employee."."?>
      </fieldset>
    </form>
  </div>
</div>
</body>
</html>
