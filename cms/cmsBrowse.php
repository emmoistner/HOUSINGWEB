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
<title>CMS</title>
<script type="text/javascript" src="../js/buttons.js"></script>
<script type="text/javascript" src="../js/SupplyForm.js"></script>
</head>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="cms.php">Manage</a>
        <ul id="dropDown">
        <li><a href="cms.php">Supplies</a>
        <ul id="dropDown">
          <li><a href="addSupply.php">Insert</a></li>
          <li><a href="cmsDeleteBrowse.php">Delete</a></li>
          <li><a href="cmsUpdateBrowse.php">Update</a></li>
          <li><a href="cmsBrowse.php">Browse</a></li>
          </ul>
          </li>
          <li><a href="employeecms.php">Employees</a></li>
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
        <h1 id="form-title"> Browse </h1>
        <form id ="supply_form" unload = "document.supply_form.reload()" name ="select" method="post" onsubmit="return checkForm()" action="cmsSelect.php" >
          <fieldset>
          <ol>
            <li class="Select">
              <label for="Select"> Supply List </label>
              <select name = "supply" type="submit" id="supply" >
                <option value="-1"> Browse </option>
                <? if (isset ($select)&&$select!=""){
			  		$select=$_POST ['NEW'];
			  		}
			  	?>
                <?
			  		$list=mysql_query("select * from Supply order by ItemID asc;");
					while ($row_list=mysql_fetch_assoc($list)){
			  	?>
                <option value="<? echo $row_list['ItemID']; ?>" <? if($row_list['ItemID']==$select){ echo "selected"; } ?>> <?echo $row_list['name']; ?> </option>
                <?
                }
                ?>
              </select>
            </li>
            <li class="bottom">
              <input name="submitButton" value="Submit" type="submit" class="submit_button" id="submt" onmouseover="onHover()" onmouseout="onExit()" />
            </li>
          </ol>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
