<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 

include('../connect-db.php');

function writeShoppingCart() {
	
$sessionid = session_id();
$sql=mysql_query("SELECT SUM(quantity) AS quantity FROM orderTrack WHERE sessionId='$sessionid'");
$result=mysql_fetch_assoc($sql);
$sum = $result['quantity'];

if (!$sum) {
return ' ( 0 )';
} else {
// Parse the cart session variable
$s = ($sum > 1) ? 's':'';
return ' ( '.$sum.' item'.$s.' )';
}
}
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
      <li><a href="shoppingcart.php">Supplies Cart <?php echo writeShoppingCart(); ?></a></li>
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
        <h1 id="form-title"> Shopping Cart</h1>
        <center>
          <form id ="">
            <fieldset>
            	<?php
					include('../connect-db.php');
					$session_id = session_id();
					$sql=mysql_query("SELECT cartid FROM orderTrack WHERE sessionId='$sessionid'");
					$UserId = $_SESSION["id"];
					$Name = $_REQUEST["Name"];
					$quantity = $_REQUEST["Quantity"];
	
					$Name = trim($Name);
					echo "Supply =  ";
					echo $Name;
					echo "<br>";
					echo "Quantity = ";
					echo $quantity;
					echo "<br>";

					$sql = "SELECT Quantity FROM Supply where name = '$Name'";
					// execute the SQL statement
					$result = mysql_query($sql) or die(mysql_error());
					//go through each row in the result set and display data

					$newArray = mysql_fetch_array($result);

					$total = $quantity;
					echo "Total = ". $total;
					echo "<br>";
					$sql = "SELECT ItemID FROM Supply WHERE name = '$Name'";
					$result = mysql_query($sql) or die(mysql_error());
					//go through each row in the result set and display data

					$newArray = mysql_fetch_array($result);
					$id = $newArray['ItemID'];

					echo "ID = ".$id;
					echo "<br>";

					echo "Session = " .$session_id;
					echo "<br>";

					$sql = "INSERT INTO orderTrack(sessionid, itemId, itemName, quantity)
        			VALUES('$session_id', '$id', '$Name','$quantity')";

					mysql_query($sql) or die(mysql_error());

	  			?>
            </fieldset>
            
			<H1><a href = "shoppingcart4.php"> Check my shopping cart. </a> </H1>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
</body>
</html>
