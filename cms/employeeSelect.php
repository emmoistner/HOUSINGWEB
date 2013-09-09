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
<? $mySelected = $_POST['supply'];
  $emList=mysql_query("select id, Fname, Lname, Minit, Lname, PositionID, Birth_Date, BSU_Email, Class_Level from Employee where id='$mySelected';"); 
while($row_list=mysql_fetch_assoc($emList)) {
	if ($mySelected == $row_list['id'])
	$fName = $row_list['Fname'];
	$mInit = $row_list['Minit'];
	$lName = $row_list['Lname'];
	$editedBy = $fName. " " .$lName;
	$emID = $row_list['id'];
	$positionID = $row_list['PositionID'];
	$birthDate = $row_list['Birth_Date'];
	$bsuEmail = $row_list['BSU_Email'];
	$classLevel = $row_list['Class_Level'];
	
	
}
if ($positionID == 1)
{ $employeePosition = "Administrator";
}
if ($positionID == 2)
{ $employeePosition = "Company Head";
}
if ($positionID == 3)
{ $employeePosition = "Lab Manager";
}
if ($positionID == 4)
{ $employeePosition = "Computer Service Technician";
}
if ($positionID == 5)
{ $employeePosition = "Lab Assistant";
}

if ($classLevel == -1){
$class = "Professional Staff"; }
if($classLevel == 1){
$class = "Freshman";}
if($classLevel == 2){
$class = "Sophomore";}
if($classLevel == 3){
$class = "Junior";}
if ($classLevel == 4){
$class = "Senior";}
if ($classLevel == 5){
$class = "Extended Senior";}
	?>
<div class="body">
  <div class="inner-border">
    <div class="border">
      <div class="content">
        <h1 id="form-title">View Employee</h1>
        <form id ="supply_form" unload = "document.supply_form.reload()" name ="select" onsubmit="return checkForm()" method="post">
          <fieldset>
            <ol>
              <li class="Select">
                <label for="Select"> Employee List </label>
                <select name = "supply" type="submit" id="supply" >
                  <option value="-1"> Browse </option>
                  <? if (isset ($select)&&$select!=""){
			  		$select=$_POST ['NEW'];
			  		}
			  	?>
                  <?
			  		$list=mysql_query("select id, Fname, Lname, Minit, Lname, PositionID, Birth_Date, BSU_Email from Employee order by PositionID asc;");
					if ($select == $list['id'])
					while ($row_list=mysql_fetch_assoc($list)){
						$FNAME = $row_list['Fname'];
						$MINIT = $row_list['Minit'];
						$LNAME = $row_list['Lname'];
						$employee = $LNAME.", ".$FNAME. " " .$MINIT;
			  	?>
                  <option value="<? echo $row_list['id']; ?>" <? if($row_list['id']==$select){ echo "selected"; } ?>> <? echo $employee; ?> </option>
                  <?
                }
                ?>
                </select>
              </li>
              <li class="Name" id="Name">
                <label for="Iname"> First Name </label>
                <span class="validation"></span> <? echo'<input type="text" name="Iname" id="Iname" value="'.$fName.'" readonly="readonly">'; ?> </li>
                <li class="quantity" id="quantity">
                <label for="quantity"> Middle Initial </label>
                <? echo '<input type="text" name="quantity" id="quantity" value="'.$mInit.'"  readonly="readonly">'; ?> <span class="validation"></span> </li>
                <li class="Name" id="Name">
                <label for="Iname"> Last Name </label>
                <span class="validation"></span> <? echo'<input type="text" name="Iname" id="Iname" value="'.$lName.'"  readonly="readonly">'; ?> </li>
              <li class="quantity" id="quantity">
                <label for="quantity"> Employee Id </label>
                <? echo '<input type="text" name="quantity" id="quantity" value="'.$emID.'"  readonly="readonly">'; ?> <span class="validation"></span> </li>
                <li class="Name" id="Name">
                <label for="Iname"> Birth Date </label>
                <span class="validation"></span> <? echo'<input type="text" name="Iname" id="Iname" value="'.$birthDate.'"  readonly="readonly">'; ?> </li>
                <li class="Name" id="Name">
                <label for="Iname"> Bsu Email </label>
                <span class="validation"></span> <? echo'<input type="text" name="Iname" id="Iname" value="'.$bsuEmail.'"  readonly="readonly">'; ?> </li>
                 <li class="posid" id="posid">
                <label for="posid"> Position ID </label>
                <? echo'<input type="text" width="auto" name="posid" id="posid" value="'.$employeePosition.'" readonly="readonly">'; ?>
                </li>
                 <li class="classlevel" id="classlevel">
                <label for="classlevel"> Class Level </label>
                <span class="validation"></span>
                <? echo'<input type="text" name="posid" id="posid" value="'.$class.'" readonly="readonly">'; ?>
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
