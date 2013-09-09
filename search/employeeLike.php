<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 
include('../connect-db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" />
<title>Employee CMS</title>
<script type="text/javascript" src="../js/buttons.js"></script>
<script type="text/javascript" src="../js/SupplyForm.js"></script>
</head>

<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="cms.php">CMS</a></li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="">Supplies Cart (0)</a></li>
      <li><a href="../fullcalendar/calendar.php">Calendar</a></li>
      <li><a href="">Head Count</a></li>
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
        <h1> Like Operator </h1>
	<h3> Displays first names like "et" </h3>
	<?
		$result = mysql_query("select * from Employee where Fname like '%et%'");
  		echo "<table border='1'>
  		<tr>
  		  <th>Last Name</th>
  		  <th>First Name</th>
  		</tr>";
  		while ($row = mysql_fetch_array($result)) {
  			echo "<tr>";
  			echo "<td>" . $row['Lname'] . "</td>";
			echo "<td>" . $row['Fname'] . "</td>";
  			echo "</tr>";
  		}

  		echo "</table>";
	?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
