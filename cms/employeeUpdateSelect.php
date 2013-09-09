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
<script type="text/javascript" src="../js/formValidate.js"></script>
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
<? $mySelected = $_POST['supply'];
  $emList=mysql_query("select id, Fname, Minit, Lname, PositionID, Birth_Date, BSU_Email, Sex, Class_Level from Employee where id='$mySelected';"); 
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
	$sex = $row_list['Sex'];
	
	
	
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

$date_array=explode ("-",$birthDate); 
$year= (int) $date_array[0]; 
$month= (int) $date_array[1];
$day= (int) $date_array[2]; 

	?>
<div class="body">
  <div class="inner-border">
    <div class="border">
      <div class="content">
        <h1 id="form-title">Update Employee Information</h1>
        <form id ="supply_form" unload = "document.supply_form.reload()" name ="select" action="employeeUpdate.php" onsubmit="return checkForm()" method="post">
          <fieldset>
            <ol>
              <li class="fname" id="fname">
                <label for="fname"> First Name </label>
                <span class="validation"></span> <? echo'<input type="text" name="fname" id="fname" value="'.$fName.'">'; ?> </li>
                <li class="minit" id="minit">
                <label for="minit"> Middle Initial </label>
                <? echo '<input type="text" name="minit" id="minit" value="'.$mInit.'">'; ?> <span class="validation"></span> </li>
                <li class="lname" id="lname">
                <label for="lname"> Last Name </label>
                <span class="validation"></span> <? echo'<input type="text" name="lname" id="lname" value="'.$lName.'">'; ?> </li>
              <li class="emid" id="emid">
                <label for="id"> Employee Id </label>
                <span class="validation">Uneditable</span>
                <? echo '<input type="text" name="id" id="id" value="'.$emID.'" readonly="readonly">'; ?> <span class="validation"></span> </li>
                <li class="birthdate" id="birthdate">
                
                <label for="birthdate"> Birth Date </label>
                <span class="validation"><? echo "Current Birth Date: ".$birthDate ?></span> 
                <? $month_selected_array = array(12);
					
			
				for ($i=1; $i < 13; $i++){				
					if ($month == $i) {
						$month_selected_array[$i] = "selected = 'selected'";
					}
				}
				
				
				?>
                <select name="Month" id="Month">
                  <option value="-1">Month:</option>
                  <option value="01" <?php echo $month_selected_array[1]; ?>>January</option>
                  <option value="02" <?php echo $month_selected_array[2]; ?>>February</option>
                  <option value="03" <?php echo $month_selected_array[3]; ?>>March</option>
                  <option value="04" <?php echo $month_selected_array[4]; ?>>April</option>
                  <option value="05" <?php echo $month_selected_array[5]; ?>>May</option>
                  <option value="06" <?php echo $month_selected_array[6]; ?>>June</option>
                  <option value="07" <?php echo $month_selected_array[7]; ?>>July</option>
                  <option value="08" <?php echo $month_selected_array[8]; ?>>August</option>
                  <option value="09" <?php echo $month_selected_array[9]; ?>>September</option>
                  <option value="10" <?php echo $month_selected_array[10]; ?>>October</option>
                  <option value="11" <?php echo $month_selected_array[11]; ?>>November</option>
                  <option value="12" <?php echo $month_selected_array[12]; ?>>December</option>
                </select>
                <? $day_selected_array = array(31);
				for ($i=1; $i < 31; $i++){				
					if ($day == $i) {
						$day_selected_array[$i] = "selected = 'selected'";
					}
				}
				?>
                <select name="Day" id="Day">
                  <option value="-1">Day:</option>
                  <option value="01"<?php echo $day_selected_array[1]; ?>>1</option>
                  <option value="02" <?php echo $day_selected_array[2]; ?>>2</option>
                  <option value="03" <?php echo $day_selected_array[3]; ?>>3</option>
                  <option value="04" <?php echo $day_selected_array[4]; ?>>4</option>
                  <option value="05" <?php echo $day_selected_array[5]; ?>>5</option>
                  <option value="06" <?php echo $day_selected_array[6]; ?>>6</option>
                  <option value="07" <?php echo $day_selected_array[7]; ?>>7</option>
                  <option value="08" <?php echo $day_selected_array[8]; ?>>8</option>
                  <option value="09" <?php echo $day_selected_array[9]; ?>>9</option>
                  <option value="10" <?php echo $day_selected_array[10]; ?>>10</option>
                  <option value="11" <?php echo $day_selected_array[11]; ?>>11</option>
                  <option value="12" <?php echo $day_selected_array[12]; ?>>12</option>
                  <option value="13" <?php echo $day_selected_array[13]; ?>>13</option>
                  <option value="14" <?php echo $day_selected_array[14]; ?>>14</option>
                  <option value="15" <?php echo $day_selected_array[15]; ?>>15</option>
                  <option value="16" <?php echo $day_selected_array[16]; ?>>16</option>
                  <option value="17" <?php echo $day_selected_array[17]; ?>>17</option>
                  <option value="18" <?php echo $day_selected_array[18]; ?>>18</option>
                  <option value="19" <?php echo $day_selected_array[19]; ?>>19</option>
                  <option value="20" <?php echo $day_selected_array[20]; ?>>20</option>
                  <option value="21" <?php echo $day_selected_array[21]; ?>>21</option>
                  <option value="22" <?php echo $day_selected_array[22]; ?>>22</option>
                  <option value="23" <?php echo $day_selected_array[23]; ?>>23</option>
                  <option value="24" <?php echo $day_selected_array[24]; ?>>24</option>
                  <option value="25" <?php echo $day_selected_array[25]; ?>>25</option>
                  <option value="26" <?php echo $day_selected_array[26]; ?>>26</option>
                  <option value="27" <?php echo $day_selected_array[27]; ?>>27</option>
                  <option value="28" <?php echo $day_selected_array[28]; ?>>28</option>
                  <option value="29" <?php echo $day_selected_array[29]; ?>>29</option>
                  <option value="30" <?php echo $day_selected_array[30]; ?>>30</option>
                  <option value="31" <?php echo $day_selected_array[31]; ?>>31</option>
                </select>
                <? $curYear = 2013;
				   $curYear = (int) date('Y');
				   $yearMax = $curYear - 1904;
				   $year_selected_array = array($yearMax);
				for ($i=$curYear; $i > 1904; $i--){				
					if ($year == $i) {
						$year_selected_array[$i] = "selected = 'selected'";
					}
				}
				?>
                <select name="Year" id="Year">
                  <option value="-1">Year:</option>
                  <? 
				   for($years=$curYear; $years>1904; $years--){
					   
					   echo "<option value='".$years."' ".$year_selected_array[$years]."> ".$years." </option>";
					   ;} 
					   
					   ?>
                </select>
                </li>
                <li class="bsuemail" id="bsuemail">
                <label for="bsuemail"> Bsu Email </label>
                <span class="validation"></span> <? echo'<input type="text" name="bsuemail" id="bsuemail" value="'.$bsuEmail.'">'; ?> </li>
                
                <li class="password" id="password1">
                <label for="password"> Password </label>
                <span class="validation">Verification Required</span> <? echo'<input type="password" name="password" onchange="PasswordChange()" id="password" value="">'; ?> </li>
                
                <li class="sex" id="sex">
                <label for="sex"> Sex </label>
                <span class="validation"></span>
                <? $selectedSex = array(2);
				 if ($sex == "M"){
					 $selectedSex[0] = "checked = 'checked'";
				 }
					 if ($sex == "F"){
					 $selectedSex[1] = "checked = 'checked'";
					}?>
                <input type="radio" name="Sex" id="sex" value="M" <? echo $selectedSex[0]; ?> />
                Male
                <input type="radio" name="Sex" id="sex" value="F" <? echo $selectedSex[1]; ?> />
                Female  </li>
                
                <li class="posid" id="posid">
                <label for="posid"> Position ID </label>
                <span class="validation"></span>
                <? $positionOption = array("", "", "", "", "", "");
				if ($positionID == -1){
				$positionOption[0] = "selected = 'selected'"; }
				if($positionID == 1){
				$positionOption[1] = "selected = 'selected'";}
				if($positionID == 2){
				$positionOption[2] = "selected = 'selected'";}
				if($positionID == 3){
				$positionOption[3] = "selected = 'selected'";}
				if ($positionID == 4){
				$positionOption[4] = "selected = 'selected'";}
				if ($positionID == 5){
				$positionOption[5] = "selected = 'selected'";}
					?>
                <select name="posid" id="posid" onchange="Admin()">
                  <option value="-1" <?php echo $positionOption[0]; ?>>Position: </option>
                  <option value="1" <?php echo $positionOption[1]; ?>>Administrator</option>
                  <option value="2" <?php echo $positionOption[2]; ?>>Company Head</option>
                  <option value="3" <?php echo $positionOption[3]; ?>>Lab Manager</option>
                  <option value="4" <?php echo $positionOption[4]; ?>>Computer Service Technician</option>
                  <option value="5" <?php echo $positionOption[5]; ?>>Computer Lab Assistant</option>
                </select> <?// echo'<input type="text" name="posid" id="posid" value="'.$positionID.'">'; ?> </li>
                
                <li class="classlevel" id="classlevel">
                <label for="classlevel"> Class Level </label>
                <span class="validation"></span>
                <? $classOption = array("", "", "", "", "", "");
				if ($classLevel == -1){
				$classOption[0] = "selected = 'selected'"; }
				if($classLevel == 1){
				$classOption[1] = "selected = 'selected'";}
				if($classLevel == 2){
				$classOption[2] = "selected = 'selected'";}
				if($classLevel == 3){
				$classOption[3] = "selected = 'selected'";}
				if ($classLevel == 4){
				$classOption[4] = "selected = 'selected'";}
				if ($classLevel == 5){
				$classOption[5] = "selected = 'selected'";}
					?>
                 <select name="classlevel" id="classlevel">
                  <option value="-1" <?php echo $classOption[0]; ?>>Professional Staff</option>
                  <option value="1" <?php echo $classOption[1]; ?>>Freshman</option>
                  <option value="2" <?php echo $classOption[2]; ?>>Sophomore</option>
                  <option value="3" <?php echo $classOption[3]; ?>>Junior</option>
                  <option value="4" <?php echo $classOption[4]; ?>>Senior</option>
                  <option value="5" <?php echo $classOption[5]; ?>>Fifth Year+</option>
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