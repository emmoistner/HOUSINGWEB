<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 
include('connect-db.php');
$sessionid = session_id();
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
<link href="css/body.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/banner.css" rel="stylesheet" type="text/css" />
<title>Lab Utility</title>
<script type="text/javascript" src="js/buttons.js"></script>
<script type="text/javascript" src="js/SupplyForm.js"></script>
</head>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="login/login_secure.php">Home</a></li>
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
      <li><a href="fullcalendar/calendar.php">Calendar</a></li>
      <li><a href="headcount.php">Head Count</a></li>
    </ul>
    <ul id="navWelcome">
      <li>Welcome, <?php echo $_SESSION['Fname'];?>&nbsp;<?php echo $_SESSION['Lname'];?></li>
    </ul>
    <ul id="navLogout">
      <li><a href="login/logout.php">[Log out]</a></li>
    </ul>
  </div>
</div>
<div class="body">
<div class="inner-border">
<div class="border">
<div class="content">
  <h1 id="form-title">Head Count</h1>
  <form>
    <fieldset>
    <table border="2px">
      <tr>
        <td bgcolor="#999999"></td>
        <td width="50px", align="center">PC</td>
        <td width="50px", align="center">Mac</td>
      </tr>
      <tr>
        <td>8:15am</td>
        <td><div contenteditable>0</div></td>
        <td><div contenteditable>0</div></td>
      </tr>
      <tr>
        <td>8:30am</td>
        <td><div contenteditable>0</div></td>
        <td><div contenteditable>0</div></td>
      </tr>
      <tr>
        <td>8:45am</td>
        <td><div contenteditable>0</div></td>
        <td><div contenteditable>0</div></td>
      </tr>
      <tr>
        <td>9:00am</td>
        <td><div contenteditable>0</div></td>
        <td><div contenteditable>0</div></td>
      </tr>
      <tr>
        <td>9:15am</td>
        <td><div contenteditable>0</div></td>
        <td><div contenteditable>0</div></td>
      </tr>
      <tr>
        <td>9:30am</td>
        <td><div contenteditable>0</div></td>
        <td><div contenteditable>0</div></td>
      </tr>
    </table>
    </fieldset>
  </form>
</div>
</body>
</html>
