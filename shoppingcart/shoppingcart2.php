<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 

include('../connect-db.php');

function writeShoppingCart() {
$sessionid = session_id();
$sql=mysql_query("SELECT SUM(quantity) AS quantity FROM orderTrack WHERE cartId='$sessionid'");
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
          <form id ="" method="post" action="shoppingcart3.php">
            <fieldset>
            	<?php
				include('../connect-db.php');
				$Name = $_REQUEST['Name'];
				$sql = "SELECT * FROM Supply where name = '$Name'";
				// execute the SQL statement
				$result = mysql_query($sql) or die(mysql_error());
				//go through each row in the result set and display data

				echo "<table border = '2'>
				<tr>
				<th>ItemID</th>
				<th>Quantity</th>
				<th>Name</th>
				<th>Last Updated</th>
				<th>UserID</th>
				</tr>";

				while ($newArray = mysql_fetch_array($result)) {
					$id  = $newArray['ItemID'];
					$quantity = $newArray['Quantity'];
					$Name = $newArray['name'];
					$LastUpdate = $newArray['LastUpdate'];
					$UserID = $newArray['UserID'];

					echo "<tr>";
					echo "<td>" . $id .   "</td>";
					echo "<td>" . $quantity . "</td>";
					echo "<td>" . $Name . "</td>";
					echo "<td>" . $LastUpdate .  "</td>";
					echo "<td>" . $UserID .  "</td>";
					echo "</tr>";
				}
	
				echo "</table>";

				echo "<br><br>";

				echo "Quantity: <select name=\"Quantity\">";

				for($i=1; $i<11; $i++) {
  	    			echo "<option value=\"$i\">$i</option>";
    			}

				mysql_close($conn);
				?>
            	<INPUT TYPE="hidden" NAME="Name" value="

					<?php echo $_REQUEST["Name"]; ?> 
          		">
            	<br>
            	<CENTER>
            	  <INPUT TYPE="SUBMIT" value="Proceed">
            	</CENTER>
            </fieldset>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
</body>
</html>
