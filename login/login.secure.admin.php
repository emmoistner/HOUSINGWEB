<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
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
      <li><a href="login_secure.admin.php">Home</a></li>
      <li><a href="../cms/cms.php">CMS</a>
        <ul id="dropDown">
          <li><a href="../cms/addSupply.php">Insert</a></li>
          <li><a href="../cms/cmsDeleteBrowse.php">Delete</a></li>
          <li><a href="../cms/cmsUpdateBrowse.php">Update</a></li>
          <li><a href="../cms/cmsBrowse.php">Browse</a></li>
        </ul>
      </li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="../shoppingcart/shoppingcart.php">Supplies Cart (0)</a></li>
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
  <h1 id="form-title">Administrator</h1>
  <form id ="">
    <fieldset>
    </fieldset>
  </form>
</div>
</body>
</html>
