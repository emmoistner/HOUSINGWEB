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
<title>Add Supply Item</title>
<script type="text/javascript" src="../js/SupplyForm.js"></script>
<script type="text/javascript" src="../js/buttons.js"></script>
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
          <li><a href="messageoftheweek.php">MOTW</a></li>
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
        <h1 id="form-title"> Message of the Week</h1>
        <form id ="supply_form">
          <fieldset>
            <ol>
              <li class="Select">
                <label for="Select"> Message of the Week </label>
                <select name = "supply" onchange="window.document.location.href=this.options[this.selectedIndex].value;">
                  <option value="-1">Message of the Week:</option>
                  <option value="addMotw.php">Add New</option>
                  <option value="deleteMotw.php">Delete</option>
                  <option value="browseMotw.php">Browse Previous</option>
                </select>
            </ol>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
