<?php session_start();
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
<title>Lab Utility</title>
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
  <h1 id="form-title">Company Head</h1>
  <form id ="">
    <fieldset>
      <?
	  	
	  	 if ( isset($_POST['searching'])){
		 $searching = $_POST['searching'];
		 $find = $_POST['find'];
		 $field = $_POST['field'];
		 if ($searching =="yes") 
		 { 
		 echo "<h2>Search Results</h2><p>"; 
		 
		 if ($find == "") 
		 { 
		 echo "<p>Please enter either a last name or a first name to search."; 
		 exit; 
		 } 

		 $find = strtoupper($find); 
		 $find = strip_tags($find); 
		 $find = trim ($find);
		 
		 echo "<b>You searched for the name:</b> " .$find; 
			 
    	$data = mysql_query("SELECT * FROM Employee WHERE upper($field) LIKE '%$find%' order by $field asc"); 
		 
		 while($result = mysql_fetch_array( $data )) 
		 
		 
		 {
			 $positionID = $result['PositionID'];
			 $classLevel = $result['Class_Level'];
			 
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
			
			 if ($classLevel == 1)
			{ $classLevel = "Freshman";
			}
			if ($classLevel == 2)
			{ $classLevel = "Sophomore";
			}
			if ($classLevel == 3)
			{ $classLevel = "Junior";
			}
			if ($classLevel == 4)
			{ $classLevel = "Senior";
			}
			if ($classLevel == 5)
			{ $classLevel = "Extended Senior";
			} 
			if ($classLevel == -1)
			{ $classLevel= "Professional Staff";
			}
			
			
			
			
			
		 echo "<br /><br />Employee: ".$result['Fname']; 
		 echo " "; 
		 echo $result['Minit']; 
		 echo " ";
		 echo $result['Lname'];
		 echo "<br>";
		 echo "Email: ";
		 echo $result['BSU_Email'];
		 echo "<br>";
		 echo "Position: ";
		 echo $employeePosition; 
		 echo "<br>";
		 echo "Class Level: ";
		 echo $classLevel;
		 } 
		 
		 $anymatches=mysql_num_rows($data); 
		 if ($anymatches == 0) 
		 { 
		 echo " <br /> We did not find that name in our database.<br><br>"; 
		 } 
		 
		 echo "<br>";
		 

		 } 
		 }
		 else {
			 echo "<a href='employeeSearch.php'><h2> Search something?</h2> </a>";
		 }
		 ?>
    </fieldset>
  </form>
</div>
</body>
</html>
