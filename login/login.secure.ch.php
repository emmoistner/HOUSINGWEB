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
<link href="../css/jbar.css" rel="stylesheet" type="text/css" />

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
	$lowSupply=mysql_query("select count(*) as 'lowQuantity' from Supply where quantity < 3 order by name asc;");
	while ($lowItems=mysql_fetch_array($lowSupply)){
		$lowQuantity = $lowItems['lowQuantity'];
	}
	?>
    
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="login.secure.ch.php">Home</a></li>
      <li><a href="../cms/cms.php">Manage</a>
        <ul id="dropDown">
          <li><a href="../cms/cms.php">Supplies</a></li>
          <li><a href="../cms/employeecms.php">Employees</a>
          	<ul><li><a href="../search/employeeSearch.php">Search</a></li>
            </ul>
          </li>
          <li><a href="../Motw/messageoftheweek.php"> MOTW </a></li>
          <li> <a href="../transactions/activeRequests.php"> Requests </a> </li>
        </ul>
      </li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
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
  <h1 id="form-title">Company Head</h1>
  <h3> <? echo $entry?><br /> </h3> <h4> <? echo "by ".$editedBy. " at ".$postDate ?> </h4> 
  <form id ="">
    <fieldset>
    <input id="lowItems" type="hidden" name="Language" value="<? echo $lowQuantity ?>">
    </fieldset>
  </form>
</div>
<script src="../jquery/jquery-1.3.2.js" type="text/javascript" ></script>
<script src="../jquery/jquery.bar.js" type="text/javascript" ></script>
<script>
		var lowItemCount = document.getElementById('lowItems').value;
		if (lowItemCount == 1){
		
		var string1 = 'There is ';
		var string2 = ' item of low quantity in supply. Check inventory.';
		var Prompt = string1.concat(lowItemCount, string2);
		if(lowItemCount > 0)
		
		$("#lowItems").bar({
			message			 : Prompt,
			time			 : 4800
			
		});
		}
		
		else{
			
		var string1 = 'There are ';
		var string2 = ' items of low quantity in supply. Check inventory.';
		var Prompt = string1.concat(lowItemCount, string2);
		if(lowItemCount > 0)
		
		$("#lowItems").bar({
			message			 : Prompt,
			time			 : 4800
			
		});
		}
	</script> 
</body>
</html>
