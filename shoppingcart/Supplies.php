<?php include('../connect-db.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xh<?php echo writeShoppingCart(); ?>tml1-transitional.dtd">
<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 

$sessionid = session_id();
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" />
<title>CMS</title>
<script type="text/javascript" src="../js/buttons.js"></script>
</head>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      </li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="../shoppingcart/shoppingcart4.php">Requests </a>
        <ul>
          <li><a href="../shoppingcart/Supplies.php"> Supplies</a></li>
          <li><a href="../shoppingcart/Repair.php"> Repairs </a></li>
        </ul>
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
        <h1 id="form-title"> Supplies</h1>
        <a href="recommendations.php">
        <h4 id="form-title">
        Recommendations
        </h2>
        </a>
        <form id ="supply_form" unload = "document.supply_form.reload()" name ="select" method="post" onsubmit="return checkForm()" action="supplyrequest.php" >
          <fieldset>
          <ol>
            <li><span class="firstSpan">Item Name </span> <span class="secondSpan"> Quantity</span> </li>
            <?
			  		$list=mysql_query("select * from Supply order by ItemID asc;");
					$i = 0;
					while ($row_list=mysql_fetch_assoc($list)){
			  	?>
            <li> <span class="firstSpan"><? echo $row_list['name']; ?></span>
              <input type="hidden" id="check" name="<? echo "itemName".$i ?>" value="<? echo $row_list['name'] ?>"/>
              <input type="hidden" id="check" name="<? echo "item".$i ?>" value="<? echo $row_list['ItemID'] ?>"/>
              <input type="text" id="check" name="<? echo $row_list['ItemID']; ?>" value="0" onclick="if(this.value==0){this.value=''}" onblur="if(this.value==''){this.value=0}" />
              <?
                $i= $i + 1;}
                ?>
            </li>
            <input type="hidden" id="howMany" name="howMany" value = "" />
            <li class="bottom">
              <input name="submitButton" value="Add to Cart" type="submit" class="submit_button" id="submt" onmouseover="onHover()" onmouseout="onExit()" />
            </li>
          </ol>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
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
</body>
</html>
