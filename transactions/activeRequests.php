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
<title>Lab Utility</title>
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

<div class="body">
  <div class="inner-border">
    <div class="border">
      <div class="content">
        <h1 id="form-title">Incomplete Supplies Requests</h1>
        <form id ="supply_form" unload = "document.supply_form.reload()" name ="select" action="employeeUpdate.php" onsubmit="return checkForm()" method="post">
          <fieldset>
            <ol><? //$mySelected = $_POST['supply'];
  $transactions=mysql_query("select DISTINCT A.transactionID, A.LabLocation, C.name, B.quantity,E.id, E.fname, E.lname, D.requestDate  
from suppliesTransactions A, suppliesItemsT B, Supply C, transactions D, Employee E 
where D.requestID = E.id
and E.id = A.requestID
and D.transactionID = A.transactionID
and A.transactionID = B.transactionID
and B.itemID = C.itemID
and D.status = 0
and A.transactionID > (select max(transactionID) 
from suppliesTransactions) - 10
group by A.transactionID
order by requestDate desc;
"); 
while($row_list=mysql_fetch_assoc($transactions)) {
		$fName = $row_list['fname'];
		$lName = $row_list['lname'];
		$transactionId = $row_list['transactionID'];
		$requesterName = $fName. " " .$lName;
		$emID = $row_list['id'];
		$labLocation = $row_list['LabLocation'];
		$itemName = $row_list['name'];
		$requestDate = $row_list['requestDate'];
		$quantity = $row_list['quantity'];
		$date = strtotime($requestDate);
		$requestDate = date('l F \, jS Y g:ia', $date);
	
	


	?>
              <li>
              	Employee: <? echo " ".$requesterName ?> <br />
				Transaction Number: <? echo " ".$transactionId ?><br />
				Request Date: <? echo " ".$requestDate ?><br />
				Lab: <? echo " ".$labLocation ?><br /><br />
                <? $singleTransaction=mysql_query("select C.name, B.quantity  from suppliesTransactions A, suppliesItemsT B, Supply C, transactions D
					where D.transactionID = '$transactionId'
					and D.transactionID = A.transactionID
					and A.transactionID = B.transactionID
					and B.itemID = C.itemID;");
					while($items=mysql_fetch_assoc($singleTransaction)) {
						
						$itemName = $items['name'];
						$quantity = $items['quantity'];
				?>
						Item: <? echo " ".$itemName  ?><br />
						Quantity <? echo " ".$quantity ?><br />
						<br />
                        <? }?>
				
				
                
              </li>
              <? } 
			  ?>
              
              <li class="bottom">
              <? //<input name="submitButton" value="Submit" type="submit" class="submit_button" id="submt" onmouseover="onHover()" onmouseout="onExit()" /> ?>
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