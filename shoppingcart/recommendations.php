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
<script type="text/javascript" src="js/buttons.js"></script>
<script type="text/javascript">
function showSupply(){
	if (document.getElementById('Sort').selectedIndex == 1){
		document.getElementById('LCD').style.display="table";
		document.getElementById('wipes').style.display="table";	
		document.getElementById('saniguard').style.display="none";
		document.getElementById('pens').style.display="none";
		document.getElementById('pencil').style.display="none";
		document.getElementById('staples').style.display="none";
		document.getElementById('stapler').style.display="none";
	} else if (document.getElementById('Sort').selectedIndex == 2) {
		document.getElementById('LCD').style.display="none";
		document.getElementById('wipes').style.display="none";
		document.getElementById('saniguard').style.display="table";
		document.getElementById('pens').style.display="none";
		document.getElementById('pencil').style.display="none";
		document.getElementById('staples').style.display="none";
		document.getElementById('stapler').style.display="none";
	} else if (document.getElementById('Sort').selectedIndex == 3) {
		document.getElementById('LCD').style.display="none";
		document.getElementById('wipes').style.display="none";
		document.getElementById('saniguard').style.display="none";
		document.getElementById('pens').style.display="table";
		document.getElementById('pencil').style.display="table";
		document.getElementById('staples').style.display="table";
		document.getElementById('stapler').style.display="table";
	} else {
		return false;
	}
}
</script>
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
      <li><a href="../shoppingcart/shoppingcart4.php">Requests <?php echo writeShoppingCart(); ?></a>
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
        <h1 id="form-title">Recommendations</h1>
        <center>
          <form id="">
            <fieldset>
            <ol>
              <li class="categoy">
                <label for="category"> Sort by Category: </label>
                <select name="Sort" id="Sort" onchange="showSupply()">
                  <option value="-1">Choose:</option>
                  <option value="1">Wipes</option>
                  <option value="2">Cleaning</option>
                  <option value="3">Office Supplies</option>
                </select>
                <?php
				  				$sql = "SELECT * FROM Supply WHERE name = 'LCD Wipes'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='LCD', style='display:none'>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>" ;
								
								$sql = "SELECT * FROM Supply WHERE name = 'Wipes'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='wipes', style='display:none''>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>";
								
								$sql = "SELECT * FROM Supply WHERE name = 'Saniguard'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='saniguard', style='display:none''>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>";
								
								$sql = "SELECT * FROM Supply WHERE name = 'Pens'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='pens', style='display:none'>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>";
								
								$sql = "SELECT * FROM Supply WHERE name = 'Pencil'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='pencil', style='display:none'>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>";
								
								$sql = "SELECT * FROM Supply WHERE name = 'Staples'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='staples', style='display:none'>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>";
								
								$sql = "SELECT * FROM Supply WHERE name = 'Stapler'";
								$result = mysql_query($sql) or die(mysql_error());
								echo "<table border = '2', id='stapler', style='display:none'>
								<tr>
								<th>ItemID</th>
								<th>Quantity</th>
								<th>Name</th>
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
									echo "<td>". $Name ."</td>";
									echo "</tr>";
								}
								echo "</table>";
				  ?>
              </li>
              <li class="History">
                <label for="History"> Most Recent: </label>
                <?php
								$userid = $_SESSION['id'];
								$sql = "SELECT transactionID FROM suppliesTransactions WHERE requestID = '$userid'";
								$result = mysql_query($sql) or die(mysql_error());
								while ($transaction = mysql_fetch_array($result)) {
										$transactions= $transaction['transactionID'];
								}
								
								$sql2 = "SELECT * FROM suppliesItemsT A, Supply B WHERE transactionID = '$transactions' and A.itemID = B.ItemID";
								$result2 = mysql_query($sql2) or die(mysql_error());
								
								echo "<table border = '2'>
								
								<tr>
								<th>Transaction ID</th>
								<th>Item ID</th>
								<th>Name</th>
								<th>Quantity</th>
								</tr>";

								while ($newArray = mysql_fetch_array($result2)) {
									$id  = $newArray['transactionID'];
									$itemID = $newArray['itemID'];
									$quantity = $newArray['quantity'];
									$name = $newArray['name'];

									echo "<tr>";
									echo "<td>" . $id .   "</td>";
									echo "<td>" . $itemID . "</td>";
									echo "<td>" . $name . "</td>";
									echo "<td>" . $quantity .  "</td>";
									echo "</tr>";
								}
								echo "</table>";
							?>
              </li>
              <li class="Popular">
                <label for="Popular"> Most Popular: </label>
                <?php
								$sql=mysql_query("select Supply.name AS Name, Count(Items.itemID) AS Total from suppliesItemsT Items, Supply where Items.itemID = Supply.itemID group by Items.itemID ORDER BY Total desc;");
								
								echo "<table border = '2'>
								<tr>
								<th>Item Name</th>
								<th>Times Purchased</th>
								</tr>";
								
								
								while ($recommendation = mysql_fetch_array($sql)) {
									$name  = $recommendation['Name'];
									$total = $recommendation['Total'];
									
									echo "<tr>";
									echo "<td>" . $name .   "</td>";
									echo "<td>" . $total . "</td>";
									echo "</tr>";
								}
								
							?>
              </li>
            </ol>
            </fieldset>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
</body>
</html>
