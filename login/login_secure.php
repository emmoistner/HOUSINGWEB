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
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" />
<title>Lab Utility</title>
<script type="text/javascript" src="../js/buttons.js"></script>
</head>
<? $list=mysql_query("Select entry, authorID, Employee.Fname as Fname, Employee.Lname as Lname, postDate from motw, Employee where postDate =(select max(postDate) from motw) and authorID = Employee.id;"); 
while($row_list=mysql_fetch_assoc($list)) {
	$entry = $row_list['entry'];
	$postDate = $row_list['postDate'];
	$fName = $row_list['Fname'];
	$lName = $row_list['Lname'];
	$editedBy = $fName. " " .$lName;
	$date = strtotime($postDate);
	$postDate = date('l F \, jS Y g:ia', $date);
	
	
}
	?>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="login_secure.php">Home</a></li>
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
      <li><a href="logout.php">[Log out]</a></li>
    </ul>
  </div>
</div>
<div class="body">
<div class="inner-border">
<div class="border">
  <div class="content">
    <h1 id="form-title">Computer Lab Assistant</h1>
    <h3>
    <? echo $entry. "<br /> </h3> <h4> by ".$editedBy. " at ".$postDate ?>
    </h4>
    <form id ="">
      <fieldset>
      </fieldset>
    </form>
  </div>
</div>
</body>
</html>
