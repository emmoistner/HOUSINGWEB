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
<title>Add Message of the Week</title>
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
        <h1 id="form-title"> Add Message of the Week </h1>
        <form id ="message_form" unload = "document.message_form.reload()" name ="message" onsubmit ="add.php" action="add.php" method="post">
          <fieldset>
          <ol>
            <li class="motdTitle">
              <label for="motdTitle"> Title </label>
              <span class="validation">Required</span>
              <input type="text" name="motdTitle" id="motdTitle" value="" onclick="" onblur=""/>
            </li>
            <li class="entry">
              <label for="message"> Message </label>
              <span id="counter" class="validation">255 characters left</span>
              <textarea name="message" id="message" maxlength="255" rows="6" cols="45" onkeypress='limittxt()' onkeyup='limittxt()' onkeydown='limittxt()' value="" size="100" onclick="" onblur=""> </textarea>
            </li>
            <li class="bottom">
              <input name="submitButton" value="Submit" type="submit" class="submit_button" id="submit" onmouseover="onHover()" onmouseout="onExit()" />
              <input name="resetButton" value="Reset" type="reset" class="reset_button"  id="rst" onmouseover="onHoverReset()" onmouseout="onExitReset()" />
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
<script type="text/javascript" >
function limittxt()
{
    var tval = document.getElementById('message').value;
    tlength = tval.length;
    set = 255;
	remain = parseInt(set - tlength);
    document.getElementById('counter').innerHTML = remain + " characters left";
    if (remain <= 0) 
	{
    document.getElementById('press-form-body').value = tval.substring(0, tlength - Math.abs(remain))
    }
}
</script>