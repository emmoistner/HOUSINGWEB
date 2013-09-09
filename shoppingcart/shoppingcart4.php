<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 

include('../connect-db.php');

function writeShoppingCart() {
	
$sessionid = session_id();
$sql=mysql_query("SELECT SUM(quantity) AS quantity FROM orderTrack WHERE sessionId='$sessionid'");
$result=mysql_fetch_assoc($sql);
$sum = $result['quantity'];

if (!$sum) {
return ' ( 0 )';
} else {
// Parse the cart session variable
$s = ($sum > 1) ? 's':'';
return ' ( '.$sum.' item'.$s.' )';
}
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
<script type="text/javascript" >
function onHover()
{
	document.getElementById('submt').className='submit_button_hover';
}

function onExit()
{
	document.getElementById('submt').className='submit_button';
}
	
function onHoverReset()
{
	document.getElementById('rst').className='submit_button_hover';
}
	
function onExitReset()
{
	document.getElementById('rst').className='submit_button';
}
</script>
</head>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="../shoppingcart/shoppingcart4.php">Requests <?php echo writeShoppingCart(); ?></a>
        <ul>
          <li><a href="../shoppingcart/Supplies.php"> Supplies</a></li>
          <li><a href="../shoppingcart/Repair.php"> Repairs </a></li>
        </ul>
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
      <li><a href="../login/logout.php">[Log out]</a></li>
    </ul>
  </div>
</div>
<div class="body">
  <div class="inner-border">
    <div class="border">
      <div class="content">
        <h1 id="form-title"> Shopping Cart</h1>
        <center>
          <form id ="Shopping_Cart" unload = "document.supply_form.reload()" name ="select" method="post" onsubmit="" action="" >
            <fieldset>
            <ol>
            	<li> 
                	<select name="lab" id="lab">
						<? 	$labsSQL = "Select Name from labs where staffedLab = 1 order by Name asc;";
							$labsRetrieved = mysql_query($labsSQL) or die(mysql_error());
							while ($labsActive = mysql_fetch_assoc($labsRetrieved)){
								$lab = $labsActive['Name'];
						?>
                        <option value="<? echo $lab; ?>" <? if($lab == $select){ echo "selected"; } ?>> <? echo $lab; ?> </option>
						<? }
						?>
                     </select>
                </li>
              <?
					$session_id = session_id();

					$sql = "SELECT * FROM  orderTrack where sessionid = '$session_id'";
					// execute the SQL statement
					$result = mysql_query($sql) or die(mysql_error());
					//go through each row in the result set and display data
					$i = 0;
					$totalQty = 0;
					while ($newArray = mysql_fetch_array($result))
					{	$itemName = $newArray['itemName'];
						$itemId = $newArray['itemId'];
						$itemQty = $newArray['quantity'];
					
						$supplySql = mysql_query("SELECT Quantity as Quantity FROM  Supply where ItemID = '$itemId'");
						$resultSupply = mysql_fetch_assoc($supplySql);
						$Quantity = $resultSupply['Quantity'];
						
						?>
              <li>
                <laber for "<? echo "delete".$itemId; ?>">
                <? echo $newArray['itemName'];?>
                </label>
                <span class="validation"><? echo $Quantity. " in stock" ?></span>
                <input type="checkbox" id="delete" name="<? echo "delete".$itemId; ?>" value="<? echo $itemId; ?>" />
                <input type="hidden" id="check" name="<? echo "itemName".$i; ?>" value="<? echo $itemName; ?>" />
                <input type="hidden" id="check" name="<? echo "item".$i; ?>" value="<? echo $itemId; ?>" />
                <input type="text" id="quantity" name="<? echo $itemId; ?>" value="<? echo $itemQty; ?>" />
                <? $totalQty = $totalQty + $itemQty; ?>
              </li>
              <? $i++; }
					
					
					echo "<strong>Total Quantity = </strong>". $totalQty;?>
              <br />
              <input type="submit" id="submt" class="submit_button" onclick="set_action('updateShoppingCart.php')" onmouseover="onHover()" onmouseout="onExit()"name="submitButton" value="Update Qtys" />
              <input type="submit" id="rst" class="reset_button" onclick="set_action('deleteShoppingCart.php')" onmouseover="onHoverReset()" onmouseout="onExitReset()"name="resetButton" value="Remove Selected" />
              <li>
                <input type="submit" id="" class="" onclick="set_action('submitRequest.php')" onmouseover="" onmouseout=""name="submitButton" value="Submit Request" />
              </li>
              <p><a href = "Supplies.php"> Request more items </a> </p>
              <input type="hidden" id="howMany" name="howMany" value = "" />
            </ol>
            </fieldset>
          </form>
        </center>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">

function set_action(action) {
	document.getElementById('Shopping_Cart').action = action;
	document.getElementById('Shopping_Cart').submit();
}
</script>
<script type="text/javascript">
var inputTags = document.getElementsByTagName('input');
var textboxCount = 0;
for (var i=0, length = inputTags.length; i<length; i++) {
     if (inputTags[i].type == 'text') {
         textboxCount++;
     }
}
document.getElementById('howMany').value =  textboxCount;
</script>
</html>
