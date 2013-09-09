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
<title>Search</title>
<script type="text/javascript" src="../js/buttons.js"></script>
<script type="text/javascript" src="../js/SupplyForm.js"></script>
</head>

<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="../cms/cms.php">Manage</a>
        <ul id="dropDown">
        <li><a href="../cms/cms.php">Supplies</a>
        <ul id="dropDown">
          <li><a href="../cms/addSupply.php">Insert</a></li>
          <li><a href="../cms/cmsDeleteBrowse.php">Delete</a></li>
          <li><a href="../cms/cmsUpdateBrowse.php">Update</a></li>
          <li><a href="../cms/cmsBrowse.php">Browse</a></li>
          </ul>
          </li>
          <li><a href="../cms/employeecms.php">Employees</a></li>
          <li><a href="../Motw/messageoftheweek.php">MOTW</a></li>
        </ul>
      </li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="../fullcalendar/calendar.php">Calendar</a></li>
      <li><a href="">Head Count</a>
        <ul id="dropDown">
          <li><a href="">Studebaker West</a></li>
          <li><a href="">Woodworth</a></li>
          <li><a href="">Noyer</a></li>
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
	<h1> Search by Name </h1>
	  <form name="search" method="post" action="searchEmployee.php">
	  Seach for: <input type="text" name="find" /> in 
 	  <Select NAME="field">
 	  <Option VALUE="Fname">First Name</option>
 	  <Option VALUE="Lname">Last Name</option>
 	  </Select>
 	  <input type="hidden" name="searching" value="yes" />
 	  <input type="submit" name="search" value="Search" />
 	  </form>
	  <br>
      </div>
    </div>
  </div>
</div>
</body>
</html>
